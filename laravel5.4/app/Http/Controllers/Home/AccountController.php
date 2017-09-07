<?php
/**
 * Created by Sublimit
 * User: ban
 * Date: 2017/8/29
 * Time: 14£º20
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;

use DB;
use Request;
use App\Http\Requests;

class AccountController extends Controller {
//ÎÒµÄÕË»§Ê×Ò³
    public function index()
    {
               
       
        if (!(\Auth::check()) && !session('qid')) {

            return redirect('/login');

        }elseif(\Auth::check()){

            $user_id=\Auth::user()->id;
            //查看用户信息表
            $user_info=DB::table('users')->where('id','=',"$user_id")->get()->toArray();
        }else{
            $user_id=session('qid');
            //查看用户信息表
            $user_info=DB::table('san')->where('qid','=',"$user_id")->get()->toArray();
        }
        //把图片取出来
        $imgs=DB::table('head_img')->where('u_id','=',"$user_id")->first();
         if(!empty($imgs)){
             $img=$imgs->head_img;
         }else{
            $img="";
         }
       
        $data=DB::table('invest')->where('u_id','=',"$user_id")->get();
        //查看是什么理财项目
        $inid=[];
        foreach ($data as $key => $val) 
            {
                $inid[]=$val->in_id;
            }
           $inid=array_unique($inid);
 
           $gain=DB::table('gain')->whereIn('id',$inid)->get();
          

           $arr=DB::table('borrow')->where('user_id','=',"$user_id")->get();

        
   
        if(empty($data->toArray())&&empty($arr->toArray())){

            $rank='无操作';

        }elseif(empty($data->toArray())&&!empty($arr->toArray())){

            $rank='借款人';
            
        }elseif(!empty($data->toArray())&&empty($arr->toArray())){

            $rank='投资人';
        }elseif(!empty($data->toArray())&&!empty($arr->toArray())){

            $rank='投资人和借款人';
        }

        
      
        if(\Auth::check()){

            $info=[ 
                'invest'=>$data,
                'borrow'=>$arr,
                'gain'=>$gain,
                'img'=>$img,
                'username'=>$user_info[0]->username,
                'idcard'=>$user_info[0]->idcard,
                'rank'=>$rank,
                'name'=>$user_info[0]->name,
                'email'=>$user_info[0]->email,
                'tel'=>$user_info[0]->tel,
                'created_at'=>$user_info[0]->created_at,
                'money'=>$user_info[0]->money
                
        ];
    }else{

         $info=[ 
                'invest'=>$data,
                'borrow'=>$arr,
                'gain'=>$gain,
                'img'=>$img,
                'username'=>$user_info[0]->username,
                'idcard'=>$user_info[0]->idcard,
                'rank'=>$rank,
                'name'=>$user_info[0]->name,
                'money'=>$user_info[0]->money
                
        ];
    }
       
        // print_r($info);die;
        return view('account/index',$info);
        
    }

    public function show()
    {
        return view('account/id');
    }

    public function id()
    {

    if(\Auth::check()){

         $user_id=\Auth::user()->id;
         $input=Request::all();
         $name=$input['name'];
         $idcard=$input['idcard'];
         $res=DB::table('users')
                ->where('id', $user_id)
                ->update(array('username' =>$name ,'idcard'=>$idcard));
    }else{

         $user_id=session('qid');
         $input=Request::all();
         $name=$input['name'];
         $idcard=$input['idcard'];
         $res=DB::table('san')
                ->where('qid', $user_id)
                ->update(array('username' =>$name ,'idcard'=>$idcard));
        }

//添加图片
         if($input['img']){
             
               $old_img_info=$input['img'];
    //将图片重命名  原文件名  后缀名
        $newName = md5(date('ymdhis').$old_img_info
                 ->getClientOriginalName()).".".$old_img_info
                 ->getClientOriginalExtension();
    //移动文件到uploads
        $path=$old_img_info->move(public_path().'/uploads/',$newName);
    //文件访问路径
        $img='/uploads/'.$newName;

        date_default_timezone_set('PRC');

        $date=date("Y-m-d H:i:s");
        //图片入库
           $add_img=DB::table('head_img')
                    ->insert([
                                'u_id' => $user_id, 
                                'head_img'=>$img,
                                'up_time'=>$date
                            ]); 
        
         }
    
         
        return redirect('/account');
        
    }
   

public function verify(){
        
         $input=Request::all();
         $idcard=$input['idcard'];
         // echo $idcard;
         $desc=file_get_contents('http://apis.juhe.cn/idcard/index?key=c7d6c333ca0a3b39674c5bf72aad4708&cardno='.$idcard);
         $arr=json_decode($desc,true);
         echo $arr['reason'];

    }
}