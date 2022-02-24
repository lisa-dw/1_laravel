<?php

namespace App\Http\Controllers\Api\vi\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outs = Cart::all();

        return $outs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outs = Cart::create($request->all());
        return $outs;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return $cart;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $outs=$cart->update($request->all());

        return $outs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $outs=$cart->delete();
        return $outs;
    }
}
