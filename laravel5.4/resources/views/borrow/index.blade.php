@extends("layout.main")

@section("content")
    @include('layout.nav')
<!-- end  -->
<div class="bor_banner01">

</div>
<!-- end banner -->
<div class="bor_con_wper">
    <div class="bor_con px1000">
        <div class="bor_detail">
            <h2 class="bor_detail_tit">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="bor_decurspan">房产抵押</span>
                <span>车辆抵押</span>
            </h2>
            <div class="bor_detail_box">
                <div class="bor_det_one clearfix pt30 pb30">
                    <div class="bor_det_onel fl">
                        <p class="bor_p1">中兴财富平台的借款功能旨在帮助借款用户以
                            低成本获得借款。用户在需要资金时，可以将
                            自有房产和车产作为抵押物，小油菜线下审核
                            通过后，根据抵押物的价值融资。</p>
                        <p class="bor_p2">中兴财富平台的借款功能旨在帮助借款用户以
                            低成本获得借款。用户在需要资金时，可以将
                            自有房产和车产作为抵押物，小油菜线下审核
                            通过后，根据抵押物的价值融资。</p>
                        <h3 class="bor_onel_tit"><span>申请条件</span></h3>
                        <ul class="bor_onel_ul">
                            <li><img src="images/bor_pic01.png" alt="">年满18周岁以上的公民
                            </li>
                            <li><img src="images/bor_pic02.png" alt="">需要北京房产或车产抵押
                            </li>
                            <li><img src="images/bor_pic03.png" alt="">个人或企业银行征信记录良好
                            </li>
                            <li><img src="images/bor_pic04.png" alt="">
                                无现有诉讼记录
                            </li>

                        </ul>
                        <h3 class="bor_onel_tit"><span>提交资料</span></h3>
                        <ul class="bor_onel_ul">
                            <li>&nbsp;<img src="images/bor_pic05.png" alt="">省份证
                            </li>
                            <li><img src="images/bor_pic06.png" alt="">申请资料
                            </li>
                            <li><img src="images/bor_pic07.png" alt="">其他
                            </li>


                        </ul>
                    </div>
                    <!-- end l -->
                    <div class="bor_det_oner fl">
                        <form method="post" action="/borrow_add">
                        {{ csrf_field() }}
                            <!-- <fieldset> -->
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
                                <div class="mt15 guarmethod clearfix">
                                    <label class="guarmethod_l fl">*担保方式</label>
                                    <div class="fl">
                                        <span>房屋数量</span>
                                        <input type="hidden" name="bor_type" value="房">
                                        <input type="text" class="bor_inputbg03 input2 goods_num" name="goods_num"  onkeyup="this.value=this.value.replace(/[^\d]/g,'') "  maxlength="6">>
                                    <font class="errorMsg6" color="red"></font><br><br>
                                        <span>总价值</span>
                                        <input type="text" class="bor_inputbg04 input2 money" name="money">
                                    <font class="errorMsg7" color="red"></font><br>
                                    </div>

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
                                <div class="mt15" >
                                    <label>*验证码</label>
                                    <input type="text" class="yanzheng text" >

                                </div>
                                <div class="mt30">
                                    <label></label>
                                    <!-- <a href="" class="bor_btn">提交材料</a> -->
                                      <!-- <a href="#" class="btn btn-default btn-lg">白色</a>//白色
                                    <a href="#" class="btn btn-primary btn-lg">深蓝</a>//深蓝 -->
                                    <!-- <a href="/borrow/add" class="bor_btn btn-success" style="margin-left:40px;">提交材料</a> --> <!-- 绿色 -->
                                    <!-- <a href="#" class="btn btn-info btn-lg">淡蓝</a>//淡蓝 -->
                                    <input type="submit" value="提交" class="submit">
                                </div>
                            <!-- </fieldset> -->
                        </form>
                    </div>
                </div>



                <!-- end 房产抵押 -->
                <div class="bor_det_one" style="display:none;">
                 <div class="bor_det_one clearfix pt30 pb30">
                    <div class="bor_det_onel fl">
                        <p class="bor_p1">中兴财富平台的借款功能旨在帮助借款用户以
                            低成本获得借款。用户在需要资金时，可以将
                            自有房产和车产作为抵押物，小油菜线下审核
                            通过后，根据抵押物的价值融资。</p>
                        <p class="bor_p2">中兴财富平台的借款功能旨在帮助借款用户以
                            低成本获得借款。用户在需要资金时，可以将
                            自有房产和车产作为抵押物，小油菜线下审核
                            通过后，根据抵押物的价值融资。</p>
                        <h3 class="bor_onel_tit"><span>申请条件</span></h3>
                        <ul class="bor_onel_ul">
                            <li><img src="images/bor_pic01.png" alt="">年满18周岁以上的公民
                            </li>
                            <li><img src="images/bor_pic02.png" alt="">需要北京房产或车产抵押
                            </li>
                            <li><img src="images/bor_pic03.png" alt="">个人或企业银行征信记录良好
                            </li>
                            <li><img src="images/bor_pic04.png" alt="">
                                无现有诉讼记录
                            </li>

                        </ul>
                        <h3 class="bor_onel_tit"><span>提交资料</span></h3>
                        <ul class="bor_onel_ul">
                            <li>&nbsp;<img src="images/bor_pic05.png" alt="">省份证
                            </li>
                            <li><img src="images/bor_pic06.png" alt="">申请资料
                            </li>
                            <li><img src="images/bor_pic07.png" alt="">其他
                            </li>


                        </ul>
                    </div>
                    <!-- end l -->
                    <div class="bor_det_oner fl">
                        <form method="post" action="/borrow_add">
                        {{ csrf_field() }}
                            <!-- <fieldset> -->
                                <div>
                                    <label>申请人</label>
                                    <input type="" name="bor_name" class="cbor_name">
                                    <font class="cerrorMsg1" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*借款金额</label>
                                    <input type="" class="bor_inputbg01 cbor_money" name="bor_money">
                                    <font class="cerrorMsg2" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*借款期限</label>
                                    <input type="" class="bor_inputbg02 cbor_month" name="bor_month">
                                    <font class="cerrorMsg3" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*还款金额</label>
                                    <font class="cbor_qian" color="green" name="bor_qian" size="3px"></font>
                                    <input type="hidden" name="bor_huan" class="cbor_huan">
                                </div>
                                   <div class="mt15">
                                    <label>*身份证号</label>
                                    <input id="cid_card" name="cid_card" type="text" maxlength="18" onkeyup="value=value.replace(/^[a-zA-Z]+\D*|^\d{0,16}[a-zA-Z]+|[^0-9Xx]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" />
                                    <font class="cerrorMsg4" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*手机号码</label>
                                    <input type=""  name="tel" class="ctel">
                                    <font class="cerrorMsg5" color="red"></font>
                                </div>
                                <div class="mt15 guarmethod clearfix">
                                    <label class="guarmethod_l fl">*担保方式</label>
                                    <div class="fl">
                                        <span>汽车数量</span>
                                        <input type="hidden" name="bor_type" value="车">

                                        <input type="text" class=" input2 cgoods_num" name="goods_num" onkeyup="this.value=this.value.replace(/[^\d]/g,'') "  maxlength="6">>
                                    <font class="cerrorMsg6" color="red"></font><br><br>
                                        <span>总价值</span>
                                        <input type="text" class="bor_inputbg04 input2 cmoney" name="money">
                                    <font class="cerrorMsg7" color="red"></font><br>
                                    </div>

                                </div>
                                <div class="mt15">
                                    <label>*借款用途</label>
                                     <input type="" name="text" class="ctext">
                                    <font class="cerrorMsg8" color="red"></font>
                                </div>
                                <div class="mt15">
                                    <label>*借款描述</label>
                                    <textarea name="bor_text" class="cbor_text"></textarea>
                                    <font class="cerrorMsg9" color="red"></font>

                                </div>
                                <div class="mt15">
                                    <label>*借款情况</label>
                                    <input type="radio" class="input3 ccase" name="case" value="普通借款">
                                    普通借款
                                    <input type="radio" class="input3 ccase" name="case" value="紧急借款"> 
                                    紧急借款
                                </div>
                                <div class="mt15" >
                                    <label>*验证码</label>
                                    <input type="text" class="yanzheng ctext" >

                                </div>
                                <div class="mt30">
                                    <label></label>
                                    <!-- <a href="" class="bor_btn">提交材料</a> -->
                                      <!-- <a href="#" class="btn btn-default btn-lg">白色</a>//白色
                                    <a href="#" class="btn btn-primary btn-lg">深蓝</a>//深蓝 -->
                                    <!-- <a href="/borrow/add" class="bor_btn btn-success" style="margin-left:40px;">提交材料</a> --> <!-- 绿色 -->
                                    <!-- <a href="#" class="btn btn-info btn-lg">淡蓝</a>//淡蓝 -->
                                    <input type="submit" value="提交" class="csubmit">
                                </div>
                            <!-- </fieldset> -->
                        </form>
                    </div>
                </div>
                </div>
                <!-- end  -->
               
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">

        $(function(){
            //房屋
 //flag1=flag2=flag3=flag4=flag5=flag6=flag7=flag8=flag9=false;
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
                $('.errorMsg3').text('借率为5%').attr(color='green');
                var bor_qian=bor_money*10000+bor_money*10000*0.05*bor_month;
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





      //汽车
        //账号验证
        $('.ctel').blur(function(){
            var ctel=$('.ctel').val();
            if(ctel==""){
                $('.cerrorMsg5').text('账号不能为空！');
                flab = false;
                return;
            //长度验证
            }else if(ctel.length!=11){
                $('.cerrorMsg5').text('注册账号为手机号码！');
                flab = false;
                return;
            }else{
                $('.cerrorMsg5').empty();
                flab=true;
            }
        });
        //申请人验证
        $('.cbor_name').blur(function(){
            var cname=$('.cbor_name').val();
            if(cname==""){
                $('.cerrorMsg1').text('昵称不能为空！');
                flab= false;
                return;
            }else{
                $('.cerrorMsg1').empty(); 
                flab=true;
            }
        });
         //借款验证
        $('.cbor_money').blur(function(){
            var cbor_money=$('.cbor_money').val();
            if(cbor_money==""){
                $('.cerrorMsg2').text('借款不能为空！');
                flab= false;
                return;
            }else{
                $('.cerrorMsg2').empty(); 
                flab=true;
            }
        });
         //期限验证
            $('.cbor_month').blur(function(){
             var cbor_money=$('.cbor_money').val();//借的钱
               var cbor_month=$('.cbor_month').val();
            if(cbor_month==""){
                $('.cerrorMsg3').text('期限不能为空！');
                flab= false;
                return;
            }else if(cbor_money!=""){
                $('.cerrorMsg3').attr('color')
                $('.cerrorMsg3').text('借率为5%').attr(color='green');
                var cbor_qian=cbor_money*10000+cbor_money*10000*0.05*cbor_month;
                //alert(bor_qian);
                $('.cbor_qian').text(cbor_qian);
                $('.cbor_huan').val(cbor_qian);
                 flab=true;
            }else{
                $('.cerrorMsg3').empty(); 
                flab=true;
            }
        });

         //身份证验证
        $('.cid_card').blur(function(){
                var cid_card=$('.cid_card').val();
            if(cid_card==""){
                $('.cerrorMsg4').text('身份证不能为空！');
                flab= false;
                return;
            }else{
                $('.cerrorMsg4').empty(); 
                flab=true;
            }
        });
         //房屋或车辆验证
        $('.cgoods_num').blur(function(){
             var cgoods_num=$('.cgoods_num').val();
            if(cgoods_num==""){
                $('.cerrorMsg6').text('数量不能为空！');
                flab= false;
                return;
            }else{
                $('.cerrorMsg6').empty(); 
                flab=true;
            }
        });
         //总价值验证
        $('.cmoney').blur(function(){
           var cmoney=$('.cmoney').val();
            if(cmoney==""){
                $('.cerrorMsg7').text('价值不能为空！');
                flab= false;
                return;
            }else{
                $('.cerrorMsg7').empty(); 
                flab=true;
            }
        });
         //用途验证
        $('.ctext').blur(function(){
            var ctext=$('.ctext').val();
            if(ctext==""){
                $('.cerrorMsg8').text('用途不能为空！');
                flab= false;
                return;
            }else{
                $('.cerrorMsg8').empty(); 
                flab=true;
            }
        });
         //描述验证
        $('.cbor_text').blur(function(){
            var cbor_text=$('.cbor_text').val();
            if(cbor_text==""){
                $('.cerrorMsg9').text('描述不能为空！');
                flab= false;
                return;
            }else{
                $('.cerrorMsg9').empty(); 
                flab=true;
            }
        });



        //房屋
           //提交表单
        $('.submit').click(function(){
                    alert(flag)
   
                if(flag){
                      return true;
                }else{
                    alert('注册失败!');
                      return false;
                }
            
        });


                //车辆
           //提交表单
        $('.csubmit').click(function(){
                if(flab){
                      return true;
                }else{
                    alert('注册失败!');
                      return false;
                }
          
        });
     
    });
</script>
@endsection