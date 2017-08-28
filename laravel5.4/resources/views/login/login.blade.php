@extends("layout.main")

@section("content")
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
                <form>
                    <fieldset>
                        <p class="mt20">
                            <input type="text" placeholder="用户名/手机" class="lg_input01 lg_input">
                        </p>
                        <p class="mt20">
                            <input type="text" placeholder="密码" class="lg_input02 lg_input">
                        </p>
                        <p class="clearfix lg_check"><span class="fl"><input type="checkbox">记住用户名</span><a href="" class="fr">忘记密码？找回</a></p>
                        <p><a href="" class="lg_btn">立即登陆</a></p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- footer start -->
@endsection