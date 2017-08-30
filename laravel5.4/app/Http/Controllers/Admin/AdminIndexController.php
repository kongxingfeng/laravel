<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:06
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use DB;

class AdminIndexController extends Controller{

	public function index()
	{
		return view('adminIndex/index');
	}
	public function user()
	{
		return view('adminIndex/column');
	}
	public function goodsAdd()
	{
		return view('adminIndex/add');
	}
	public function goodsList()
	{
		$list = DB::select("select * from gain");
		return view('adminIndex/list',['list'=>$list]);
	}
	public function goodsAdd_do()
	{
		$input = Request::all();
		unset($input['_token']);
		$res = DB::table("gain")->insert($input);
        if($res){
            return redirect("/adminlist");
        }else{
            return redirect("/adminadd");
        }

	}
	public function goodsUpda()
	{
		$id=$_GET['id'];
		$list = DB::select("select * from gain where id='$id'");
		// print_r($list[0]);die;
		return view('adminIndex/update',['list'=>$list[0]]);
	}
	public function goods_Upda()
	{
		$input = Request::all();
		$id=$input['id'];
		unset($input['_token']);
		unset($input['id']);
		$list = DB::table("gain")->where('id',$id)->update($input);
		if($list){
		    return redirect("/adminlist");
        }else{
            return redirect("/adminlist");
        }
	}
	public function goods_Dele()
	{
		$id=$_GET['id'];
		// echo $id;die;
		$data=DB::table('gain')->where('id',$id)->delete();
		if($data){
		    return redirect("/adminlist");
        }else{
            return redirect("/adminlist");
        }
	}

}