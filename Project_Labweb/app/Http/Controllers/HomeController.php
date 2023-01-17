<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function account()
    {
        $user=Auth::user();
        return view('account', ['user' => $user]);
    }

    public function edit()
    {
        return view('account.edit');
    }

    public function dashboard()
    {
        return view('dashboard.home');
    }

}
