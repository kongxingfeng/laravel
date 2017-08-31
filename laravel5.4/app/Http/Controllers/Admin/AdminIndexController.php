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

	//审核借款人
	public function borrow()
	{
		if(!empty($_GET))
		{
			//echo 11;
			$type=$_GET['type'];
			$id = $_GET['id'];
			$arr=DB::table('borrow')->where('id',$id)->first();
			if($type==0)
			{
			
				$nowtime = date("Y-m-d H:i:s");//审核时间
				$bor_etime=date("Y-m-d", strtotime("+".$arr->bor_month." months", strtotime($nowtime)));//还款时间
				$info=DB::table('borrow')->where('id',$id)->update(['status'=>'1','bor_time'=>$nowtime,'bor_etime'=>$bor_etime]);
				if($info)
				{
					echo $bor_etime;
				}
			}
		}
		else
		{
			$data=DB::table('borrow')->get();
			return view('adminIndex/column',['data'=>$data]);
		}
		
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
            return redirect("/admin/adminlist");
        }else{
            return redirect("/admin/admingoodsadd");
        }

	}
	
	public function goodsUpda()
	{
		$id=$_GET['id'];
		$list = DB::select("select * from gain where id='$id'");
		
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
		    return redirect("/admin/adminlist");
        }else{
            return redirect("/admin/adminlist");
        }
	}
	public function goods_Dele()
	{
		$id=$_GET['id'];
		
		$data=DB::table('gain')->where('id',$id)->delete();
		if($data){
		    return redirect("/admin/adminlist");
        }else{
            return redirect("/admin/adminlist");
        }
	}


}