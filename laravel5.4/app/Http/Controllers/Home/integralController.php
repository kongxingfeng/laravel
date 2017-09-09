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
        if (!(\Auth::check())) {
            return -1;
        }
        $user_id=\Auth::user()->id;
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
                return 2;
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
                return 2;
            } else {
                return -3;
            }
        }

    }
}