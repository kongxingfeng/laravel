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

            @elseif(isset($_SESSION['sinauid']))
              <img src="{{$_SESSION['profile_image_url']}}"> {{$_SESSION['screen_name']}}&nbsp;&nbsp;&nbsp;<a href="/sinatui">退出</a>
            @else
            <img src="images/zxcf_perinfo.png" alt="">
                <span>未登录
                    <img src="images/zxcf_icon01.png" alt=""></span>
            
            @endif
           


        </div>
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
 