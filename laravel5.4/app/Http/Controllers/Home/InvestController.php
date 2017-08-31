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

        if (!(\Auth::check())) {
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

        if (!(\Auth::check())) {
            return redirect('/login');
        }
        $request = Request::all();//接值
        $data =[
            'u_id' => \Auth::user()->id,//用户id ，用session或cokie接值
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
            echo "<script>alert('支付成功');location.href='/invest'</script>";
        } else {
            echo "<script>alert('支付失败');location.href='/add'</script>";
        }
    }
}