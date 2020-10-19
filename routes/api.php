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


Route::group(['prefix'=>'v1','middleware'=>'client' ],function (){
Route::get('/clients/updated','AdminController@show_client'); // updaded client
Route::get('/clients/onhold','AdminController@customerCreatedPayload'); //pending client
Route::get('/order/list','AdminController@orderCreatedPayload'); //pending client

});
