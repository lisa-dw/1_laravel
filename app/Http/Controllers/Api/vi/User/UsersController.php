<?php

namespace App\Http\Controllers\Api\vi\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  // list
    {
        $outs = User::all();

        return $outs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  //전체 저장, 생성
    {
        Log::info(__METHOD__);
        Log::info($request->all());


        // 1. 유효성검사가 맞으면
        $request->validate([

            'userid' => 'required|min:8|unique:users|regex:/[a-zA-Z0-9]/',
            'password'=> 'required|regex: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/',
            'name' => 'required',
            'email'=>'required|unique:users|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9._]+.[a-zA-Z]$/',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'address'=>'required',

        ]);

        //2. 데이터가 저장된다(회원가입이 된다)
        $outs = User::create($request->all());

        Log::info($outs);

        return $outs;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //회원가입 유효성 검사
    protected function validator()
    {
    return Validator::make();


    }



}
