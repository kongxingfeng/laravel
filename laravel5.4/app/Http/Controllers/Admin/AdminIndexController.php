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
	

}