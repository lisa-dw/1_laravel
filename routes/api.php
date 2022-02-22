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


Route::post('/users/login', [\App\Http\Controllers\Api\vi\User\UsersController::class, 'login']);



// User 회원가입
Route::get('/users/checkUserId/{userid}', [\App\Http\Controllers\Api\vi\User\UsersController::class, 'checkUserId']);
Route::get('/users/checkUserEM/{email}', [\App\Http\Controllers\Api\vi\User\UsersController::class, 'checkUserEmail']);
Route::get('/users/checkUserPh/{phone}', [\App\Http\Controllers\Api\vi\User\UsersController::class, 'checkUserPhone' ]);


Route::apiResources([

    '/users' => App\Http\Controllers\Api\vi\User\UsersController::class,
    '/informs' => \App\Http\Controllers\Api\vi\User\InformsController::class,

]);
