<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:500',
            'price' => 'required|min:1',
            'capacity' => 'required|min:1',
            'duration' => 'required|min:1',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required',
            'is_pack' => 'required',
        ]);
		try {
            $request->file('image_file')->store('/public/img');
            $validated['image'] = $request->file('image_file')->hashName();
			Product::create($validated);
		} catch (\Exception $exception) {
			return redirect('/product/create')->with('error', 'Product creation failed.'.$exception->getMessage());
		}
        return redirect('/product')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show', ['product' => Product::findOrFail($id)]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:500',
            'price' => 'required|min:1',
            'capacity' => 'required|min:1',
            'duration' => 'required|min:1',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required',
            'is_pack' => 'required',
        ]);
        
        try {
            $product = Product::findOrFail($id);
            Storage::delete('/public/img/'.$product->image);
            $request->file('image_file')->store('public/img');
            $validated['image'] = $request->file('image_file')->hashName();
            $product->update($validated);
        } catch (\Exception $exception) {
            return redirect('/product/create')->with('error', 'Product edition failed.'.$exception->getMessage());
        }
        return redirect('/product')->with('success', 'Product edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products_index');
    }

    public function index_guest()
    {
        $products = Product::all();
        return view('guests.products', ['products' => $products]);
    }

    public function show_guest($id)
    {
        $date = date('d-m-Y');
        $weekOfdays = array();
            for($i=0; $i < 7; $i++){
                $date = date('d-m-Y', strtotime('+1 day', strtotime($date)));
                $day = date('l', strtotime($date));
                if(strcmp($day,"Monday")!==0){
                    $weekOfdays[$i] = date('d-m-Y', strtotime($date));
                }else{
                    $i--;
                }
            }
        return view('products.show_guest', ['product' => Product::findOrFail($id)], ['week' => $weekOfdays]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    
}
