<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-08 0008
 * Time: 16:50
 * 积分签到
 */
namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IntegralController extends  Controller
{
//    添加积分
    public function add()
    {
        if (\Auth::check()) {
            $user_id=\Auth::user()->id;
        } else {
            $user_id = session('qid');
        }
        
        $where = DB::table('integral')
            ->where('u_id',$user_id)
            ->get();
        $count = count($where);
        if ($count == 0){
            $data = [
                'u_id' => $user_id,
                'com' => '签到',
                'add_time' => date('Y/m/d H:i:s',time()),
                'grade' => '+5',
                'nums' => 1,
            ];
            $result = DB::table('integral')
                ->insert($data);
            if ($result) {
                 $integral = DB::table('integral')
                    ->select('grade')
                    ->where('u_id',$user_id)
                    ->get();
            $integralNums = '';
            foreach ($integral as $var){
                $integralNums +=$var->grade;
            }
                $integralNums = $integralNums == ''?0:$integralNums;
                return $integralNums;
            } else {
                return -3;
            }
        } else {
            $nums = '';
            foreach ($where as $var) {
                $data = explode(' ',$var->add_time);
                if ($data[0] == date('Y/m/d')) {
                    return -4;
                } else if($data[0]==date('Y/m/d',strtotime("-1 day"))) {
                    $nums = $var->nums>=7?1:$var->nums+1;
                } else {
                    $nums = 1;
                }
            }
            $data = [
                'u_id' => $user_id,
                'com' => '签到',
                'add_time' => date('Y/m/d H:i:s',time()),
                'grade' => '+'.$nums*5,
                'nums' => $nums,
            ];
            $result = DB::table('integral')
                ->insert($data);
            if ($result) {
                $integral = DB::table('integral')
                    ->select('grade')
                    ->where('u_id',$user_id)
                    ->get();
            $integralNums = '';
            foreach ($integral as $var){
                $integralNums +=$var->grade;
            }
                $integralNums = $integralNums == ''?0:$integralNums;
                return $integralNums;
            } else {
                return -3;
            }
        }

    }
}