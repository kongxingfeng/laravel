@extends("layout.main")

@section("content")
    <!-- end  -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <div class="reg_con_wper">
        <div class="reg_con px1000">
            <div class="reg_box clearfix">
                <div class="reg_box_l fl">
                    <img src="
                  images/reg_pic01.png" alt="">
                </div>
                <div class="reg_box_r fl">
                    <h2 class="lg_sec_tit clearfix">
                        <span class="fl">认证</span>
                        <em class="fr">没有帐号，<a href="">立即登录</a></em>
                    </h2>
                    <form method="post" action="/id" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <fieldset>
                            <p class="mt20">
                                <input type="text" placeholder="姓名" name='name' class="lg_input01 lg_input">
                                <font class="cerrorMsg10" color="red"></font>
                                <font class="cerrorMsg11" color="green"></font>
                            </p>
                            <p class="mt20">
                                <input type="text" placeholder="身份证号码" name='idcard' class="lg_input01 lg_input">
                                <font class="cerrorMsg9" color="red"></font>
                                <font class="cerrorMsg" color="green"></font>
                            </p> 
                            <p class="mt20">
                                <input type="file" value="re" name='img' class="lg_input01 lg_input">
                            </p> 

                           

                            @include('layout.error')
                            <p class="pt10"><a href="">使用条款</a>&nbsp;&nbsp;<a href="">隐私条款</a></p>
                            <p class="mt20"><input type="submit" class="lg_btn" value="立即认证"></p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
    var res=false;
    var reg=false;

    $("input[name='idcard']").on('blur',function(){
        var idcard=$("input[name='idcard']").val();
        $.ajax({
            type:'post',
            data:{idcard:idcard},
            url:'/verify',
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            success:function(data){
                console.log(data);
                if(data=='成功的返回'){ 

                    $('.cerrorMsg').text('✔');
                    $('.cerrorMsg9').empty();

                    res=true;

                }else{

                    $('.cerrorMsg').empty();
                    $('.cerrorMsg9').text('请输入正确的身份证号');

                    res=false;
                }
            }
        })
    })
    $("input[name='name']").on('blur',function(){
        var a=/^[\u4E00-\u9FA5]+$/;
        var cal=$("input[name='name']").val();
        var is= a.test(cal)
        if(is){
            
            $('.cerrorMsg11').text('✔');
            $('.cerrorMsg10').empty();
            res=true; 
        }else{
            $('.cerrorMsg10').text('请输入正确的中文名');
            $('.cerrorMsg11').empty();
            res=false; 
        }
    })
    $("input[type='submit']").on('click',function(){
        if(res){
            return true;
        }else{
                alert('信息有误，请重新输入');
             return false;

        }
       
    })

    </script>
@endsection
