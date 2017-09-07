<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:35
 */

namespace App\Http\Controllers\Home;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Request;
class BorrowController extends Controller {
    public $enableCsrfValidation=false;
    public function index()
    {
         if(!(\Auth::check()) && !session('qid')){

              return view('login/login');
        }else{
            
             return view('borrow/index');
        }
         // return view('borrow/index');
    }
    public function add()
    {


        $input=Request::all();
         if(\Auth::check()){

             $uid=\Auth::user()->id;
        //获取用户的信息查看是否实名登录和余额是否充足
             $arr = DB::table('users')
            ->where('id',$uid)
            ->get()
            ->toArray();
        //判断是否实名认证
           if(!($arr[0]->idcard) && !($arr[0]->username)){
               echo "<script>alert('请先实名认证');location.href='/ss'</script>";
           }
        }else{

            $uid=session('qid');

            $arr = DB::table('san')
            ->where('qid',$uid)
            ->get()
            ->toArray();
           
        //判断是否实名认证
           if(!($arr[0]->idcard) && !($arr[0]->username)){
               echo "<script>alert('请先实名认证');location.href='/ss'</script>";
           }
        } 

       
        $bor_name=$input['bor_name'];//申请人
        $bor_money=$input['bor_money'];//借款金额（万元）
        $bor_month=$input['bor_month'];//借款期限
        $id_card=$input['id_card'];//身份证号
        $tel=$input['tel'];//手机号
        $goods_num=$input['goods_num'];//担保数量 （）
        $money=$input['money'];//价值
        $text=$input['text'];//借款描述
        $bor_text=$input['bor_text'];//借款描述
        $case=$input['case'];//借款情况
        $bor_type=$input['bor_type'];//借款方式 房 或 车
        $bor_huan=$input['bor_huan'];//需要还钱加利息
        //添加贷款订单
        $data=DB::insert("insert into borrow (user_id,bor_name,bor_money,bor_month,id_card,tel,goods_num,money,text,bor_text,`case`,bor_type,bor_qian) value ('$uid','$bor_name','$bor_money','$bor_month','$id_card','$tel','$goods_num','$money','$text','$bor_text','$case','$bor_type','$bor_huan')", [1]);

        if($data){
            //跳转等待页面
            return view('borrow.wait');
        }
    }

}
