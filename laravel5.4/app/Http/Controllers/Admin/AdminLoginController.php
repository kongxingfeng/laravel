<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:06
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminLoginController extends Controller{

	public function index()
	{
		return view('adminIndex/login');
	}

}