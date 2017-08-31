@extends("adminlayout.adminmian")

@section("content")

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>

<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>     
      <th>借款人</th>  
      <th>借款金额(千元)</th> 
      <th>借款日期(月)</th>
      <th>身份证</th>
      <th>担保方式</th>
      <th>价值(元)</th>
      <th>借款用途</th>
      <th>借款描述</th>
      <th>手机号</th>
      <th>借款情况</th>
      <th>还款时间</th>
      <th width="250">操作</th>
    </tr>
  @foreach($data as $dat)
		<tr>
      <td >{{$dat->id}}</td>   
      <td>{{$dat->bor_name}}</td>
      <td>{{$dat->bor_money}}</td>
      <td>{{$dat->bor_month}}</td>
      <td>{{$dat->id_card}}</td>
      <td>{{$dat->goods_num}}</td>
      <td>{{$dat->money}}</td>
      <td>{{$dat->text}}</td>
      <td>{{$dat->bor_text}}</td>
      <td>{{$dat->tel}}</td>
      <td>{{$dat->case}}</td>
      <td><span class="endtime">{{$dat->bor_etime}}</span></td>
      <td>
      <div class="button-group"> 
       <span>
      @if($dat->status==0)
   		<a class="button border-blue" data-u="{{$dat->id}}"  data-id="{{$dat->status}}" href="javascript:void(0)" id="status">未审核</a>
   		@else
   		<a class="button border-blue" data-u="{{$dat->id}}" data-id="{{$dat->status}}" href="javascript:void(0)" id="status">已审核</a>
       	@endif
       </span>
      </div>
      </td>
    </tr> 
  @endforeach
  
  </table>
</div>

<script>
	$(document).on('click','#status',function(){
		var type=$(this).data('id');
    var id = $(this).data('u');
    var obj = $(this);
    //var id = $(".id").html();

		$.ajax({
		   type: "GET",
      url: "/admin/adminborrow",
		   data: {type:type,id:id},

		   success: function(msg){
         obj.parent().parent().parent().prev().html(msg);
          obj.html('已审核');
		   }
		});
	});
	
</script>

</body></html>
@endsection