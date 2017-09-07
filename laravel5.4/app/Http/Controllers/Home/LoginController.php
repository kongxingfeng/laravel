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





class LoginController extends Controller{

    public function index()
    {

       return view('login/login');
    }

    public function register()
    {
        return view('login/register');
    }
    public function addRegister()
    {

        $this->validate(request(),[
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'tel' => 'required|digits:11',
            'password' => 'required|min:5|confirmed',
        ]);

        $password = bcrypt(request('password'));
        $name = request('name');
        $email = request('email');
        $tel = request('tel');


        $user = \App\User::create(compact('name', 'email', 'password','tel'));
        return redirect('/login');

    }

    public function addlogin(Request $request)
    {
       
        //验证验证码
        $captcha = $_REQUEST['captcha'];
        if(isset($captcha))
        {
            //strtolower()小写函数
            if(strtolower($_REQUEST['captcha'])==session('milkcaptcha'))
            {
                   $this->validate($request, [
                    'name' => 'required|',
                    'password' => 'required|min:6|max:30',
                    'is_remember' =>'integer',
                ]);

                 $user = request(['name', 'password']);
                $remember = boolval(request('is_remember'));
                if (\Auth::attempt($user, $remember)) {
                     return redirect('/');
                }

                    return \Redirect::back()->withErrors("用户名密码错误");
            }
            else
            {
                echo "<script>alert('验证码错误');location.href='/login'</script>";
            }
        }
    }



    public function logout()
    {
        \Auth::logout();
        return redirect('/login');
    }
}