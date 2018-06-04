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

Route::get('/', 'ImageController@index')->name('index');
Route::post('/', 'ImageController@store')->name('store');
Route::get('/{image}', 'ImageController@edit')->name('edit');
Route::put('/{image}', 'ImageController@update')->name('update');
