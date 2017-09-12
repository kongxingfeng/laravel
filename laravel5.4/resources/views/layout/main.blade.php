<?php

require_once '../public/qq/function.php';
require_once '../public/qq/Connect2.1/qqConnectAPI.php';

if(isset($_SESSION['qq_accesstoken']) || isset($_SESSION['qq_openid'])){
    $qc = new QC($_SESSION['qq_accesstoken'],$_SESSION['qq_openid']);
    $data = $userinfo = $qc->get_user_info();  
     $where = DB::table('san')
            ->where('qid',$_SESSION['qq_openid'])
            ->get()
            ->toArray();
      if(empty($where)){
       
        $name=base64_encode($data['nickname']);
        $arr=[
            'qid' =>$_SESSION['qq_openid'],//QQ登录id
             'name' =>$name,
            'date' =>date('Y-m-d H:i:s')
        ];
           
        $result = DB::table('san')
            ->insert($arr);
      }
     
    session(['qid'=>$_SESSION['qq_openid']]);
}


?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet/less" type="text/css" href="css/style.less" /> -->
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/all.js"></script>
    <!-- 在线客服 -->
    <script src='http://home.wolive.cc/assets/js/index/kefu_online.js'></script>
       <!--[if IE 6]>
    <script src="./js/iepng.js" type="text/javascript"></script>
    <script type="text/javascript">
        EvPNG.fix('div, ul, img, li, input,span, p');
    </script>
    <![endif]-->
</head>
<style>
    
    body,html{
        width:100%;
        height:100%;
        background: #ccc;
    }

    .wrap{
        width:300px;
        height:80px;
        float: right;
        position: relative;
        
    }
    .face{
        width:80px;
        height:80px;
        text-align:center;
        line-height: 80px;
        margin-left:200px;
        box-sizing:border-box;
    }
    .face img{
        display: inline-block;
        width:50px;
        height:50px; 
        border-radius: 50%;
    }
    .ha img{
        width:80px;
        height:80px;
        border-radius: 50%;
    }
    .exit{
        width:300px;
        height:250px;
        background: #eee;
        position: absolute;
        right:20px;
        top:70px;
        display: none;
        z-index:9999;
    } 
    .exit dl{
        width:100%;
        height:100px;
        display: flex;
        padding:10px 20px;
        box-sizing:border-box;
    }
    .exit dl dt{
        flex:1;
        width:50px;
        height:80px;
        border-radius:50%;
       
        text-align:center;
        line-height: 80px;
    }
    .exit dl dd{
        flex:2;
        margin-left:20px;
        line-height: 30px;
    }
    .exit dl dd p{
        margin-top:10px;
        color:block;
        font-weight: bold;
    }
    .mycon{
        width:100%;
        height:120px; 
        box-sizing:border-box;
        padding:20px 20px 20px 20px;
       
    }
    .mycon p{
        width:260px;
        height:40px;
        background: #ccc;
    }
    .mycon p span{
        display: inline-block;
        width:130px;
        height:40px;
        line-height: 40px;
        text-align:center;
        color:#fff;
        border-right:2px solid #fff;
        border-bottom:2px solid #fff;
        font-size: 14px;
        box-sizing:border-box;
    }
    .mybtn{
        width:100px;
        margin-left:200px;
        color:green;
        background: none;
        outline: none;
        border:none;
    }
    .box{
        width:100%;
        background:rgba(0,0,0,0.3);
        position: absolute;
        left:0;
        top:0;
        z-index: 99999;
        height:100%;
        display:none;
    }
    .center{
        width:300px;
        height:300px;
        background: #fff;
        position: fixed;
        left:50%;
        top:50%;
        margin-top:-150px;
        margin-left:-150px;
        text-align: center;
    }
    .center h2{
        width:100%;
        height:200px;
        line-height: 200px;
        color:black;
        font-size: 30px;
    }
    .center button{
        width:80px;
        height:30px;
        border:none;
        outline:none;
        border-radius: 5px;
        color:#fff;
    }
    .sure{
        background: #ccc;
        margin-right:10px;
    }
    .reset{
       background:red;
       margin-left:10px;
    }
    
