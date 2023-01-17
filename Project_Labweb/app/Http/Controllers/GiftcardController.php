<?php

namespace App\Http\Controllers;

use App\Models\Giftcard;
use Illuminate\Http\Request;

class GiftcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Giftcard  $giftcard
     * @return \Illuminate\Http\Response
     */
    public function show(Giftcard $giftcard)
    {
        //
    }

    public function show_guest(Giftcard $giftcard)
    {
        return view('guests.giftcard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Giftcard  $giftcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Giftcard $giftcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Giftcard  $giftcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giftcard $giftcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Giftcard  $giftcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giftcard $giftcard)
    {
        //
    }
}
