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
		if($_GET)
		{
			
			$type=$_GET['type'];
			$bor_id= $_GET['bor_id'];
			$arr=DB::table('borrow')->where('id',$bor_id)->first();
			if($type==0)
			{
				$nowtime = date("Y-m-d");//审核时间
				$bor_etime=date("Y-m-d", strtotime("+".$arr->bor_month." months", strtotime($nowtime)));//还款时间
				$info=DB::table('borrow')->where('id',$bor_id)->update(['status'=>'1','bor_time'=>$nowtime,'bor_etime'=>$bor_etime]);
				if($info)
				{
					echo $bor_etime;
				}
			}
		}
		else
		{
			
			$data = DB::table('borrow')
				           ->leftJoin('bor_img', 'borrow.id', '=', 'bor_img.bor_id')
				           ->get();
     
			return view('adminIndex/column',['data'=>$data]);
		}
		
	}
	public function goodsAdd()
	{
		$list = DB::select("select * from status");
		return view('adminIndex/add',['list'=>$list]);
	}
	
	public function goodsList()
	{
		$list = DB::select("select * from gain inner join status on gain.status=status.cate_id");
		
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

	public function cate()
	{
		$list = DB::select("select * from status");
	
        return view("adminIndex/cate",['list'=>$list]);
	}
	public function cate_do()
	{
		$input = Request::all();

		unset($input['_token']);
		$res = DB::table("status")->insert($input);
        if($res){
            return redirect("/admin/adminCate");
        }else{
            return redirect("/admin/admincate_do");
        }
	}
	public function cate_del()
	{
		$id=$_GET['id'];
		
		$data=DB::table('status')->where('cate_id',$id)->delete();
		if($data){
		    return redirect("/admin/adminCate");
        }else{
            return redirect("/admin/adminCate");
        }
	}
	public function cateupda()
	{
		$id=$_GET['id'];
		$list = DB::select("select * from status where cate_id='$id'");
		return view('adminIndex/cate_upda',['list'=>$list[0]]);
	}
	public function cate_upda()
	{
		$input = Request::all();
		$id=$input['cate_id'];
		unset($input['_token']);
		unset($input['cate_id']);
		$list = DB::table("status")->where('cate_id',$id)->update($input);
		if($list){
		    return redirect("/admin/adminCate");
        }else{
            return redirect("/admin/adminCate");
        }
	}


}