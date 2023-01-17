<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Cart::getContent();
        return view('cart.cart', compact('items'));
    }

    public function add(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'day' => 'required',
            'hour' => 'required',
            'quantity' => 'required|max:{{product->quantity}}|min:1',
        ]);

        $start_date = date('Y-m-d H:i:s', strtotime($request->day . ' ' . $request->hour));
        $end_date = date('Y-m-d H:i:s', strtotime($request->day . ' ' . $request->hour . ' +1 hour '));

        $total_items = Item::where('product_id', $request->id)->whereBetween('start_date', [$start_date, $end_date])->sum('quantity');

        if ($total_items + $request->quantity > $request->capacity) {
            return redirect()->back()->with('error', 'Esta quantidade de produtos ultrapassa a capacidade máxima para este horário.');
        }

        $quantity = 0;
        $total = 0;

        if ($total_items + $request->quantity <= $request->capacity && $total_items > 0) {
            $item = Item::where(['product_id' => $request->id, 'start_date' => $start_date, 'end_date' => $end_date])->first();
            $quantity = $item->quantity + $request->quantity;
            $total = $item->total + ($request->price * $request->quantity);

            Item::where(['product_id' => $request->id, 'start_date' => $start_date, 'end_date' => $end_date])->update(['quantity' => $quantity, 'total' => $total]);

            \Cart::update(
                $request->id . $start_date,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $quantity,
                    ),
                )
            );

            return redirect()->route('cart_index');
        }

        if (\Cart::isEmpty()) {
            Order::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        $user_id = auth()->user()->id;

        $order = Order::where('user_id', $user_id)->latest()->pluck('id')->first();

        if (\Cart::has($request->id . $start_date)) {
            $in_cart = \Cart::get($request->id . $start_date);
            if ((int) $in_cart->quantity + (int) $request->quantity > Product::findOrFail($in_cart->attributes->product_id)->quantity) {
                return redirect()->back()->with('error', 'Já existe este produto no carrinho com a quantidade máxima disponível');
            }
        }

        $item = Item::create([
            'order_id' => $order,
            'product_id' => $request->id,
            'quantity' => $request->quantity,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'total' => $request->price * $request->quantity,
        ]);

        $item_id = $item->id;

        \Cart::add(
            array(
                'id' => $request->id . $start_date,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'product_id' => $request->id,
                    'item_id' => $item_id,
                ),
            )
        );

        return redirect()->route('cart_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function clear()
    {
        if (\Cart::isEmpty()) {
            return redirect()->route('cart_index');
        }
        $items = \Cart::getContent()->toArray();
        $itemIds = array();
        foreach ($items as $item) {
            $itemIds[] = $item['attributes']['item_id'];
        }
        foreach ($itemIds as $itemId) {
            Item::destroy($itemId);
        }
        \Cart::clear();
        $user_id = auth()->user()->id;
        $order_id = Order::where('user_id', $user_id)->latest()->pluck('id')->first();
        Order::destroy($order_id);
        return redirect()->route('cart_index');
    }

    public function remove(Request $request)
    {
        $items = \Cart::getContent()->toArray();
        $itemIds = array();
        foreach ($items as $item) {
            $itemIds[] = $item['attributes']['item_id'];
        }
        foreach ($itemIds as $itemId) {
            if ($itemId == $request->actual_id) {
                Item::destroy($itemId);
            }
        }
        \Cart::remove($request->id);
        if (\Cart::isEmpty()) {
            $user_id = auth()->user()->id;
            $order_id = Order::where('user_id', $user_id)->latest()->pluck('id')->first();
            Order::destroy($order_id);
            return redirect()->route('cart_index');
        } else {
            return redirect()->route('cart_index');
        }
    }

    public function checkout()
    {
        $items = \Cart::getContent();
        $user = auth()->user();
        return view('cart.checkout', ['items' => $items,'intent' => $user->createSetupIntent()]);
    }

    public function pay(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = Auth::user();

        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);

        $total = \Cart::getTotal();

        try {
            $user->charge($total * 100, $paymentMethod);
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()->withError($e->getMessage());
        }
        // Clear the cart
        \Cart::clear();
        $order = Order::where('user_id', $user->id)->latest()->pluck('id')->first();
        Payment::create([
            'order_id' => $order,
            'status' => "paid",
            'value' => $total,
            'method' => "card",
        ]);
        return redirect()->route('payment_success')->with('success', 'Payment Successful!');
    }

    
    public function success(){
        return view('cart.success');
    }

}
