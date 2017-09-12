@extends("layout.main")

@section("content")
<?php
require_once '../public/qq/function.php';
require_once '../public/qq/Connect2.1/qqConnectAPI.php';

//require_once 'QQ_Logo_wiki.psd';
?>
    <!-- end  -->
    <div class="login_con_wper">
        <div class="login_con px1000 ">
            <div class="lg_section clearfix">
                <div class="lg_section_l fl">
                    <img src="images/lg_bg02.png">
                </div>
                <!-- end l -->
                <div class="lg_section_r fl">
                    <h2 class="lg_sec_tit clearfix">
                        <span class="fl">登录</span>
                        <em class="fr">没有帐号，<a href="">立即注册</a></em>
                    </h2>
                    <form method="post" action="/addlogin">
                        {{ csrf_field() }}
                        <fieldset>
                            <p class="mt20">
                                <input type="text" placeholder="用户名/手机" name="name" class="lg_input01 lg_input">
                            </p>
                            <p class="mt20">
                                <input type="text" placeholder="密码" name="password" class="lg_input02 lg_input">
                            </p>

                     <p class="mt20"> 
    <input style=" width :100px" placeholder="请输入验证码" type="text" required="required" name="captcha" id="code" class="lg_input02 lg_input"> 
    <a href="javascript:void(0)" onclick="document.getElementById('captcha').src='{{URL('captcha/1')}}'+Math.random()"><img src="{{URL('captcha/1')}}" name="captcha" id="captcha" alt="验证码" title="看不清，换一张"> </a>
    </p>
                            @include('layout.error')
                            <p class="clearfix lg_check"><span class="fl"><input type="checkbox" value="1" name="is_remember">记住用户名</span><a href="" class="fr">忘记密码？找回</a></p>
                            <p><input type="submit" class="lg_btn" value="立即登陆"></p>
                            <p class="clearfix lg_check"><span class="fl">其他第三方登录</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href=""><img src="images/zxcf_weixin.png" alt=""></a>&nbsp;&nbsp;&nbsp;
                            <a href="/sina2"><img src="images/zxcf_sina.png" alt=""></a>&nbsp;&nbsp;&nbsp;
                <?php if(!isset($_COOKIE['qq_accesstoken']) || !isset($_COOKIE['qq_openid'])){?>
                        <a href="/qqlogin"><img src="images/zxcf_qq.png" alt=""></a>
                <?php }?></p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->
@endsection