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

Route::post('/borrow_add','\App\Http\Controllers\Home\BorrowController@add');



/*
 * 我要借款
 * 首页
 */

//投资展示页面
Route::any('/invest/select','\App\Http\Controllers\Home\InvestController@select');
//支付表单页面
Route::any('/add','\App\Http\Controllers\Home\InvestController@add');
//支付添加页面
Route::any('/invest/invest','\App\Http\Controllers\Home\InvestController@invest');

//后台模块

Route::group(['prefix' => 'admin'], function() {

	Route::get('/adminindex','\App\Http\Controllers\Admin\AdminIndexController@index');
	Route::get('/adminlogin','\App\Http\Controllers\Admin\AdminLoginController@index');
	Route::get('/adminborrow','\App\Http\Controllers\Admin\AdminIndexController@borrow');
	Route::get('/adminborrowad','\App\Http\Controllers\Admin\AdminIndexController@borrowad');
	Route::post('/adminadd','\App\Http\Controllers\Admin\AdminLoginController@adminadd');
	Route::get('/adminlayout','\App\Http\Controllers\Admin\AdminLoginController@adminlogout');


	Route::get('/adminborrow','\App\Http\Controllers\Admin\AdminIndexController@borrow');


	Route::get('/admingoodsadd','\App\Http\Controllers\Admin\AdminIndexController@goodsAdd');
	Route::get('/adminlist','\App\Http\Controllers\Admin\AdminIndexController@goodsList');
	Route::post('/adminadd_do','\App\Http\Controllers\Admin\AdminIndexController@goodsAdd_do');
	Route::get('/goodsupda','\App\Http\Controllers\Admin\AdminIndexController@goodsUpda');
	Route::post('/adminupda_do','\App\Http\Controllers\Admin\AdminIndexController@goods_Upda');
	Route::get('/admindelete','\App\Http\Controllers\Admin\AdminIndexController@goods_Dele');

});





