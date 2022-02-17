<?php

namespace App\Http\Controllers\Api\vi\User;

use App\Http\Controllers\Controller;
use App\Models\Inform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info(__METHOD__);

        $outs = Inform::all();

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
        $outs = Inform::create($request->all());

        return $outs;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inform  $inform
     * @return \Illuminate\Http\Response
     */
    public function show(Inform $inform)
    {
        Log::info(__METHOD__);

        return $inform;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inform  $inform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inform $inform)
    {
        $outs = $inform->update($request->all());

        return $outs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inform  $inform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inform $inform)
    {
        $out = $inform->delete();

        return $out;
    }
}
