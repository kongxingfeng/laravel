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
                        <span class="product_curspan"><img src="images/invest_pic01.png"> 新手体验标</span>
                        <span><img src="images/invest_pic02.png"> 项目列表</span>
                        <span><img src="images/invest_pic03.png"> 债权转让</span>
                    </div>

                </h2>
                <div class="product_box">
                    <div class="product_list">
                        <div class="invest_prochoose">
                            <p>
                                <span>项目期限：</span>
                                <a href="javascript:void(0)" class="inpro_cura limit">不限</a>
                                <a href="javascript:void(0)" class="limit" limit="0-1">小于1个月</a>
                                <a href="javascript:void(0)" class="limit" limit="2-3">2-3个月</a>
                                <a href="javascript:void(0)" class="limit" limit="4-6">4-6个月</a>
                                <a href="javascript:void(0)" class="limit" limit="7-12">7-12个月</a>
                            </p>
                            <p>
                                <span>项目收益：</span>
                                <a href="javascript:void(0)" class="inpro_cura earnings ">不限</a>
                                @foreach ($earnings as $var)
                                    <a href="javascript:void(0)" class="earnings" earnings="{{$var->id}}">{{$var->name}}</a>
                                @endforeach
                            </p>
                            {{--<p><span>项目类型：</span><a href="#" class="inpro_cura">不限</a><a href="#">信用标</a><a href="#">抵押标</a></p>--}}
                            {{--<p><span>项目状态：</span><a href="#" class="inpro_cura">不限</a><a href="#">所有借款</a><a href="#">正在招标的借款</a><a href="#">已成功借款</a><a href="#">已完成借款</a></p>--}}
                        </div>
                    </div>
                    <div class="product_list" style="display:none;">
                    </div>
                    <div class="product_list" style="display:none;">
                    </div>
                </div>
            </div>
            <h3 class="sort_tit mt30"><em>排序</em>
                <span>综合排序</span>
                <span>收益率<img src="images/invest_jiantou.png" alt=""></span>
                <span>发布时间<img src="images/invest_jiantou.png" alt=""></span>
                <span>项目期限<img src="images/invest_jiantou.png" alt=""></span>
            </h3>


            <div class="product_list mt20" id="box">
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
                <p class="pagelink" style="width: 400px">
                    <a href="javascript:void(0)" class="page" page="1">首页</a>
                    <a href="javascript:void(0)" class="page" page="{{$page-1>0?$page-1:1}}">上一页</a>
                    <a href="javascript:void(0)" class="page" page="{{$page+1<$total?$page+1:$total}}">下一页</a>
                    <a href="javascript:void(0)" class="page" page="{{$total}}">尾页</a>
                </p>
                <!-- pagelink end -->
            </div>
        </div>
    </div>
    <!-- footer start -->
