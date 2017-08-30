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
      <th width="250">操作</th>
    </tr>
  @foreach($data as $dat)
		<tr>
      <td>{{$dat->id}}</td>   
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
      <td>
      <div class="button-group"> 
       <a class="button border-blue" data-id="{{$dat->status}}" href="javascript:void(0)" id="status"><span>
       	@if($dat->status==0)
   		未审核
   		@else
   		已审核
       	@endif
       </span></a>
      </div>
      </td>
    </tr> 
  @endforeach
  
  </table>
</div>

<script>
	$(document).on('click','#status',function(){
		var type=$("#status").data('id');
		$.ajax({
		   type: "GET",
		   url: "/adminborrowad",
		   data: {type:type},
		   success: function(msg){
		     alert(msg);
		   }
		});
	});
	
</script>

</body></html>
@endsection