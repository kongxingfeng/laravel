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


Route::get('/login','\App\Http\Controllers\Home\LoginController@index');
Route::post('/addlogin','\App\Http\Controllers\Home\LoginController@addlogin');
Route::get('/register','\App\Http\Controllers\Home\LoginController@register');
Route::post('/addRegister','\App\Http\Controllers\Home\LoginController@addRegister');
Route::get('/borrow','\App\Http\Controllers\Home\BorrowController@index');
Route::get('/invest','\App\Http\Controllers\Home\InvestController@index');
Route::get('/logout','\App\Http\Controllers\Home\LoginController@logout');

Route::group(['prefix' => 'admin'], function() {

	Route::get('/adminindex','\App\Http\Controllers\Admin\AdminIndexController@index');
	Route::get('/adminlogin','\App\Http\Controllers\Admin\AdminLoginController@index');
	Route::get('/adminborrow','\App\Http\Controllers\Admin\AdminIndexController@borrow');
	Route::get('/adminborrowad','\App\Http\Controllers\Admin\AdminIndexController@borrowad');
	Route::post('/adminadd','\App\Http\Controllers\Admin\AdminLoginController@adminadd');
	Route::get('/adminlayout','\App\Http\Controllers\Admin\AdminLoginController@adminlogout');
	//borrow--张颖
	Route::get('/adminborrow','\App\Http\Controllers\Admin\AdminIndexController@borrow');

});





