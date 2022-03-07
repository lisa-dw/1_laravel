<?php

namespace App\Http\Controllers\Api\vi\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\BuyList;
use App\Models\Product\BuyUserInform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BuyListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $userId)
    {
//        if($userId){
//            BuyList::all()->with('user_id',$userId);
//            $result = DB::query("select * from order o left join product p o.product_id on p.id");
//        }
        $outs = BuyList::orderBy('id', 'desc')->get();

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
        Log::info(__METHOD__);
        Log::info($request);

        try {

            $buyLists = $request->all();

//            foreach ($buyLists as $i => $buyList) {
//
//                $outs = BuyList::create($buyList);
//
//                return $outs;
//
//            }
            return $buyLists;

        } catch (\Exception $e) {
            Log::info(__METHOD__ . ': error');
            Log::error($e->getMessage());

        }



//        BuyList::create($request->buyList);
//        $outs = BuyList::create($request->all());

//        BuyUserInform::create($request->all());
//        return $outs;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\BuyList  $buyList
     * @return \Illuminate\Http\Response
     */
    public function show(BuyList $buyList)
    {
       return $buyList;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\BuyList  $buyList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyList $buyList)
    {
        $outs = $buyList->update($request->all());

        return $outs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\BuyList  $buyList
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyList $buyList)
    {
        $outs =$buyList->delete();
        return $outs;
    }
}
