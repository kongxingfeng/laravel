@extends("layout.main")
@section("content")
@include('layout.nav')
	<div class="zscf_banner_wper3">
  </div>
	<div class="bian2">
  
  <div class="zxcf_nav_l fl">
    <img src="images/u=462566746,3822839051&fm=27&gp=0.jpg" alt="" width="450" height="80">
  </div>
  <div class="clearfix clear">
        <div class="bor_det_oner fl" style="width:600px;position:relative;left:80px;top:10px">
                            <form method="post" action="/add2" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- <fieldset> -->
                                <input type="hidden" name="bor_type" value="无抵押">

                                <div>
                                    <label>申请人</label>
                                    <input type="" name="bor_name" class="bor_name">
                                    <font class="errorMsg1" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*借款金额</label>
                                    <input type="" class="bor_inputbg01 bor_money" name="bor_money">
                                    <font class="errorMsg2" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*借款期限</label>
                                    <input type="" class="bor_inputbg02 bor_month" name="bor_month" onkeyup="this.value=this.value.replace(/[^\d]/g,'') "  maxlength="6">
                                    <font class="errorMsg3" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*还款金额</label>
                                    <font class="bor_qian" color="green" name="bor_qian" size="3px"></font>
                                    <input type="hidden" name="bor_huan" class="bor_huan">
                                </div>
                                <div class="mt15">
                                    <label>*身份证号</label>
                                    <input id="id_card" name="id_card" type="text" maxlength="18" onkeyup="value=value.replace(/^[a-zA-Z]+\D*|^\d{0,16}[a-zA-Z]+|[^0-9Xx]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" />
                                    <font class="errorMsg4" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*手机号码</label>
                                    <input type=""  name="tel" class="tel">
                                    <font class="errorMsg5" color="red"></font>
                                </div>
                                <!-- <div class="mt15 guarmethod clearfix">
                                    <label class="guarmethod_l fl">*担保方式</label>
                                    <div class="fl">
                                        <span>房屋数量</span>
                                        <input type="hidden" name="bor_type" value="房">
                                        <input type="text" class="bor_inputbg03 input2 goods_num" name="goods_num"  onkeyup="this.value=this.value.replace(/[^\d]/g,'') "  maxlength="6">
                                        <font class="errorMsg6" color="red"></font><br><br>
                                        <span>总价值</span>
                                        <input type="text" class="bor_inputbg04 input2 money" name="money">
                                        <font class="errorMsg7" color="red"></font><br>
                                    </div>

                                </div> -->

                                 <div class="mt15">
                                    <label>*上传身份证正面</label>
                                    <input id="photo" type="file"  multiple="multiple" style="width: 0px;"> 
                                        <span id="img1"></span>
                                         <input type="hidden" name="img" value="" id="img">
                                   
                                    
                                </div>
                                <div class="mt15">
                                    <label>*上传身份证背面</label>
                                    <input id="photo2" type="file"  multiple="multiple" style="width: 0px;"> 
                                        <span id="img3"></span>
                                         <input type="hidden" name="img2" value="" id="img2">
                                   
                                    
                                </div>
                                <div class="mt15">
                                    <label>*借款用途</label>
                                    <input type="" name="text" class="text">
                                    <font class="errorMsg8" color="red"></font>
                                </div>

                                <div class="mt15">
                                    <label>*借款描述</label>
                                    <textarea name="bor_text" class="bor_text"></textarea>
                                    <font class="errorMsg9" color="red"></font>

                                </div>
                                <div class="mt15">
                                    <label>*借款情况</label>
                                    <input type="radio" class="input3 case" name="case" value="普通借款">
                                    普通借款
                                    <input type="radio" class="input3 case" name="case" value="紧急借款">
                                    紧急借款
                                </div>
                                <div class="mt30">
                                    <label></label>
                                <!--   <a href="" class="bor_btn">提交材料</a> 
                                  <a href="#" class="btn btn-default btn-lg">白色</a>
                                  <a href="#" class="btn btn-primary btn-lg">深蓝</a>
                                   <a href="/borrow/add" class="bor_btn btn-success" style="margin-left:40px;">提交材料</a> 
                                   <a href="#" class="btn btn-info btn-lg">淡蓝</a> -->
                                    <input type="submit" value="提交" class="submit">
                                </div>
                                <!-- </fieldset> -->
                            </form>
                        </div>        
   </div>
   <div class="zscf_banner_wper5"></div>
  
 

</div>
&nbsp;
 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">

