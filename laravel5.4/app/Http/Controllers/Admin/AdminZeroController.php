<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;
use Request;

class AdminZeroController extends Controller
{
    public function show()
    {
        if(Request::ajax()) {
            $type = Input::get('type');//状态
            $type =1;
            $bor_id = Input::get('bor_id');//那条数据库的ID
            $bor_time = date('Y-m-d');//审核通过时间
            $bor_month=DB::table('zero')
                ->select('bor_month')
                ->where('id',$bor_id)
                ->first();
            $bor_etime=date("Y-m-d", strtotime("+".$bor_month->bor_month." months", strtotime($bor_time)));//还款时间
            $result = DB::table('zero')
                ->where('id', $bor_id)
                ->update(['status' => $type,'bor_time'=>$bor_time,'bor_etime'=>$bor_etime]);
            if ($result) {
                return $bor_etime;
            }
        } else {
            $zero = DB::table('zero')
                ->leftJoin('zero_img','zero_img.bor_id', '=','zero.id')
                ->get();
            return view('AdminZero/show',['data'=>$zero]);
        }

    }
}
?>