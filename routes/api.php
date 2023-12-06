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


#Product routes
Route::get('/product/list', 'App\Http\Controllers\ProductController@getList');
Route::get('/product/get/{id}', 'App\Http\Controllers\ProductController@detail');

//NON-LOGGED IN ROUTES
Route::post('signin', 'AuthController@signin');
Route::post('signup', 'AuthController@signup');
Route::post('logout', 'AuthController@logout');
Route::get('loginerror', 'AuthController@loginError');