@endsection
<script src="js/jq.js"></script>
<script>
    $(document).on('click','.limit',function(){
        var box = $('#box');
        var limit = $(this).attr('limit');
        var page = $('.page').attr('page');
        var earnings = '';
        $('.earnings').each(function(){
            if($(this).hasClass('inpro_cura')){
                earnings = $(this).attr('earnings');
            }
        });
        $.get('/invest',{limit:limit,page:page,limit:limit,earnings:earnings},function(msg){
            if (msg==2) {
                box.html('<h2 style="font-size: 45px;"  align="center">没有符合条件的数据</h2>');
                return false;
            } else {
                var str = '';
                for (var i in msg.gain) {
                    str += '<div class="prolist_one prolist_one_bl01 mt20">';
                    str += '<h2 class="prolist_one_tit"><span>产品</span>'+msg.gain[i]['g_name']+'</h2>';
                    str += '<ul class="prolist_one_ul clearfix">';
                    str += '<li>';
                    str += '每月利息：<strong>'+msg.gain[i]['inter']+'</strong><br>';
                    str += '描述：'+msg.gain[i]['note'];
                    str += '</li>';
                    str += '<li>期限：<i>'+msg.gain[i]['month']+'</i>个月<br>';
                    str += '最少投资：'+msg.gain[i]['min_money']+'<i>元</i></li>';
                    str += '<li class="prolist_btn">';
                    str += '<a href="/add?id='+msg.gain[i]['id']+'" class="pro_btn" id="invest">立即投资</a>';
                    str += '</li>';
                    str += '</ul>';
                    str += '</div>';
                }
                str += '<p class="pagelink" style="width: 400px">';
                str +='<a href="javascript:void(0)" class="page" page="1">首页</a>';
                str +='<a href="javascript:void(0)" class="page" page="'+msg.lastPage+'">上一页</a>';
                str +='<a href="javascript:void(0)" class="page" page="'+msg.nextPage+'">下一页</a>';;
                str +='<a href="javascript:void(0)" class="page" page="'+msg.page+'">尾页</a>';
                str += '</p>';
                box.html(str);
            }
        },'json');
    });

    //    分页
    $(document).on('click','.page',function(){
        var box = $('#box');
        var earnings = '';
        var limit = '';
        $('.limit').each(function(){
            if($(this).hasClass('inpro_cura')){
                limit = $(this).attr('limit');
            }
        });
        $('.earnings').each(function(){
            if($(this).hasClass('inpro_cura')){
                earnings = $(this).attr('earnings');
            }
        });
        var page = $(this).attr('page');
        $.get('/invest',{page:page,limit:limit,earnings:earnings},function(msg){
//        $.get('/invest',{page:page},function(msg){
            if (msg != 2) {
                var str = '';
                for (var i in msg.gain) {
                    str += '<div class="prolist_one prolist_one_bl01 mt20">';
                    str += '<h2 class="prolist_one_tit"><span>产品</span>'+msg.gain[i]['g_name']+'</h2>';
                    str += '<ul class="prolist_one_ul clearfix">';
                    str += '<li>';
                    str += '每月利息：<strong>'+msg.gain[i]['inter']+'</strong><br>';
                    str += '描述：'+msg.gain[i]['note'];
                    str += '</li>';
                    str += '<li>期限：<i>'+msg.gain[i]['month']+'</i>个月<br>';
                    str += '最少投资：'+msg.gain[i]['min_money']+'<i>元</i></li>';
                    str += '<li class="prolist_btn">';
                    str += '<a href="/add?id='+msg.gain[i]['id']+'" class="pro_btn" id="invest">立即投资</a>';
                    str += '</li>';
                    str += '</ul>';
                    str += '</div>';
                }
                str += '<p class="pagelink" style="width: 400px">';
                str +='<a href="javascript:void(0)" class="page" page="1">首页</a>';
                str +='<a href="javascript:void(0)" class="page" page="'+msg.lastPage+'">上一页</a>';
                str +='<a href="javascript:void(0)" class="page" page="'+msg.nextPage+'">下一页</a>';;
                str +='<a href="javascript:void(0)" class="page" page="'+msg.page+'">尾页</a>';
                str += '</p>';
                box.html(str);
            }
        },'json');
    });

    $(document).on('click','.earnings',function(){
        var box = $('#box');
        var earnings = $(this).attr('earnings');
        var page = $('.page').attr('page');
        var limit = '';
        $('.limit').each(function(){
            if($(this).hasClass('inpro_cura')){
                limit = $(this).attr('limit');
            }
        });
        $.get('/invest',{limit:limit,page:page,limit:limit,earnings:earnings},function(msg){
            if (msg==2) {
                box.html('<h2 style="font-size: 45px;"  align="center">没有符合条件的数据</h2>');
                return false;
            } else {
                var str = '';
                for (var i in msg.gain) {
                    str += '<div class="prolist_one prolist_one_bl01 mt20">';
                    str += '<h2 class="prolist_one_tit"><span>产品</span>'+msg.gain[i]['g_name']+'</h2>';
                    str += '<ul class="prolist_one_ul clearfix">';
                    str += '<li>';
                    str += '每月利息：<strong>'+msg.gain[i]['inter']+'</strong><br>';
                    str += '描述：'+msg.gain[i]['note'];
                    str += '</li>';
                    str += '<li>期限：<i>'+msg.gain[i]['month']+'</i>个月<br>';
                    str += '最少投资：'+msg.gain[i]['min_money']+'<i>元</i></li>';
                    str += '<li class="prolist_btn">';
                    str += '<a href="/add?id='+msg.gain[i]['id']+'" class="pro_btn" id="invest">立即投资</a>';
                    str += '</li>';
                    str += '</ul>';
                    str += '</div>';
                }
                str += '<p class="pagelink" style="width: 400px">';
                str +='<a href="javascript:void(0)" class="page" page="1">首页</a>';
                str +='<a href="javascript:void(0)" class="page" page="'+msg.lastPage+'">上一页</a>';
                str +='<a href="javascript:void(0)" class="page" page="'+msg.nextPage+'">下一页</a>';;
                str +='<a href="javascript:void(0)" class="page" page="'+msg.page+'">尾页</a>';
                str += '</p>';
                box.html(str);
            }
        },'json');
    });
</script>

