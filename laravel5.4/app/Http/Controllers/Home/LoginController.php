<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:08
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class LoginController extends Controller{

    public function login()
    {
        return view('login/login');
    }

    public function register()
    {
        return view('login/register');
    }
}