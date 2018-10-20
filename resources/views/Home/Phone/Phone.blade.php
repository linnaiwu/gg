<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.aaa{
font-size:20px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link type="text/css" rel="stylesheet" href="/static/homes/css/style.css" />
  <link type="text/css" rel="stylesheet" href="/static/homes/css/bootstrap.min.css" />
    <!--[if IE 6]>
    <script src="/static/homes/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/static/homes/js/jquery-1.11.1.min_044d0927.js"></script>
  <script type="text/javascript" src="/static/homes/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/static/homes/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/homes/js/menu.js"></script>    
        
  <script type="text/javascript" src="/static/homes/js/select.js"></script>
    
  <script type="text/javascript" src="/static/homes/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/static/homes/js/iban.js"></script>
    <script type="text/javascript" src="/static/homes/js/fban.js"></script>
    <script type="text/javascript" src="/static/homes/js/f_ban.js"></script>
    <script type="text/javascript" src="/static/homes/js/mban.js"></script>
    <script type="text/javascript" src="/static/homes/js/bban.js"></script>
    <script type="text/javascript" src="/static/homes/js/hban.js"></script>
    <script type="text/javascript" src="/static/homes/js/tban.js"></script>
    
  <script type="text/javascript" src="/static/homes/js/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
  <div class="sou">
  <center>
        @if(session('pp'))
         <h2 style="color:#5CB85C">{{session('pp')}}</h2>
         @endif
  </center>
        <span class="fr">
            <span class="fl"><a href="/home">首页</span>
        </span>
    </div>
</div>

<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">
    <div class="top">
        <div class="logo"><a href="Index.html"><img src="/static/homes/images/logo.png" /></a></div>
    </div>
  <div class="regist">
      <div class="log_img"><img src="/static/homes/images/l_img.png" width="611" height="425" /></div>
    <div class="reg_c">
          <form action="/dodophone" method="post" id="ff">
          {{csrf_field()}}
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">

                <td width="95">&nbsp;</td>
                <td>
                  <span class="fl" style="font-size:20px;">请输入号码</span>
                    <span class="fr">已有商城账号，<a href="/homelogin" style="color:#ff4e00;">我要登录</a></span><br/><div></div><br/><span id="mm" style=""></span>
                </td>
              </tr>

              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机号 &nbsp;</td>
                <td style="color:red" > @if(session('yanz')) {{session('yan')}} @endif<p id="www"></p>

                <input type="text" name="phone" value="{{old('phone')}}" class="l_user" />
                 </td>
              </tr>
              <tr height="50">
              <td align="right"><font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
          <td style="color:red">
           <input type="text" name="code" value="" class="l_ipt" />
           <a href="javascript:void(0)" class="btn btn-success" id="ss1">点击发送</a>
           </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td style="color:red">
              @if (count($errors)>0)
                 @foreach ($errors->get('password') as $error)
                    <p>{{ $error }}</p>
                 @endforeach
              @endif
  
               <input type="password" name="password" value="" class="l_pwd" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td style="color:red">
                  @if (count($errors)>0)
                 @foreach ($errors->get('repassword') as $error)
                    <p>{{ $error }}</p>
                 @endforeach
              @endif
                <input type="password" name="repassword" value="" class="l_pwd" /></td>
              </tr>
                </tr>
             <tr height="60">
                <td>&nbsp;</td>
                <td><input type="submit"  value="重置密码" class="log_btn"/></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/static/homes/images/b_1.gif" width="98" height="33" /><img src="/static/homes/images/b_2.gif" width="98" height="33" /><img src="/static/homes/images/b_3.gif" width="98" height="33" /><img src="/static/homes/images/b_4.gif" width="98" height="33" /><img src="/static/homes/images/b_5.gif" width="98" height="33" /><img src="/static/homes/images/b_6.gif" width="98" height="33" />
    </div>      
</div>
<!--End Footer End -->    

</body>
<script>
$("#ss1").click(function(){
    // alert("--");
 phone=$("input[name='phone']").val();
 // alert(phone);
 $.get('./dophone',{phone:phone},function(data){
   // alert(data);
   if(data==1){
    $('#www').html('发送成功');
   }else{
    $('#www').html('不存在此手机号');
   }

 },'json');
});

//找对象
    //1. 获取button 对象
    var  btn = document.getElementById('ss1');
//改属性
  //2给button对象绑定点击事件
    btn.onclick=function(){
      //alert('我是绑定的点击事件');
      //3.倒计时
      num =60;
      timmer = setInterval(function(){
        num--;
        //button文本发生变化
        btn.innerHTML = '重新发送('+num+')';
        //a标签点击效果被禁用
        $("#ss1").css("pointer-events","none");
        console.log(num);
        if(num<=0){
          //清除定时器
          clearInterval(timmer);

          $("#ss1").css("pointer-events","auto");
          btn.innerHTML ='重新发送';
        }

      },800);
    }
</script>

</html>




