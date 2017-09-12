@extends("layout.main")

@section("content")
    @include('layout.nav')
<!-- end  -->

<div class="zscf_banner_wper">
    <div class="zscf_banner px1000">
        <div class="zscf_box">
            <p>累计成交：<strong>12亿2332万元</strong></p>
            <p>运营时间：<strong>123天</strong></p>
            <p><strong>24</strong>小时成功转让率<strong>12.12%</strong></p>
            @if (\Auth::check() || session('qid')!='')
                     <p><strong>加入熊猫</strong></p>
                     <p><strong>开启您的财富自由之路</strong></p>
                     <p><strong>铸就辉煌人生!</strong></p>
            @else
                 <a href="/login" class="btn btn1">立即登录</a><br>
                 <a href="/register" class="btn btn2">立即注册</a>
            @endif
          

        </div>
    </div>
</div>
<!-- end banner -->
<div class="zscf_con_wper pb30">
    <div class="zscf_con px1000">
        <div class="zscf_block1 mt30 ">
            <h2 class="zscf_block1_tit clearfix"><span class="fl"><strong>发标预告</strong>换卡后放假啊客户看 将黑金卡号看见啊后防盗卡…… </span><a href="" class="fr">查看更多>></a></h2>
            <div class="clearfix clear">
                <ul class="zscf_block1_text clearfix fl">
                    <li>
                        <span class="block1_libg01">已加入中兴财富</span>
                        <br>
                        <em><strong>123123</strong>人</em>
                    </li>
                    <li>
                        <span class="block1_libg02">已加入中兴财富</span>
                        <br>
                        <em><strong>123123</strong>人</em>
                    </li>
                    <li>
                        <span class="block1_libg03">已加入中兴财富</span>
                        <br>
                        <em><strong>123123</strong>人</em>
                    </li>
                </ul>
                <!-- end l -->
                <div class="block1_r fl">
                    <h2 class="block1_r_tit clearfix"><span>网站公告</span><a href="#">+</a></h2>
                    <ul>
                        <li><span>关于新手体验</span><em>06-19</em></li>
                        <li><span>关于新手体验</span><em>06-19</em></li>
                        <li><span>关于新手体验</span><em>06-19</em></li>
                        <li><span>关于新手体验</span><em>06-19</em></li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- end block1 -->
        @foreach($data as $val)
            <div class="zscf_block2 mt30 clearfix ">

                <div class="zscf_block2_l fl">
                    @foreach($val as $v)
                        <div class="block2_biao clearfix">
                            <div class="clearfix">
                                <span class="fl">{{$v->g_name}}</span>
                                <div class="block2_biao_r fr">
                                    <div class="tjxm_jindu ">

                                        <div class="press_eiper fl">
                                            <div class="press">

                                            </div>
                                        </div>
                                        <span class="fl">{{$v->inter}}</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="clearfix clear block2_biao_ul">
                                <li>起投资金：<em>{{$v->min_money}}</em></li>
                                <li><img src="images/bao.png" alt="">年华收益：<strong>{{$v->inter}}</strong>
                                </li>
                                <li>
                                    产品期限：<span>{{$v->month}}天</span>
                                </li>
                                <li>
                                    <a href="/add?id={{$v->id}}" class="invest_btn">立即投资</a>
                                </li>
                            </ul>
                        </div>

                    @endforeach
                </div>

                <!-- end left -->
                <div class="zscf_block2_r fl">
                    <div class="block2_r_video">
                        <!-- <img src="images/video.png" alt=""> -->
                        <embed src="" type="" width="250px;" height="180px;">
                    </div>
                    <div class="block2_r_tip">{{$val[0]->cate}}.{{$val[0]->cate_note}}</div>
                </div>
                <!-- end right -->
            </div>
            @endforeach
        <!--  end block2 -->
        <div class="zscf_block3 mt30 ">
            <h2 class="block3_tit clearfix"><span class="block3_curspan">项目列表</span><em><img src="images/shu.png" alt=""></em><span>债权转让</span><a href="">更多></a></h2>
            <div class="block3_pro_box clear">
                <div class="block3_prolist">

                    <div class="block3_proone clearfix clear">
                        <span class="fl proone_left"><img src="images/xin.png" alt=""></span>
                        <!--  -->
                        <div class="fl proone_center">
                            <div class="clearfix">
                                <span class="fl proone_center_span1">测试标【2132312】</span>
                                <div class="block2_biao_r fr">
                                    <div class="tjxm_jindu ">

                                        <div class="press_wper fl">
                                            <div class="press">

                                            </div>
                                        </div>
                                        <span class="fl">11%</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="clearfix proone_center_ul clear pt10">
                                <li>预计年华收益:<span>12.5%</span></li>
                                <li>投资期限:<span>24个月</span></li>
                                <li>借款金额：<span>123122132元</span></li>
                            </ul>
                        </div>
                        <!--  -->
                        <a href="" class="block3_btn fl">立即投资</a>
                    </div>
                    <!--listone  -->
                    <div class="block3_proone clearfix clear">
                        <span class="fl proone_left"><img src="images/xin.png" alt=""></span>
                        <!--  -->
                        <div class="fl proone_center">
                            <div class="clearfix">
                                <span class="fl proone_center_span1">测试标【2132312】</span>
                                <div class="block2_biao_r fr">
                                    <div class="tjxm_jindu ">

                                        <div class="press_wper fl">
                                            <div class="press">

                                            </div>
                                        </div>
                                        <span class="fl">11%</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="clearfix proone_center_ul clear pt10">
                                <li>预计年华收益:<span>12.5%</span></li>
                                <li>投资期限:<span>24个月</span></li>
                                <li>借款金额：<span>123122132元</span></li>
                            </ul>
                        </div>
                        <!--  -->
                        <a href="" class="block3_btn fl">立即投资</a>
                    </div>
                    <!--listone  -->
                    <div class="block3_proone clearfix clear">
                        <span class="fl proone_left"><img src="images/xin.png" alt=""></span>
                        <!--  -->
                        <div class="fl proone_center">
                            <div class="clearfix">
                                <span class="fl proone_center_span1">测试标【2132312】</span>
                                <div class="block2_biao_r fr">
                                    <div class="tjxm_jindu ">

                                        <div class="press_wper fl">
                                            <div class="press">

                                            </div>
                                        </div>
                                        <span class="fl">11%</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="clearfix proone_center_ul clear pt10">
                                <li>预计年华收益:<span>12.5%</span></li>
                                <li>投资期限:<span>24个月</span></li>
                                <li>借款金额：<span>123122132元</span></li>
                            </ul>
                        </div>
                        <!--  -->
                        <a href="" class="block3_btn fl">立即投资</a>
                    </div>
                    <!--listone  -->
                    <div class="block3_proone clearfix clear">
                        <span class="fl proone_left"><img src="images/xin.png" alt=""></span>
                        <!--  -->
                        <div class="fl proone_center">
                            <div class="clearfix">
                                <span class="fl proone_center_span1">测试标【2132312】</span>
                                <div class="block2_biao_r fr">
                                    <div class="tjxm_jindu ">

                                        <div class="press_wper fl">
                                            <div class="press">

                                            </div>
                                        </div>
                                        <span class="fl">11%</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="clearfix proone_center_ul clear pt10">
                                <li>预计年华收益:<span>12.5%</span></li>
                                <li>投资期限:<span>24个月</span></li>
                                <li>借款金额：<span>123122132元</span></li>
                            </ul>
                        </div>
                        <!--  -->
                        <a href="" class="block3_btn fl">立即投资</a>
                    </div>
                    <!--listone  -->
                    <div class="block3_proone clearfix clear">
                        <span class="fl proone_left"><img src="images/xin.png" alt=""></span>
                        <!--  -->
                        <div class="fl proone_center">
                            <div class="clearfix">
                                <span class="fl proone_center_span1">测试标【2132312】</span>
                                <div class="block2_biao_r fr">
                                    <div class="tjxm_jindu ">

                                        <div class="press_wper fl">
                                            <div class="press">

                                            </div>
                                        </div>
                                        <span class="fl">11%</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="clearfix proone_center_ul clear pt10">
                                <li>预计年华收益:<span>12.5%</span></li>
                                <li>投资期限:<span>24个月</span></li>
                                <li>借款金额：<span>123122132元</span></li>
                            </ul>
                        </div>
                        <!--  -->
                        <a href="" class="block3_btn fl">立即投资</a>
                    </div>
                    <!--listone  -->
                </div>
                <!-- end 项目列表 -->
                <div class="block3_prolist" style="display:none;">
                    2
                </div>
            </div>
        </div>
        <!-- end block3 -->
        <div class="zscf_block4 mt30">
            <img src="images/block4_adver.png">
        </div>
        <!-- end block4 -->
        <div class="zscf_block5 mt30 clearfix">
            <div class="zscf_block5_l fl mr20">
                <h2 class="block3_tit clearfix block5_l_tit"><span class="block3_curspan news_span">行业动态</span><em><img src="images/shu.png" alt=""></em><span class="news_span">媒体报道</span><a href="">更多></a></h2>
                <div class="block5_box">

                    <ul class="news_ul">
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                    </ul>
                    <ul class="news_ul" style="display:none;">
                        <li><a href="">6月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                        <li><a href="">5月组团推荐排行榜</a></li>
                    </ul>
                </div>
            </div>
            <div class="zscf_block5_r fl">
                <h2 class="block5_r_tit clearfix"><span class="fl ">投资排行榜</span><em class="fr block5_r_tit_em"><a href="javascript:;" class="brt_acur">月排行</a><a href="javascript:;">周排行</a><a href="javascript:;">总排行</a></em></h2>
                <div class="rank_box">
                    <div class="rank_list">
                        <ul class="rank_list_ul">
                            <li>
                                <em class="rank_bg01">1</em>
                                <a href="">llsdfasd</a>
                                <span>￥132423</span>
                                <span>99</span>
                                <span>1233%</span>
                            </li>
                            <li>
                                <em class="rank_bg02">1</em>
                                <a href="">llsdfasd</a>
                                <span>￥132423</span>
                                <span>99</span>
                                <span>1233%</span>
                            </li>
                            <li>
                                <em class="rank_bg03">1</em>
                                <a href="">llsdfasd</a>
                                <span>￥132423</span>
                                <span>99</span>
                                <span>1233%</span>
                            </li>

                            <li>
                                <em class="rank_bg04">1</em>
                                <a href="">llsdfasd</a>
                                <span>￥132423</span>
                                <span>99</span>
                                <span>1233%</span>
                            </li>

                            <li>
                                <em class="rank_bg04">1</em>
                                <a href="">llsdfasd</a>
                                <span>￥132423</span>
                                <span>99</span>
                                <span>1233%</span>
                            </li>


                        </ul>
                    </div>
                    <!-- end -->
                    <div class="rank_list" style="display:none;">
                        2
                    </div>
                    <!-- end -->
                    <div class="rank_list" style="display:none;">
                        3
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
        <!-- end block5 -->
        <div class="zscf_partner mt30">
            <h2 class="block3_tit clearfix "><span class="block3_curspan">合作伙伴</span></h2>
            <div class="partner_con">
                <div id="demo">
                    <div id="indemo">
                        <div id="demo1">
                            <a href="#"><img src="images/ifri01.png" border="0" /></a>
                            <a href="#"><img src="images/ifri01.png" border="0" /></a>
                            <a href="#"><img src="images/ifri01.png" border="0" /></a>
                            <a href="#"><img src="images/ifri01.png" border="0" /></a>
                            <a href="#"><img src="images/ifri01.png" border="0" /></a>
                            <a href="#"><img src="images/ifri01.png" border="0" /></a>
                        </div>
                        <div id="demo2"></div>
                    </div>
                </div>
                <script>
                    <!--
                    var speed=10;
                    var tab=document.getElementById("demo");
                    var tab1=document.getElementById("demo1");
                    var tab2=document.getElementById("demo2");
                    tab2.innerHTML=tab1.innerHTML;
                    function Marquee(){
                        if(tab2.offsetWidth-tab.scrollLeft<=0)
                            tab.scrollLeft-=tab1.offsetWidth
                        else{
                            tab.scrollLeft++;
                        }
                    }
                    var MyMar=setInterval(Marquee,speed);
                    tab.onmouseover=function() {clearInterval(MyMar)};
                    tab.onmouseout=function()  {MyMar=setInterval(Marquee,speed)};
                    -->
                </script>

            </div>
        </div>
    </div>
</div>
@endsection
<!-- footer start -->
