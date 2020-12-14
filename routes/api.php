<?php

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

Route::group(['middleware' => ['api', 'cors']], function () {

    Route::post('user', 'api\UserInfoController@index');
    Route::post('user/update', 'api\UserInfoController@show');
    Route::post('user/create', 'api\UserInfoController@store');

    Route::post('customer/update', 'api\CustomerController@update'); // list的時候用的
    Route::post('customer', 'api\CustomerController@index');
    Route::post('customer/create', 'api\CustomerController@store');
    // Route::get('customer/edit/{id}', 'api\CustomerController@show'); // 單筆
    Route::post('customer/del/{id}', 'api\CustomerController@destroy');

    Route::post('product/create', 'api\ProductController@store');
    Route::post('product', 'api\ProductController@index');
    Route::get('product/list/{id}', 'api\ProductController@list');

    Route::post('order/create', 'api\OrdersController@store');
    Route::post('order', 'api\OrdersController@index');

    Route::post('hanger/create', 'api\HangerController@store');
    Route::post('hanger', 'api\HangerController@index');
});

// Route::group(['middleware'=>'android'], function(){
//     Route::post('loginData', 'android\AndroidLoginData@index');
// });

Route::post('loginData', 'android\AndroidLoginData@loginData');
Route::post('shunlau', 'android\AndroidLoginData@shunlau');