</style>

<body>
<!-- header start -->
<div class="zxcf_top_wper">
    <div class="zxcf_top px1000 clearfix">
        <div class="zxcf_top_l fl">
            <img src="images/zxcf_phone.png" alt="">
            400-027-0101(工作时间9:00-17:30)
     
        </div>
@if (\Auth::check() || isset($_SESSION['qq_openid']))
    @if(\Auth::check())
    <a  href='http://home.wolive.cc'   user_id='' username='{{ \Auth::user()->name }} ' avatar=''  web_id='18410178859'   id='workerman-kefu'></a>
    @else
    <a  href='http://home.wolive.cc'   user_id='' username='{{$data['nickname']}}' avatar=''  web_id='18410178859'   id='workerman-kefu'></a>
    @endif 
@else
    <a  href='http://home.wolive.cc'   user_id='' username='' avatar=''  web_id='18410178859'   id='workerman-kefu'></a>

        <div class="zxcf_top_r fr">
            <a href="/login" class="/login">立即登录</a>
            <span>|</span>
            <a href="/register">免费注册</a>
            <span>|</span>
            <a href="">常见问题</a>
        </div>
@endif
    </div>
</div>
<!-- end top -->
<div class="zxcf_nav_wper">
    <div class="zxcf_nav clearfix px1000">
        <div class="zxcf_nav_l fl"><img src="images/u=462566746,3822839051&fm=27&gp=0.jpg" alt="" width="450" height="80"></div>
        <div class="" style="float: right ;padding-top: 20px">
            
            @if (\Auth::check())
            {{ \Auth::user()->name }}   &nbsp;&nbsp;&nbsp;<a href="/logout">退出</a>
            @elseif(isset($_SESSION['qq_accesstoken']) || isset($_SESSION['qq_openid']))
            
            <ul class="list_01"><img src="{{$data['figureurl']}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$data['nickname']}}</a>&nbsp;&nbsp;
            <a href="/qqlogout">退出</a>
            </ul>
        <div class="zxcf_nav_l fl" style="float:left"><img src="images/u=462566746,3822839051&fm=27&gp=0.jpg" alt="" width="450" height="80"></div>
        <div class="wrap">
            <p class="face" id="face">
            @if (\Auth::check())
            <img src="images/zxcf_perinfo.png" alt="">
            @elseif(isset($_SESSION['qq_accesstoken']) || isset($_SESSION['qq_openid']))
            <img src="{{$data['figureurl']}}">
            @elseif(isset($_SESSION['sinauid']))
            <img src="{{$_SESSION['profile_image_url']}}">
            @else
            <img src="images/zxcf_perinfo.png" alt="">
           <!--  <img src="images/1228.png" alt=""> -->
            @endif
            </p>
            <!--把以下内容放在头像元素的后面-->
            <div class="exit" id="exit">
                <dl>
                    <dt>
                        <p class="ha" id="ha">
                            @if (\Auth::check())
                            <img src="images/zxcf_perinfo.png" alt="">
                            @elseif(isset($_SESSION['qq_accesstoken']) || isset($_SESSION['qq_openid']))
                            <img src="{{$data['figureurl']}}">
                            @elseif(isset($_SESSION['sinauid']))
                            <img src="{{$_SESSION['profile_image_url']}}">
                            @else
                            <img src="images/zxcf_perinfo.png" alt="">
                            @endif
                        </p>
                    </dt>
                    <dd>
                      <p>
                            用户名: 
                            @if (\Auth::check())
                            {{ \Auth::user()->name }}
                            @elseif(isset($_SESSION['qq_accesstoken']) || isset($_SESSION['qq_openid']))
                            {{$data['nickname']}}
                            @elseif(isset($_SESSION['sinauid']))
                            {{$_SESSION['screen_name']}}
                            @else
                            请先登录
                            @endif
                    </p>
                    </dd>
                </dl>
                <div class="mycon">
                    <p><a href="/borrow"><span>我的借款</span></a><a href="/account"><span>我的账户</span></a></p>
                    <p><a href="/invest"><span>我的投资</span></a><a href="/money"><span>实时财务</span></a></p>
                </div>
                <button id="btn" class="mybtn">安全退出</button>
            </div>
        </div>

        <div id="box" class="box">
        <div class="center" id="center">
            <h2>确定退出吗？</h2>
            @if (\Auth::check())
            <a href="/logout"><button class="sure" id="btn1">确定</button></a>
            @elseif(isset($_SESSION['qq_accesstoken']) || isset($_SESSION['qq_openid']))
            <a h<a href="/"><button class="sure" id="btn1">确定</button></a>ref="/qqlogout"><button class="sure" id="btn1">确定</button></a>
            @elseif(isset($_SESSION['sinauid']))
            <a href="/sinatui"><button class="sure" id="btn1">确定</button></a>
            @else
            <a href="/"><button class="sure" id="btn1">确定</button></a>
            @endif
            <a href=""><button class="reset" id="btn2">再想想</button></a>
        </div>
        </div>
        <script src="script.js"></script>
        <script src="js/jquery.min.js"></script>
        <script>
        //在此调用
        
        //划过头像点击退出弹出遮罩层
        hoverFace({
            "face":"#face",//头像元素的id
            "exit":"#exit",//内容的id
            "btn":"#btn",//退出按钮的id

            "box":"#box"//遮罩盒子
        })
        </script>
        

    </div>
