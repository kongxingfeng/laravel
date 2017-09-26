
@extends("layout.main")
@section("content")
    @include('layout.nav')
    <!-- end  -->
    <div class="invest_con_wper">
        <div class="invest_con px1000">
            <!-- end block -->
            <div class="product_list mt20">
                <!-- end one -->
                <div class="prolist_one prolist_one_bl01 mt20">
                    <h2 class="prolist_one_tit"><span>产品</span>{{$one->g_name}}
                    </h2>
                    <ul class="prolist_one_ul clearfix">
                        <li>
                            每月利息：<strong><input type="hidden" id="inter" value="{{$one->inter/100}}">{{$one->inter}}</strong><br>
                            描述：{{$one->note}}
                        </li>
                        <li>
                            期限：<i>{{$one->month}}</i>个月<br>
                            最少投资：{{$one->min_money}}<i>元</i>
                        </li>
                    </ul>

                    <ul class="prolist_one_ul clearfix">
                        <form action="/invest/invest" method="post" onsubmit="return check_submit()">
                            {{ csrf_field() }}
                            <li>
                                投资金额&nbsp;&nbsp;&nbsp;<input type="text" id="money" name="money" placeholder="最少投资{{$one->min_money}}元" onblur="_money()"><i>元</i>
                            </li>
                            <li>
                                <input type="hidden" name="end_time" value="{{$one->month}}">
                                <span style="margin-left: 30px" id="inter_money"></span>
                            </li>
                            <li>
                                <input type="hidden" name="id" value="{{$one->id}}">
                                <button type="submit" id="sub" onclick="sub()" >
                                    <span>确认支付</span>
                                </button>
                                {{--<input type="submit" id="sub" onclick="sub()" value="确认支付">--}}
                            </li>
                            <li class="prolist_btn">
                            </li>
                        </form>
                    </ul>
                </div>

                <!-- end one -->
            </div>
        </div>
    </div>
    <!-- footer start -->
@endsection
<style>
    button {
        font-family: 'Hind Guntur', sans-serif;
        font-size: 15px;
        color: #fff;
        letter-spacing: 0.025em;

        background: #379aff;
        padding: 11px 0 11px;
        cursor: pointer;
        border: 0;
        border-radius: 2px;
        min-width: 80px;
        overflow: hidden;

        position: absolute;
    }

    button span {
        display: block;
        position: relative;
        z-index: 10;
    }

    button:after,
    button:before {
        padding: 18px 0 11px;
        content: '';
        position: absolute;
        top: 0;
        left: calc(-100% - 30px);
        height: calc(100% - 29px);
        width: calc(100% + 20px);
        color: #fff;
        border-radius: 2px;
        -webkit-transform: skew(-25deg);
        transform: skew(-25deg);
    }

    button:after {
        background: #fff;
        -webkit-transition: left 0.8s cubic-bezier(0.86, 0, 0.07, 1) 0.2s;
        transition: left 0.8s cubic-bezier(0.86, 0, 0.07, 1) 0.2s;
        z-index: 0;
        opacity: 0.8;
    }

    button:before {
        background: #13c276;
        z-index: 5;
        -webkit-transition: left 1s cubic-bezier(0.86, 0, 0.07, 1);
        transition: left 1s cubic-bezier(0.86, 0, 0.07, 1);
    }

    button:hover:after {
        left: calc(0% - 10px);
        -webkit-transition: left 0.8s cubic-bezier(0.86, 0, 0.07, 1);
        transition: left 0.8s cubic-bezier(0.86, 0, 0.07, 1);
    }

    button:hover:before {
        left: calc(0% - 10px);
        -webkit-transition: left 1s cubic-bezier(0.86, 0, 0.07, 1);
        transition: left 1s cubic-bezier(0.86, 0, 0.07, 1);
    }
</style>
<script>
    function _money(){
        var _value = document.getElementById('money').value;
        var inter = document.getElementById('inter').value;
        var min_money = +{{$one->min_money}};
        if (_value=='' || _value<min_money) {
            document.getElementById('inter').innerHTML='0';
            document.getElementById('sub').disabled=true;
        } else {
            var new_value = Number(_value*inter).toFixed(2);
            var ne = Number(_value)+new_value*{{$one->month}};

            document.getElementById('inter_money').innerHTML ='每月收益<font color="red">'+new_value+'<font><i>元</i>  <font color="">本金+总收益:'+ne+'元<font><input type="hidden" name="interest" value="'+ new_value +'"><input type="hidden" name="total_money" id="total_money" value="'+ne+'">';
            document.getElementById('sub').disabled=false;
        }
    }
</script>

