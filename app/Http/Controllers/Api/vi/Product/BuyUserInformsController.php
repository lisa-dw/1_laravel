<?php

namespace App\Http\Controllers\Api\vi\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\BuyUserInform;
use Illuminate\Http\Request;

class BuyUserInformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outs = BuyUserInform::all();

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
        $outs = BuyUserInform::create($request->all());
        return $outs;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\BuyUserInform  $buyUserInform
     * @return \Illuminate\Http\Response
     */
    public function show(BuyUserInform $buyUserInform)
    {
        return $buyUserInform;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\BuyUserInform  $buyUserInform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyUserInform $buyUserInform)
    {
        $outs = $buyUserInform->update($request->all());
        return $outs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\BuyUserInform  $buyUserInform
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyUserInform $buyUserInform)
    {
        $outs = $buyUserInform->delete();
        return $outs;
    }
}
