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
use Storage;
use App\Http\Requests;


use Illuminate\Http\Request;
class BorrowController extends Controller {
    public $enableCsrfValidation=false;
    public function index()
    {
         if(!(\Auth::check()) && !session('qid')){


              return view('login/login');
        }else{
            
             return view('borrow/index');
        }
<<<<<<< HEAD
=======
         // return view('borrow/index');
>>>>>>> 段新宇
    }
    public function add(Request $request)
    {
         $input=$request->all();
         if(\Auth::check()){
             $user_id=\Auth::user()->id;
        //获取用户的信息查看是否实名登录和余额是否充足
             $arr = DB::table('users')
            ->where('id',$user_id)
            ->get()
            ->toArray();
        //判断是否实名认证
           if(!($arr[0]->idcard) && !($arr[0]->username)){
               echo "<script>alert('请先实名认证');location.href='/ss'</script>";
           }
        }else{
            $user_id=session('qid');
            $arr = DB::table('san')
            ->where('qid',$user_id)
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
        $text=$input['text'];//借款用途
        $bor_text=$input['bor_text'];//借款描述
        $case=$input['case'];//借款情况
        $bor_type=$input['bor_type'];//借款方式 房 或 车
        $bor_huan=$input['bor_huan'];//需要还钱加利息
      
        //添加贷款订单  返回的添加后的id
            $id = DB::table('borrow')->insertGetId([
                             'user_id' => "$user_id",
                            'bor_name' => "$bor_name",
                            'bor_money' => "$bor_money",
                            'bor_month' => "$bor_month",
                            'id_card' => "$id_card",
                            'tel' => "$tel",
                            'goods_num' => "$goods_num",
                            'money' => "$money",
                            'text' => "$text",
                            'bor_text' => "$bor_text",
                            'case' => "$case",
                            'bor_type' => "$bor_type",
                            'bor_qian' => "$bor_huan",
                         ]
            );
         // //文件访问路径
                    $img='/uploads/'.$input['img'];
                    //将图片入库
                    $add_img=DB::table('bor_img')->insert(
                             ['bor_id' => "$id", 'img' => "$img"]
                    );
                    if($add_img){
                        //跳转等待页面
                        return view('borrow.wait');
        }
    }
 //添加图片
        public function img_add(Request $request)
    {       
        $file=$request->file('img');
        //文件是否上传成功
        if($file->isValid()){   //判断文件是否上传成功
            $originalName = $file->getClientOriginalName(); //源文件名
            $ext = $file->getClientOriginalExtension();    //文件拓展名
            $type = $file->getClientMimeType(); //文件类型
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $fileName = date('YmdHis').'-'.uniqid().'.'.$ext;  //新文件名
            $res=Storage::disk('uploads')->put($fileName,file_get_contents($realPath));   //传成功返回bool值
            if($res){
                return $fileName;
            }else{
                return 0;
            }
        }
    }


}