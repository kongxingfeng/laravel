<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:06
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class AdminLoginController extends Controller
{

	public function index()
	{
		return view('adminIndex/login');
	}
	public function adminadd(Request $request)
    { 
    	//var_dump(Admin::get()->toArray());die;
    	
    	// $user = request(['name', 'password']);
    	// dd($user);
    	// $arr = request('password');
    	// echo bcrypt($arr);exit;
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|min:3|max:30',
            'is_remember' =>'integer',
        ]);


         $user = request(['name', 'password']);
		//dd($user);



        $remember = boolval(request('is_remember'));
        // echo $remember;exit;
        // //var_dump(\Auth::attempt($user,$remember));exit;
        if (true == \Auth::guard('admin')->attempt($user)) {
            return redirect('/admin/adminindex');
        }
		else
		{
			//return redirect('/adminindex');
			return \Redirect::back()->withErrors("用户名密码错误");
		}

        //echo 1;
       
    }

    /**
     * 退出
     */
    public function adminlogout()
    {
        \Auth::guard('admin')->logout();
        return redirect('/admin/adminlogin');
    }
}