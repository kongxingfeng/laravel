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

class MoneyController extends Controller {

    public function index()
    {
        //计算今日成交金额
        $time = date("Y-m-d");
    
        //查询数据库
        $sql = "select * from invest where start_time like '%$time%'";
       
        $list = DB::select($sql);

      
       	$sum_money='';
        foreach ($list as $k=> $v) {
        	$sum_money+=$v->money;
        }
        //计算30天日期
        $data = DB::select("select start_time,sum(money) as new_sum  from invest group by start_time ORDER BY start_time desc limit 0,30");
       	$new_time='';
       	$head='[';
        $foot=']';

       	foreach ($data as $k=> $v) {
        	$new_time.="'".substr($v->start_time, 5,8)."',";
        }
      	$new_time = $head.$new_time.$foot;

        $new_sum='';
       
        foreach ($data as $k=> $v) {
        	$new_sum.=$v->new_sum.",";
        }
       $sum= $head.$new_sum.$foot;
        return view('money/money',['sum_money'=>$sum_money,'new_time'=>$new_time,'new_sum'=>$sum]);
       
    }
   
}