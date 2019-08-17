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


//get all bills
Route::get('bills','billApiController@index');

//get sigle bill
Route::get('bill/{id}' ,'billApiController@show');

//create new bill
Route::get('bill' ,'billApiController@store');

//update bill
Route::get('bill/update' ,'billApiController@update');

//delete bill
Route::post('bill/delete/{id}' ,'billApiController@destroy');
