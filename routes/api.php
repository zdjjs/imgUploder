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

Route::get('/', 'ApiImageController@index')->name('api.index');
Route::post('/', 'ApiImageController@store')->name('api.store');
Route::put('/{image}', 'ApiImageController@update')->name('api.update');
Route::delete('/{image}', 'ApiImageController@destroy')->name('api.destroy');
