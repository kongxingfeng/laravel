<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:08
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Auth;

class QqController extends Controller{

    public function index()
    {
		return view('qqlogin.index');
    }
  	
    public function qqlogout()
    {
        session(['qid' =>'']);
		session_start();
    	unset($_SESSION['qq_accesstoken']);
    	unset($_SESSION['qq_openid']);
    	
		return redirect('/');
    }
  	
   
}