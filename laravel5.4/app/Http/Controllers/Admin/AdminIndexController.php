<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:06
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
class AdminIndexController extends Controller{

	public function index()
	{
		return view('adminIndex/index');
	}
	public function borrow()
	{
		$data=DB::table('borrow')->get();
		
		return view('adminIndex/column',['data'=>$data]);
	}
	public function borrowad()
	{
		$type=$_GET['type'];
		DB::table('borrowad');
	}

}