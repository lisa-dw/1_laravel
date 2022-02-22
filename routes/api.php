<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






// 컨트롤러(Controller)에 추가한 함수를 URL과 연결하기 위해.
// 사용자 정보를 얻기 위한 user 라우트(Route)는 미들웨어(Middleware)로 auth:api를 사용
// 이 미들웨어(Middleware)에 의해 로그인한 사용자와 로그인하지 않은 사용자가 판단되며 로그인한 사용자만 사용자 정보를 얻을 수 있다.
// 로그인하지 않은 사용자는 unauthorized 라우트(Route)로 리다이렉트(Redirect)를 시키고 그에 따라 401를 응답(Response)할 예정.

Route::get('unauthorized', function (){
   return response()->json([
       'status' => 'error',
       'message' => 'Unauthorized'
   ], 401);
})->name('api.jwt.unauthorized');


// User 로그인 관련
Route::group(['middleware' => 'auth:api'], function(){
    // 로그아웃 컨트롤러의 라우터
    Route::get('logout', 'UsersController@logout') -> name('api.jwt.logout');
    // 토큰 갱신 컨트롤러의 라우터
    Route::get('refresh', 'UsersController@refresh') -> name('api.jwt.refresh');
    //
    Route::get('user', 'UsersController@User') -> name('api.jwt.user');
});


// User 로그인
Route::post('/users/login', [\App\Http\Controllers\Api\vi\User\UsersController::class, 'login']);


// User 회원가입
Route::get('/users/checkUserId/{userid}', [\App\Http\Controllers\Api\vi\User\UsersController::class, 'checkUserId']);
Route::get('/users/checkUserEM/{email}', [\App\Http\Controllers\Api\vi\User\UsersController::class, 'checkUserEmail']);
Route::get('/users/checkUserPh/{phone}', [\App\Http\Controllers\Api\vi\User\UsersController::class, 'checkUserPhone' ]);


Route::apiResources([

    '/users' => App\Http\Controllers\Api\vi\User\UsersController::class,
    '/informs' => \App\Http\Controllers\Api\vi\User\InformsController::class,

]);
