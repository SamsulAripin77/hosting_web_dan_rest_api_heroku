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

Route::get('blogs','apiController@index');
Route::post('blogs','apiController@store');
Route::put('blogs/{id}','apiController@update');
Route::delete('blogs/{id}','apiController@destroy');
Route::get('blogs/{id}','apiController@show');