$(function(){         
//房屋照片 无数新展示
     $("#photo").change(function(){
      var form = new FormData();
      var file = $(this);
      form.append('img',file[0].files[0]);
      $.ajax({
        type: "post",
        url: "/img_add",
        data: form,     
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
           // alert(result);
          if(result == 0){
            alert("文件上传失败");
            return false;
          }else{
            //file.parent().next().html("<img src='uploads/"+result+"' style='width:100px'>");
            $("#img").val(result);
             $("#img1").html("&nbsp;&nbsp;&nbsp;&nbsp;<img src='uploads/"+result+"' style='width:100px'>");
            return true;
          }
        }
     });
    });

    // //背面
     $("#photo2").change(function(){
      var form = new FormData();
      var file = $(this);
      form.append('img2',file[0].files[0]);
      $.ajax({
        type: "post",
        url: "/img_add2",
        data: form,     
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
           // alert(result);
          if(result == 0){
            alert("文件上传失败");
            return false;
          }else{
            //file.parent().next().html("<img src='uploads/"+result+"' style='width:100px'>");
            $("#img2").val(result);
             $("#img3").html("&nbsp;&nbsp;&nbsp;&nbsp;<img src='uploads/"+result+"' style='width:100px'>");
            return true;
          }
        }
     });
    });




            //房屋
            flag=false;
            //汽车
            flab=false;
            //房屋
            //账号验证
            $('.tel').blur(function(){
                var tel=$('.tel').val();
                if(tel==""){
                    $('.errorMsg5').text('账号不能为空！');
                    flag = false;
                    return;
                    //长度验证
                }else if(tel.length!=11){
                    $('.errorMsg5').text('注册账号为手机号码！');
                    flag = false;
                    return;
                }else{
                    $('.errorMsg5').empty();
                    flag=true;
                }
            });
            //申请人验证
            $('.bor_name').blur(function(){
                var name=$('.bor_name').val();
              
                if(name==""){
                    $('.errorMsg1').text('昵称不能为空！');
                    flag= false;
                    return;
                }else{
                    $('.errorMsg1').empty();
                    flag=true;
                }
            });
            //借款验证
            $('.bor_money').blur(function(){
                var bor_money=$('.bor_money').val();
                if(bor_money==""){
                    $('.errorMsg2').text('借款不能为空！');
                    flag= false;
                    return;
                }else if(bor_money<1){
                    $('.errorMsg2').text('借款最少为一万元！');
                    flag= false;
                    return;
                }else if(bor_money>50){
                    $('.errorMsg2').text('借款最多为50万元！');
                    flag= false;
                    return;
                }else{
                    $('.errorMsg2').empty();
                    flag=true;
                }
            });
            //期限验证
            $('.bor_month').blur(function(){
                var bor_money=$('.bor_money').val();//借的钱
                var bor_month=$('.bor_month').val();

                if(bor_month==""){
                    $('.errorMsg3').text('期限不能为空！');
                    flag= false;
                    return;
                }else if(bor_money!=""){
                    $('.errorMsg3').attr('color')
                    $('.errorMsg3').text('借率为10%').attr(color='green');
                    var bor_qian=bor_money*10000+bor_money*10000*0.1*bor_month;
                    //alert(bor_qian);
                    $('.bor_qian').text(bor_qian);
                    $('.bor_huan').val(bor_qian);
                    flag=true;
                }else{
                    $('.errorMsg3').empty();
                    flag=true;
                }
            });

            //身份证验证
            $('.id_card').blur(function(){
                var id_card=$('.id_card').val();

                if(id_card==""){
                    $('.errorMsg4').text('身份证不能为空！');
                    flag= false;
                    return;
                }else{
                    $('.errorMsg4').empty();
                    flag=true;
                }
            });
            //房屋或车辆验证
            $('.goods_num').blur(function(){
                var goods_num=$('.goods_num').val();
                if(goods_num==""){
                    $('.errorMsg6').text('数量不能为空！');
                    flag= false;
                    return;
                }else{
                    $('.errorMsg6').empty();
                    flag=true;
                }
            });
            //总价值验证
            $('.money').blur(function(){
                var money=$('.money').val();
                if(money==""){
                    $('.errorMsg7').text('价值不能为空！');
                    flag= false;
                    return;
                }else{
                    $('.errorMsg7').empty();
                    flag=true;
                }
            });
            //用途验证
            $('.text').blur(function(){
                var text=$('.text').val();
                if(text==""){
                    $('.errorMsg8').text('用途不能为空！');
                    flag= false;
                    return;
                }else{
                    $('.errorMsg8').empty();
                    flag=true;
                }
            });
            //描述验证
            $('.bor_text').blur(function(){
                var bor_text=$('.bor_text').val();
                if(bor_text==""){
                    $('.errorMsg9').text('描述不能为空！');
                    flag= false;
                    return;
                }else{
                    $('.errorMsg9').empty();
                    flag=true;
                }
            });




   });
          
    </script>

@endsection  	
	

