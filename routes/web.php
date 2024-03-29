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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/kafe', function() {
	return view('layouts.kafeapp');
});

Route::get('menu/create', 'MenuController@create');
Route::post('menu/store', 'MenuController@store');
Route::get('menu', 'MenuController@index');
Route::get('menu/edit/{id}', 'MenuController@edit');
Route::post('menu/edit/{id}', 'MenuController@update');
Route::delete('menu/{id}', 'MenuController@destroy');

Route::get('order/create', 'OrderController@create');
Route::post('order/store', 'OrderController@store');
Route::get('order', 'OrderController@index');
Route::get('order/edit/{id}', 'OrderController@edit');
Route::post('order/edit/{id}', 'OrderController@update');
Route::delete('order/{id}', 'OrderController@destroy');

Route::get('/pesan', function(){
    return view('pesanaktif');
});