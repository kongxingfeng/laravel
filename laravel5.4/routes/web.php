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
/**
 * 后台
 */
Route::get('/adminindex','\App\Http\Controllers\Admin\AdminIndexController@index');
Route::get('/adminlogin','\App\Http\Controllers\Admin\AdminLoginController@index');
Route::get('/adminadd','\App\Http\Controllers\Admin\AdminIndexController@goodsAdd');
Route::get('/adminlist','\App\Http\Controllers\Admin\AdminIndexController@goodsList');
Route::post('/adminadd_do','\App\Http\Controllers\Admin\AdminIndexController@goodsAdd_do');
Route::get('/goodsupda','\App\Http\Controllers\Admin\AdminIndexController@goodsUpda');
Route::post('/adminupda_do','\App\Http\Controllers\Admin\AdminIndexController@goods_Upda');
Route::get('/admindelete','\App\Http\Controllers\Admin\AdminIndexController@goods_Dele');