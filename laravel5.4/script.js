function hoverFace(obj){
  
  //头像
  var face=document.querySelector(obj.face);

  //内容
  var exit=document.querySelector(obj.exit);

  //退出按钮
  var btn=document.querySelector(obj.btn);
   
   var flgn=true;
  //点击头像
  face.onclick=function(){
     if(flgn){
      exit.style.display="block";
        flgn=false;
     }
     else{
      exit.style.display="none";
        flgn=true;
     }
  }


  //划过头像高亮显示
  face.onmouseenter=function(){
     this.style.background="#eee";
  }
  face.onmouseleave=function(){
    this.style.background="none";
  }


   //遮罩盒子
  var box=document.querySelector(obj.box);

  //点击安全退出按钮
  btn.onclick=function(){
    dialog(box,exit,flgn)
    
  }

  btn1.onclick=function(){
    alert(1)
  }
  
 
}

function dialog(box,exit){
   
   box.style.height=document.body.scrollHeight +"px";
   box.style.display="block";
  
   //点击确定按钮
   btn1.onclick=function(){
     box.style.display="none";
    

   }

   //点击取消按钮
   btn2.onclick=function(){
     box.style.display="none";
     exit.style.display="none";
   }
     
}