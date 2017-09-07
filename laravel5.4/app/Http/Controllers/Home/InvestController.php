<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:45
 */

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Request;


//use App\Models\Earnings;

class InvestController extends Controller
{

    public function index()
    {
        //项目收益
        $earnings = DB::table('pro_earnings')
            ->get();
        //数据 返回值是对象
        $gain = DB::table('gain')
            ->get();
        $arr = [
            'earnings' => $earnings,
            'gain' => $gain
        ];
        return view('invest/index',$arr);
    }
    //查询
    public function select()
    {
        $requset = Request::all();//接值，返回值是一维数组
//        理财期限
        $life = $requset['life'];
        $earnings_id = $requset['earnings'];
//        理财收益
        $earnings = DB::table('pro_earnings')
            ->where('id',$earnings_id)
            ->first();
        $earningsArr = explode('-',$earnings->name);
        $lifeArr = explode('-',$life);
        echo '<pre>';
        print_r($lifeArr);
    }
    //支付表单页面
    public function add()
    {
        
        if(!(\Auth::check()) && !session('qid')) {
            return redirect('/login');
        }

        $request = Request::all();
        $id = $request['id'];
        $where = DB::table('gain')
            ->where('id',$id)
            ->get();
        $arr = [
            'one'=>$where[0],
        ];

     
        return view('invest/invest',$arr);
    }
    //支付添加页面
    public function invest()
    {

        $request = Request::all();//接值 
        if(\Auth::check()){

             $uid=\Auth::user()->id;
        //获取用户的信息查看是否实名登录和余额是否充足
             $arr = DB::table('users')
            ->where('id',$uid)
            ->get()
            ->toArray();
        //判断是否实名认证
           if(!($arr[0]->idcard) && !($arr[0]->username)){
               echo "<script>alert('请先实名认证');location.href='/ss'</script>";die;
           }
        //判断金钱是否充足
            if($request['money']>$arr[0]->money){
                echo "<script>alert('余额不足请先充值');location.href='/account'</script>";die;
            }
        }else{

            $uid=session('qid');

            $arr = DB::table('san')
            ->where('qid',$uid)
            ->get()
            ->toArray();
           
        //判断是否实名认证
           if(!($arr[0]->idcard) && !($arr[0]->username)){
               echo "<script>alert('请先实名认证');location.href='/ss'</script>";die;
           }
        //判断金钱是否充足
            if($request['money']>$arr[0]->money){
                echo "<script>alert('余额不足请先充值');location.href='/account'</script>";die;
            }
        }
        $data =[
            'u_id' => $uid,//用户id ，用session或cokie接值
            'money' => $request['money'],
            'in_id' => $request['id'],
            'interest' =>$request['interest'],//利息
            'start_time' =>date('Y-m-d'),
            'long' => $request['end_time'],
            'total_money' => $request['total_money'],
        ];
        $result = DB::table('invest')
            ->insert($data);

        if ($result) {
            if(\Auth::check()){

               $uid=\Auth::user()->id;

               $users = DB::table('users')
                ->where('id',$uid)
                ->get()
                ->toArray();
            
           $money=$users[0]->money;
           $newMoney=$money-$request['money'];
//修改账户余额
              DB::table('users')
                ->where('id', $uid)
                ->update(array('money' =>$newMoney));

            }else{
                $uid=session('qid');

               $users = DB::table('san')
                ->where('qid',$uid)
                ->get()
                ->toArray();
            
           $money=$users[0]->money;
           $newMoney=$money-$request['money'];
//修改账户余额
              DB::table('san')
                ->where('qid', $uid)
                ->update(array('money' =>$newMoney));
            }
            echo "<script>alert('支付成功');location.href='/invest'</script>";
        } else {
            echo "<script>alert('支付失败');location.href='/add'</script>";
        }
    }
}