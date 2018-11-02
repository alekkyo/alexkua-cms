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

//Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('categories', 'Api\CategoryController', ['only' => ['store', 'destroy']]);
    Route::post('categories/{category}/order-up', 'Api\CategoryController@moveOrderUp');
    Route::post('categories/{category}/order-down', 'Api\CategoryController@moveOrderDown');
//});