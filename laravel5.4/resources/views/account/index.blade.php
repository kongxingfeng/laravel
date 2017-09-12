@extends("layout.main")

@section("content")
@include('layout.nav')

<style>
     .img{

        float: left;

        }
    .names{
        float: left;
    }
    .names p{
        line-height: 20px;
    }
    .name-meg{
        width:245px;
        height:142px;
        padding-top:44px;
        background: #fff;
        float: left;
        margin-left:30px;
    }
    .mes{
        width:680px;
        height:142px;
        margin-left:220px;

    }
    .name-btn{
        width:135px;
        height:142px;
        float:left;
        box-sizing:border-box;
        text-align: center;
        line-height: 142px;
        padding-left:30px;
        border-left:1px solid #eee;
    }
    .name-btn button{
        width:100px;
        height:45px;
        background: orange;
        border: none;
        border-radius: 8px;
        color:#fff;
        font-size:16px;
        cursor: pointer;
    }
    .left{
        width:300px;
        height:150px;
        clear: both;
        display: inline-block;
        float: left;
    }
    .right{
        width:590px;
        height:150px;
        display: inline-block;
        background: yellow;
        border:1px solid #ccc;
        border-radius: 8px;
    }

    .menu{
        width:900px;
        height:60px;
        background:#eee;
        display:flex;
    }
    .menu li{
      flex:1;
      text-align: center;
      line-height: 60px;
      border-bottom:2px solid #f9f9f9;
    }
    .active{
        background: #f6d860;
    }
</style>
<!-- end  -->
<div class="invest_con_wper">
    <div class="invest_con px1000">
        <div class="product_choose">
            <h2 class="product_tit clearfix">
                <em class="proall fl">我的信息列表：</em>
                <div class="clearfix fl">
                    <span class="product_curspan"><img src="images/invest_pic01.png"> 我的账户</span>
                    <span><img src="images/invest_pic02.png"> 我的投资</span>
                    <span><img src="images/invest_pic03.png"> 我的借款</span>
                </div>

            </h2>
           
            <div class="product_box">
               <div class="product_list">
                    <div class="invest_prochoose">
                    <div class="img">
                        <img src="images/1228.png" width="200px;" width="200px;" alt="">
                    </div>

                <div class="mes">
                    <div class="names">
                     
                         @if(\Auth::check())
                         <p><span>注册账户：</span><a href="#">{{$name}}</a></p>
                         <p><span>您的邮箱：</span><a href="#">{{$email}}</a></p>
                         <p><span>您的手机号：</span><a href="#">{{$tel}}</a></p>
                         <p><span>注册时间：</span><a href="#">{{$created_at}}</a></p>
                         @else
                         <p><span>注册账户：</span><a href="#">{{base64_decode($name)}}</a></p>
                         @endif
                    </div>
                    <div class="name-meg">
                        <p><span>您的积分为：</span></p>
                         <p>
                            <span>账户余额：</span> 
                            {{$money}} 元
                         </p>
                         <p>
                            <a href="#">充值</a>
                            <a href="#">提现</a>
                         </p>
                    </div>
                    <div class="name-btn">
                           <button class="qian">签到</button>
                    </div> 
                </div>

                <div class="left">
                        <p><span>您的真实姓名：</span>
                       @if($username=='0') <a href="/ss" class='inpro_cura'>请先认证</a>
                       @else {{$username}}
                       @endif
                       </p>
                        <p><span>您的身份证号：</span>
                       @if($idcard=='0') <a href="/ss" class='inpro_cura'>请先认证</a>
                       @else {{$idcard}}
                       @endif
                        </p>
                         <p><span>您的头像：</span>
                          @if($img=='') <a href="/ss" class='inpro_cura'>上传头像</a>
                          @else  <img src="{{$img}}" style='width: 50px;height: 50px'>
                          @endif
                        
                         </p>
                        <p>
                         <span>您的当前身份是：</span>
                         <a href="#">{{$rank}}</a>
                        </p>
                </div>
                        <div class="right">
                                 <img src="images/1228.png" width="590px;" height="150px;" alt="">
                        </div>
                        
                    </div>

                </div>
                <!--  -->
                <div class="product_list" style="display:none;">
                <div class="invest_prochoose">
                <ul class="menu">
                    <li class="active">编号</li>
                    <li>投资项目</li>
                    <li class="active">投资金额</li>
                    <li>投资时间</li>
                    <li class="active">利息</li>
                    <li>投资期限</li>
                    <li class="active">到期收益</li>
                    <li>状态</li>
                </ul> 
                @if(!empty($invest->toArray())) 
                  @foreach($invest as $v)
                  <ul class="menu">
                    <li class="active">{{$v->id}}</li>
                    <li>@foreach($gain as $val)
                        @if($v->in_id == $val->id)
                        {{$val->g_name}}
                        @endif
                        @endforeach</li>
                    <li class="active">{{$v->money}}</li>
                    <li>{{$v->start_time}}</li>
                    <li class="active">{{$v->interest}}</li>
                    <li>{{$v->long}}个月</li>
                    <li class="active">{{$v->total_money}}</li>
                    <li>进行中</li>
                    </ul>
                  @endforeach
                
                @else 暂无操作
                @endif
                               </div>
               </div>
                <div class="product_list" style="display:none;">
                  <div class="invest_prochoose">
                  <ul class="menu">
                    <li class="active">编号</li>
                    <li>借款金额</li>
                    <li class="active">借款期限</li>
                    <li>到期还款金额</li>
                    <li class="active">下款时间</li>
                    <li>抵押物</li>
                    <li class="active">数量</li>
                    <li>审核状态</li>
                </ul>
                @if(!empty($borrow->toArray()))
                @foreach($borrow as $v)
                <ul class="menu">
                    <li class="active">{{$v->id}}</li>
                    <li>{{$v->bor_money}}万元</li>
                    <li class="active">{{$v->bor_month}}个月</li>
                    <li>{{$v->bor_qian}}元</li>
                    <li class="active">
                        @if($v->status==1)
                        {{$v->bor_time}}
                        @else 
                        正在审核
                        @endif
                    </li>
                    <li>{{$v->bor_type}}</li>
                    <li class="active">{{$v->goods_num}}</li>
                    <li>
                        @if($v->status==1)
                        已审核
                        @else 
                        审核中
                        @endif
                    </li>
                </ul>
                @endforeach
                @else 暂无操作
                @endif
                </div>
                </div>
                <!--  -->

            </div>
        </div> 
        </div>
    </div>
</div>
@endsection