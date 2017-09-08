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

Route::get('/','\App\Http\Controllers\Home\IndexController@index');
//登录
Route::get('/login','\App\Http\Controllers\Home\LoginController@index');
Route::post('/addlogin','\App\Http\Controllers\Home\LoginController@addlogin');
Route::get('/register','\App\Http\Controllers\Home\LoginController@register');
Route::post('/addRegister','\App\Http\Controllers\Home\LoginController@addRegister');
//借款
Route::get('/borrow','\App\Http\Controllers\Home\BorrowController@index');
//投资
Route::get('/invest','\App\Http\Controllers\Home\InvestController@index');

Route::get('/logout','\App\Http\Controllers\Home\LoginController@logout');

Route::post('/borrow_add','\App\Http\Controllers\Home\BorrowController@add');
Route::post('/borrowimg_add','\App\Http\Controllers\Home\BorrowController@img_add');
//我的账户
Route::get('/account','\App\Http\Controllers\Home\AccountController@index');
//认证
Route::any('/id','\App\Http\Controllers\Home\AccountController@id');
Route::any('/ss','\App\Http\Controllers\Home\AccountController@show');
Route::post('/verify','\App\Http\Controllers\Home\AccountController@verify');
//qq第三方
Route::get('/qqlogin','\App\Http\Controllers\Home\QqController@index');
Route::get('/qqlogout','\App\Http\Controllers\Home\QqController@qqlogout');
//新浪微博
Route::get('/sina2','\App\Http\Controllers\Home\Sina2Controller@index');
Route::get('/sinatui','\App\Http\Controllers\Home\Sina2Controller@sinatui');

//验证码路由
Route::get('/captcha/{tmp}','\App\Http\Controllers\Home\CodeController@captcha');
//关于我们
Route::get('/aboutour','\App\Http\Controllers\Home\AboutourController@show');
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

//实时财务
Route::get('/money','\App\Http\Controllers\Home\MoneyController@index');

//后台模块

Route::group(['prefix' => 'admin'], function() {


	Route::get('/adminlogin','\App\Http\Controllers\Admin\AdminLoginController@index');

	Route::get('/adminlayout','\App\Http\Controllers\Admin\AdminLoginController@adminlogout');

        Route::post('/adminadd','\App\Http\Controllers\Admin\AdminLoginController@adminadd');

    Route::group(['middleware' => 'auth:admin'], function(){

        Route::get('/adminindex','\App\Http\Controllers\Admin\AdminIndexController@index');
        Route::get('/adminborrow','\App\Http\Controllers\Admin\AdminIndexController@borrow');
        Route::get('/adminborrowad','\App\Http\Controllers\Admin\AdminIndexController@borrowad');

        Route::get('/adminborrow','\App\Http\Controllers\Admin\AdminIndexController@borrow');


        Route::get('/admingoodsadd','\App\Http\Controllers\Admin\AdminIndexController@goodsAdd');
        Route::get('/adminlist','\App\Http\Controllers\Admin\AdminIndexController@goodsList');
        Route::post('/adminadd_do','\App\Http\Controllers\Admin\AdminIndexController@goodsAdd_do');
        Route::get('/goodsupda','\App\Http\Controllers\Admin\AdminIndexController@goodsUpda');
        Route::post('/adminupda_do','\App\Http\Controllers\Admin\AdminIndexController@goods_Upda');
        Route::get('/admindelete','\App\Http\Controllers\Admin\AdminIndexController@goods_Dele');
        Route::any('/adminCate','\App\Http\Controllers\Admin\AdminIndexController@cate');
        Route::any('/admincate_do','\App\Http\Controllers\Admin\AdminIndexController@cate_do');
        Route::any('/admincate_del','\App\Http\Controllers\Admin\AdminIndexController@cate_del');
        Route::any('/admincateupda','\App\Http\Controllers\Admin\AdminIndexController@cateupda');
        Route::any('/admincate_upda','\App\Http\Controllers\Admin\AdminIndexController@cate_upda');

   });




});





