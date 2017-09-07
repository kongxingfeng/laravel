@extends("layout.main")

@section("content")
@include('layout.nav')
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
                     
                     @if(\Auth::check())
                     <p><span>注册账户：</span><a href="#">{{$name}}</a></p>
                     <p><span>您的邮箱：</span><a href="#">{{$email}}</a></p>
                     <p><span>您的手机号：</span><a href="#">{{$tel}}</a></p>
                     <p><span>注册时间：</span><a href="#">{{$created_at}}</a></p>
                     @else
                     <p><span>注册账户：</span><a href="#">{{base64_decode($name)}}</a></p>
                     @endif
                    <hr>
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
                         <p><span>您的认证照片：</span>
                          @if($img=='') <a href="/ss" class='inpro_cura'>上传头像</a>
                          @else  <img src="{{$img}}" style='width: 50px;height: 50px'>
                          @endif
                        
                         </p>
                        <p>
                         <span>您的当前身份是：</span>
                         <a href="#">{{$rank}}</a>
                        </p>
                        <p>
                           <span>账户余额：</span> 
                           {{$money}} 
                           <a href="#">充值</a>
                           <a href="#">提现</a>
                        </p>
                    </div>

                </div>
                <!--  -->
                <div class="product_list" style="display:none;">
                <div class="invest_prochoose">
            @if(!empty($invest->toArray()))
                <table border="">
                    <th>编号</th>
                    <th>投资项目</th>
                    <th>投资金额</th>
                    <th>投资时间</th>
                    <th>利息</th>
                    <th>投资期限</th>
                    <th>到期收益</th>
                    <th>状态</th>
                    @foreach($invest as $v)
                    <tr>
                    <td>{{$v->id}}</td>
                    <td>
                        @foreach($gain as $val)
                        @if($v->in_id == $val->id)
                        {{$val->g_name}}
                        @endif
                        @endforeach
                    </td>
                    <td>{{$v->money}}</td>
                    <td>{{$v->start_time}}</td>
                    <td>{{$v->interest}}</td>
                    <td>{{$v->long}}个月</td>
                    <td>{{$v->total_money}}</td>
                    <td>进行中</td>
                    @endforeach
                    </tr>
                </table>
                     @else 暂无操作
                     @endif
                </div>
                </div>
                <!--  -->
                <div class="product_list" style="display:none;">
                   <div class="invest_prochoose">
                     @if(!empty($borrow->toArray()))
                <table border="">
                    <th>编号</th>
                    <th>借款金额</th>
                    <th>借款期限</th>
                    <th>到期还款金额</th>
                    <th>下款时间</th>
                    <th>抵押物</th>
                    <th>数量</th>
                    <th>审核状态</th>
                    @foreach($borrow  as $v)
                    <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->bor_money}}万元</td>
                    <td>{{$v->bor_month}}个月</td>
                    <td>{{$v->bor_qian}}元</td>
                    <td>
                     @if($v->status==1)
                        {{$v->bor_time}}
                        @else 
                        正在审核
                        @endif
                    </td>
                    <td>{{$v->bor_type}}</td>
                    <td>{{$v->goods_num}}</td>
                    <td> 
                        @if($v->status==1)
                        已审核
                        @else 
                        审核中
                        @endif
                    </td>
                   
                    @endforeach
                    </tr>
                </table>
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