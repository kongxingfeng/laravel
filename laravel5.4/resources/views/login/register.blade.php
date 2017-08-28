@extends("layout.main")

@section("content")
<!-- end  -->
<div class="reg_con_wper">
    <div class="reg_con px1000">
        <div class="reg_box clearfix">
            <div class="reg_box_l fl">
                <img src="
		   	   	  images/reg_pic01.png" alt="">
            </div>
            <div class="reg_box_r fl">
                <h2 class="lg_sec_tit clearfix">
                    <span class="fl">注册</span>
                    <em class="fr">没有帐号，<a href="">立即登录</a></em>
                </h2>
                <form>
                    <fieldset>
                        <p class="mt20">
                            <input type="text" placeholder="用户名/手机" class="lg_input01 lg_input">
                        </p>
                        <p class="mt20">
                            <input type="text" placeholder="密码" class="lg_input02 lg_input">
                        </p>
                        <p class="mt20">
                            <input type="text" placeholder="密码确认" class="lg_input02 lg_input">
                        </p>
                        <p class="mt20">
                            <input type="text" placeholder="手机号" class="lg_input03 lg_input">
                        </p>
                        <p class="mt20 yanzheng">
                            <input type="text" placeholder="验证码" class="lg_input04 lg_input">
                            <span href="#">发送验证码</span>
                        </p>
                        <p class="mt20">
                            <input type="text" placeholder="邀请码" class="lg_input03 lg_input">
                        </p>
                        <p class="pt10"><a href="">使用条款</a>&nbsp;&nbsp;<a href="">隐私条款</a></p>
                        <p class="mt20"><a href="" class="lg_btn">立即登陆</a></p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- footer start -->
@endsection