</div>

<!-- end  -->
@yield("content")
<!-- footer start -->
<div class="zscf_aboutus_wper">
    <div class="zscf_aboutus px1000 clearfix">
        <div class="zscf_aboutus_l fl">
            <ul class="zscf_aboutus_lul clearfix">
                <li class="pt10"><a href=""><img src="images/app.png" alt=""></a>
                </li>
                <li>
                    <p class="pb20">服务热线</p>
                    <strong>400-027-0101</strong>
                </li>
                <li>
                    <p class="pb10 linkpic">
                        <a href=""><img src="images/ft_sina.png" alt=""></a>
                        <a href=""><img src="images/ft_weixin.png" alt=""></a>
                        <a href=""><img src="images/ft_erji.png" alt=""></a>
                    </p>
                    <p><a href="">kefu@zhongxincaifu.com</a></p>
                </li>
            </ul>
        </div>
        <!-- end left -->
        <div class="zscf_aboutus_r fl clearfix">
            <a href="#" class="fl ft_ewm"><img src="images/ft_erweima.png" alt=""></a>
            <ul class="fl clearfix">
                <li><a href="">联系我们</a></li>
                <li><a href="">我要融资</a></li>
                <li><a href="">帮助中心</a></li>
                <li><a href="">友情链接</a></li>
                <li><a href="">招贤纳士</a></li>
                <li><a href="">收益计算器</a></li>
            </ul>
        </div>
        <!-- end right -->

    </div>
</div>

<div class="zscf_bottom_wper">
    <div class="zscf_bottom px1000 clearfix">
        <p class="fl">© 2014 zhongxincaifu &nbsp;  &nbsp;&nbsp;   熊猫财富金融信息服务股份有限公司 &nbsp;&nbsp;&nbsp;    鄂ICP备14017254号-1</p>
        <p class="fr">
            <a href=""><img src="images/360.png" alt=""></a>
            <a href=""><img src="images/kexin.png" alt=""></a>
            <a href=""><img src="images/norton.png" alt=""></a>
        </p>
    </div>
</div>
<!-- footer end -->
</body>
</html>
 