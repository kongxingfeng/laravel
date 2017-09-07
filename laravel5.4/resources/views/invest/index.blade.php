@extends("layout.main")
@section("content")
    @include('layout.nav')
    <!-- end  -->
    <div class="invest_con_wper">
        <div class="invest_con px1000">
            <div class="product_choose">
                <h2 class="product_tit clearfix">
                    <em class="proall fl">全部理财产品</em>
                    <div class="clearfix fl">

                        <span class="product_curspan"><img src="images/invest_pic01.png"></span>
                        {{--<span class="product_curspan"><img src="images/invest_pic01.png"> 项目列表</span>--}}
                        <span><img src="images/invest_pic02.png"> 项目列表</span>
                        {{--<span><img src="images/invest_pic03.png"> 债权转让</span>--}}
                    </div>

                </h2>
            </div>
            <!-- end block -->
            <h3 class="sort_tit mt30">
                <form method="POST" action="/invest/select">
                    {{ csrf_field() }}
                    <span>理财期限<img src="images/invest_jiantou.png"></span>
                    <select name="life">
                        <option value="1-4">1-4个月</option>
                        <option value="5-8">5-8个月</option>
                        <option value="9-12">9-12个月</option>
                    </select>
                    <span>理财收益<img src="images/invest_jiantou.png"></span>
                    <select name="earnings">
                        @foreach($earnings as $var)
                            <option value="{{$var->id}}">{{$var->name}}</option>
                        @endforeach
                    </select>
                    <!-- <span><input type="submit" value="搜索" style="margin-left: 300px;"></span> -->
                </form>
            </h3>
            <div class="product_list mt20">
                @foreach($gain as $var)
                    <div class="prolist_one prolist_one_bl01 mt20">
                        <h2 class="prolist_one_tit"><span>产品</span>{{$var->g_name}}
                        </h2>
                        <ul class="prolist_one_ul clearfix">
                            <li>
                                每月利息：<strong>{{$var->inter}}</strong><br>
                                描述：{{$var->note}}
                            </li>
                            <li>
                                期限：<i>{{$var->month}}</i>个月<br>
                                最少投资：{{$var->min_money}}<i>元</i>
                            </li>
                            <li class="prolist_btn">
                                <a href="/add?id={{$var->id}}" class="pro_btn" id="invest">立即投资</a>
                            </li>
                        </ul>
                    </div>
                @endforeach
                <p class="pagelink">
                    <a href="" class="pglink_cura">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                    <a href="">下一页</a>
                </p>
                <!-- pagelink end -->
            </div>
        </div>
    </div>
    <!-- footer start -->
@endsection
<script src="jquery-1.7.2.min.js"></script>

