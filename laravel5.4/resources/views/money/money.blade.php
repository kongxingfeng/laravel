
@extends("layout.main")
@section("content")
    @include('layout.nav')

    
<div class="zscf_banner_wper2">

<div class="zscf_banner px1000">
<div class="zscf_box">
 
       
            <h2 class="zscf_block1_tit clearfix">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo rand(1,9999)?>人已加入中兴财富</h2>
          
                <ul class="zscf_block1_text clearfix fl">
                    <li>
                        <span class="block1_libg02">今日成交金额</span>
                        <br>
                        <em><strong><?=$sum_money?></strong>元</em>
                    </li>
                  
                </ul>
               
     
</div>
</div>
</div>

</div><br>
<center>
<canvas id="a_canvas" width="1200" height="400">30天内每日成交额</canvas>  
</center>


@endsection

<script>   
    (function (){   
      
        window.addEventListener("load", function(){   
        var data = {{$new_sum}};
        var date = [1,1,2,3,4,5,6,7];
       
       //var xinforma = ['09-07','09-06','09-05','09-04','09-02','09-01','08-31',];  
       var xinforma = eval("{{!! $new_time !!}}");  
        
            
      
          // 获取上下文   
          var a_canvas = document.getElementById('a_canvas');   
          var context = a_canvas.getContext("2d");   
      
      
          // 绘制背景   
          var gradient = context.createLinearGradient(0,0,0,300);   
      
      
         //gradient.addColorStop(0,"#e0e0e0");   
          //gradient.addColorStop(1,"#ffffff");  
        gradient.addColorStop(0,"white");   
      
      
          context.fillStyle = gradient;   
      
          context.fillRect(0,0,a_canvas.width,a_canvas.height);   
      
          var realheight = a_canvas.height-15;   
          var realwidth = a_canvas.width-40;   
          // 描绘边框   
          var grid_cols = data.length + 1;   
          var grid_rows = 4;   
          var cell_height = realheight / grid_rows;   
          var cell_width = realwidth / grid_cols;   
          context.lineWidth = 1;   
          context.strokeStyle = "#white";   
      
          // 结束边框描绘   
          context.beginPath();   
          // 准备画横线   
          // for(var row = 1; row <= grid_rows; row++){   
          //   var y = row * cell_height;   
          //   context.moveTo(0,y);   
          //   context.lineTo(a_canvas.width, y);   
          // }   
               
            //划横线   
            context.moveTo(0,realheight);   
            context.lineTo(realwidth,realheight);   
                     
                  
            //画竖线   
          context.moveTo(0,20);   
           context.lineTo(0,realheight);   
          context.lineWidth = 1;   
          context.strokeStyle = "white";   
          context.stroke();   
                   
      
          var max_v =0;   
               
          for(var i = 0; i<data.length; i++){   
            if (data[i] > max_v) { max_v =data[i]};   
          }   
          max_vmax_v = max_v * 1.1;   
          // 将数据换算为坐标   
          var points = [];   
          for( var i=0; i < data.length; i++){   
            var v= data[i];   
            var px = cell_width *　(i +1);   
            var py = realheight - realheight*(v / max_v);   
            //alert(py);   
            points.push({"x":px,"y":py});   
          }   
      
          //绘制坐标图形   
          for(var i in points){   
            var p = points[i];   
            context.beginPath();   
            context.fillStyle="#ffc369";   
            context.fillRect(p.x,p.y,15,realheight-p.y);   
                  
            context.fill();   
          }   
          //添加文字   
          for(var i in points)   
          {  var p = points[i];   
            context.beginPath();   
            context.fillStyle="black";   
            context.fillText(data[i], p.x + 1, p.y - 15);   
             context.fillText(xinforma[i],p.x + 1,realheight+15);   
             context.fillText('天数',realwidth,realheight+10);   
             context.fillText('每日成交额（元）',0,12);   
              }   
        },false);   
      })();   
            
</script>   
