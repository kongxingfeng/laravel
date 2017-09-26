<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:06
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller{
    public function index(){

        $users = DB::table('gain')
            ->leftJoin('status', 'gain.status', '=', 'status.cate_id')
            ->get();
        $data=array();
        foreach($users as $key=>$val){
            $data[$val->status][]=$val;
        }
        return view('index.index',['data'=>$data]);
    }

}