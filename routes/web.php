<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('items', 'ItemController@show')->name('items');
    Route::get('items/add', 'ItemController@showAdd')->name('itemsAdd');
    Route::get('categories', 'CategoryController@show')->name('categories');
    Route::get('categories/add', 'CategoryController@showAdd')->name('categoriesAdd');
    Route::get('categories/{category}/edit', 'CategoryController@showEdit')->name('categoriesEdit');
});
