<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:api')->resource('/qrcodes','\App\Http\Controllers\QrcodeController');

//
//Route::middleware('auth:api')->get('/ourqrcode','\App\Http\Controllers\QrcodeController@index');
//Route::middleware('auth:api')->post('/qrcodes/store','\App\Http\Controllers\QrcodeController@store');;

