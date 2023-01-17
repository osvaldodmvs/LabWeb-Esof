<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'is_admin']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $users = User::paginate(20);
        return view('users.index', ['users' => $users]);
     }

    public function create()
    {
        return view('users.create');
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
            'name' => 'required|max:20',
            'last_name' => 'required|max:30',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'balance' => 'required|numeric',
            'is_admin' => 'required',
        ]);
		try {
			$validated['password'] = bcrypt(Arr::get($validated, 'password'), ['rounds' => 8]);
            $validated['remeber_token'] = Str::random(10);
			$user = User::create($validated);
            $user->createAsStripeCustomer();

		} catch (\Exception $exception) {
			return redirect('/users/create')->with('error', 'User creation failed.'.$exception->getMessage());
		}
        return redirect('/users')->with('success', 'User created successfully.');
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit', ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update($request->all());
        return redirect()->route('users_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users_index');
    }
}
