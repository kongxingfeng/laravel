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
                    <form method="post" action="/addRegister">
                        {{csrf_field()}}
                        <fieldset>
                            <p class="mt20">
                                <input type="text" placeholder="用户名/手机" name='name' class="lg_input01 lg_input">
                            </p>
                            <p class="mt20">
                                <input type="email" placeholder="邮箱地址" name='email' class="lg_input01 lg_input">
                            </p>
                            <p class="mt20">
                                <input type="text" placeholder="密码" name="password" class="lg_input02 lg_input">
                            </p>
                            <p class="mt20">
                                <input type="text" placeholder="密码确认" name="password_confirmation" class="lg_input02 lg_input">
                            </p>
                            <p class="mt20">
                                <input type="text" placeholder="手机号" name="tel" class="lg_input03 lg_input">
                            </p>

                            @include('layout.error')
                            <p class="pt10"><a href="">使用条款</a>&nbsp;&nbsp;<a href="">隐私条款</a></p>
                            <p class="mt20"><input type="submit" class="lg_btn" value="立即登陆"></p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->
@endsection