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
    return view('index.index');
});

Route::get('/login','\App\Http\Controllers\Home\LoginController@login');
Route::get('/register','\App\Http\Controllers\Home\LoginController@register');
Route::get('/borrow','\App\Http\Controllers\Home\BorrowController@index');
Route::get('/invest','\App\Http\Controllers\Home\InvestController@index');

