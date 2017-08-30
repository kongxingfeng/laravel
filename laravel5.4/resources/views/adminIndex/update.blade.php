@extends("adminlayout.adminmian")

@section("content")


<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/adminupda_do"> 

     <input type="hidden" name="_token" value="{{csrf_token()}}">
     <input type="hidden" name="id" value="<?php echo $list->id;?>">
     
      <div class="form-group">
        <div class="label">
          <label>产品名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $list->g_name;?>" name="g_name" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>最小金额：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="min_money" class="input tips" style="width:25%; float:left;"  value="<?php echo $list->min_money;?>"  data-toggle="hover" data-place="right" data-image="" />
        </div>
      </div>
      
      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>产品方式：</label>
          </div>
          <div class="field">
            <select name="status" class="input w50">
              <option value="">请选择分类</option>
              <option value="0">投资</option>
              <option value="1">出借</option>
            </select>
            <div class="tips"></div>
          </div>
        </div>
        <div class="form-group">
        <div class="label">
          <label>期限：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="month" class="input tips" style="width:25%; float:left;"  value="<?php echo $list->month;?>"  data-toggle="hover" data-place="right" data-image="" />
        </div>
      </div>  
      </if>
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="note" value="<?php echo $list->note;?>" style=" height:90px;"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>利息：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="inter" class="input tips" style="width:25%; float:left;"  value="<?php echo $list->inter;?>"  data-toggle="hover" data-place="right" data-image="" />
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>收益：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="earnings" value="<?php echo $list->earnings;?>" />
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
        <input type="submit" class="button bg-main icon-check-square-o" value="提交">
        
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>
@endsection