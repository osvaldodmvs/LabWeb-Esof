<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function home()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }

    public function viral()
    {
        return view('guests.viral');
    }

    public function events()
    {
        return view('guests.events');
    }

    public function contacts()
    {
        return view('guests.contacts');
    }

    public function faq()
    {
        return view('guests.faq');
    }

    public function privacy_policy()
    {
        return view('guests.privacy_policy');
    }

    public function terms_conditions()
    {
        return view('guests.terms_conditions');
    }

}
