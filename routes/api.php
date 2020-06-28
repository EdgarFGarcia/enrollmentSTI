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

Route::post('registeruser', 'apiControllers@registeruser');
Route::post('login', [ 'as' => 'login', 'uses' => 'apiControllers@login' ]);

Route::get('test', 'apiControllers@test')->middleware('auth:api');
