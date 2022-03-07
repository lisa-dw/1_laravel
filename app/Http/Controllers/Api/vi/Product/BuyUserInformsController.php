<?php

namespace App\Http\Controllers\Api\vi\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\BuyUserInform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

//        Log::info($request->all());
//        $request->user_id = 31;
//        Log::info($request->all());

        $outs = BuyUserInform::create($request->all());

        return $outs;  // return을 해줘야 프론트로 응답이 간다.
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
