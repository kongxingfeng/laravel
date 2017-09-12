<?php
/**
 * Created by Sublimit
 * User: ban
 * Date: 2017/8/29
 * Time: 14£º20
 */

namespace App\Http\Controllers\Home;
require (app_path() . '/Libs/alipay_submit.class.php');

use App\Http\Controllers\Controller;

use DB;
use Request;
use App\Http\Requests;

class AccountController extends Controller {
public $enableCsrfValidation=false;
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
        $integral = DB::table('integral')
            ->select('grade')
            ->where('u_id',$user_id)
            ->get();
        $integralNums = '';
        foreach ($integral as $var){
            $integralNums +=$var->grade;
        }
        $integralNums = $integralNums == ''?0:$integralNums;
      
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

                'money'=>$user_info[0]->money,
                'integralNums' => $integralNums,
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
                'money'=>$user_info[0]->money,
                'integralNums' => $integralNums,
                
        ];
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


public function verify(){
        
         $input=Request::all();
         $idcard=$input['idcard'];
         // echo $idcard;
         $desc=file_get_contents('http://apis.juhe.cn/idcard/index?key=c7d6c333ca0a3b39674c5bf72aad4708&cardno='.$idcard);
         $arr=json_decode($desc,true);
         echo $arr['reason'];

    }

//支付
public function pay()
{
   return view('account/pay');
}  

public function alipayapi()
{
    require_once "../public/zfb/alipay.config.php";

    
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no =rand(1,99999);

        //订单名称，必填
        $subject = "熊猫金融";

        //付款金额，必填
        $total_fee = 0.01;

        //商品描述，可空
        $body ="等级考试及";




//构造要请求的参数数组，无需改动
$parameter = array(
        "service"       => $alipay_config['service'],
        "partner"       => $alipay_config['partner'],
        "seller_id"  => $alipay_config['seller_id'],
        "payment_type"  => $alipay_config['payment_type'],
        "notify_url"    => $alipay_config['notify_url'],
        "return_url"    => $alipay_config['return_url'],
        
        "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
        "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
        "out_trade_no"  => $out_trade_no,
        "subject"   => $subject,
        "total_fee" => $total_fee,
        "body"  => $body,
        "_input_charset"    => trim(strtolower($alipay_config['input_charset']))
        //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
        //如"参数名"=>"参数值"
        
);


//建立请求
$alipaySubmit = new \AlipaySubmit($alipay_config);

$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;

 }

    //修改还钱
    public function bor_status(){
                        $bor_status=$_GET['bor_status'];//状态
                        $bor_id= $_GET['bor_id'];//操作ID
         
                        $info=DB::table('borrow')->where('id',$bor_id)->update(['bor_status'=>'1']);
                        if($info)
                        {
                            echo 1;
                        }
            }

}