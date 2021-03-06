<?php

namespace App\Http\Controllers\Api\vi\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use \Illuminate\Support\Facades\Validator;
//use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth:api', ['except' => ['login']]);   // middleware에
    }

    // 로그아웃 메서드
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
           'status' => 'success',
           'message' => 'logout'
        ], 200);
    }

    //토큰 갱신 메서드
    public function refresh() {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }




    // 클라이언트(Client, 브라우저)의 요청(Request)으로 로그인한 유저의 정보를 얻어 응답(Response)하는 메서드
    public function user()
    {
        return response()->json(Auth::guard('api')->user());
    }


    //로그인 메서드
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        Log::info(__METHOD__);
        Log::info($request);

//        // 지금 유효성 검사가 안됨.. 그래서 스킵
//        $validator = Validator::make($request->all(), [
//            'userid' => 'required|min:8|regex:/^[a-zA-Z0-9]*$/',
//            'password'=> 'required|regex: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/',
//        ]);
//
//        Log::info('유효성검사 끝.');
////        Log::info($validator);
//
//        if($validator->fails()){
//            return response()->json([
//               'status' => 'error',
//               'messages' => $validator->messages()
//            ], 400);
//        }
//
//        Log::info('$validator->fails() 아님');
////
////        Log::info(json_encode(auth()));
////        Log::info(json_encode(auth('api')));


        if(!$token = Auth::guard('api')->attempt(['userid'=>$request->userid, 'password'=>$request->password]))
        $credentials = request(['userid', 'password']);

        //if(!$token = auth('api')->attempt(['userid' => $request->userid, 'password' => $request->password, ]))

//        if(!$token = auth()->attempt($validator->validated()))
//        {
//            return response()->json(['error'=>'Unauthorized', 401]);
//        }

        return $this->respondWithToken($token);

    }

    // 토큰 생성 메서드 : 로그인에 성공하면 요청(Request)에 대한 jwt 토큰을 반환(Response)
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        Log::info('respondWithToken 메서드 실행');
        Log::info($token);


        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' =>auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }





    // 이메일 중복체크 메서드
    public function checkUserEmail($email){
        Log::info($email);

        $outs = false;

        if($email){
            $outs = User::where('email', $email) -> first();
        }
        Log::info($outs);

        return (empty($outs));

    }


    // 핸드폰번호 중복체크 메서드
    public function checkUserPhone($phone){

        $outs = false;

        if($phone){
            $outs = User::where('phone', $phone) -> first();
        }
        return (empty($outs));

    }


    // id 중복체크 메서드
    public function checkUserId($userid){

        Log::info($userid); // 유저가 기재한 아이디가 잘 들어왔나 확인하는 로그.

        // $outs의 기본 값을 false로 정하고 시작한 것.
        // 지정하지 않아도 되지만 그러면 언디파인드가 뜨기 때문에 그냥 지정하고 시작한 것.
        $outs = false;

        if($userid) {
            $outs = User::where('userid',$userid)->first();
        }
        // if의 조건이 다 부합하면 리턴한다.
        // empty() => 비어있는지 아닌지를 나타내주는 함수. / Null도 비어져있는 것과 같음.
        // 비어 있으면 true(1), 비어있지 않으면 False(0)를 반환한다.
        return (empty($outs));
    }

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
        $validataData = $request->validateWithBag('post', [

            'userid' => 'required|min:8|unique:users|regex:/^[a-zA-Z0-9]*$/',
            'password'=> 'required|regex: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/',
            'name' => 'required',
            'email'=>'required|unique:users|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9._]+.[a-zA-Z]*$/',
            'phone'=>'required|regex:/^(01)[0-9]{9}$/',
            'address'=>'required',

        ]);

//        $request->validate([
//
//        ]);

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
