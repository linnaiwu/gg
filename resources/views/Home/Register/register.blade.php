<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/static/homes/css/style.css" />
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
    
    
<title>注册</title>
</head>
<body>  
<!--Begin Header Begin-->

  <center>

         @if(session('zhuc'))
            <h2 style="color:#5CB85C"> {{session('zhuc')}}</h2>
        @endif 
  </center>
<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="/"><img src="/static/homes/images/logo.png" /></a></div>
    </div>
	<div class="regist">
    	<div class="log_img"><img src="/static/homes/images/l_img.png" width="611" height="425" /></div>
		<div class="reg_c">
        	<form action="/register" method="post">
          {{csrf_field()}}
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">

              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">注册</span>
                    <span class="fr">已有商城账号，<a href="/homelogin" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>

              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td style="color:red">
             @if (count($errors)>0)
                 @foreach ($errors->get('username') as $error)
                  {{ $error }}
                 @endforeach
              @endif
                <input type="text" name="username" value="{{old('username')}}" class="l_user" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td style="color:red">
             @if (count($errors)>0)
                 @foreach ($errors->get('password') as $error)
                  {{ $error }}
                 @endforeach
              @endif
                <input type="password" name="password" value="" class="l_pwd" /></td>
              </tr>
              <tr height="50">

                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td style="color:red">
             @if (count($errors)>0)
                 @foreach ($errors->get('repassword') as $error)
                  {{ $error }}
                 @endforeach
              @endif
                <input type="password" name="repassword" value="" class="l_pwd" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机号 &nbsp;</td>
                <td style="color:red">
             @if (count($errors)>0)
                 @foreach ($errors->get('phone') as $error)
                  {{ $error }}
                 @endforeach
              @endif
                <input type="text" name="phone" value="{{old('phone')}}" class="l_email" /></td>
              </tr>              
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱 &nbsp;</td>
                <td style="color:red">
             @if (count($errors)>0)
                 @foreach ($errors->get('email') as $error)
                  {{ $error }}
                 @endforeach
              @endif
                <input type="text" name="email" value="{{old('email')}}" class="l_email" /></td>
              </tr>
              <tr height="50">
              <td align="right"> <font color="#ff4e00">*</font></td>
                <td>
                    <img src="/code" onclick="this.src=this.src+'?a=1'">
                </td>
              </tr>
            <tr height="50">
              <td align="right"><font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
          <td style="color:red">
         @if(session('yanz'))
             {{session('yanz')}}
        @endif 
                    <input type="text" name="vcode" value="" class="l_ipt" />

                </td>
              </tr>
              <tr>

              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<label class="r_rad"><input type="checkbox" id="aaa" onclick="inp()"/></label><label class="r_txt">我已阅读并接受《用户协议》</label>
                    </span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="submit" id="zzz" value="立即注册" class="log_btn"  onclick="test()"/ /></td>
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
// //找对象
//     //1. 获取button 对象
//      var  btn = document.getElementById('zzz');
//      var  input = document.getElementById('input');
//          btn.style.background="#8297FD";
//           btn.disabled = true;
//   function test(){
//     if(input.checked==true){
//        btn.disabled = false;
//        input.checked==false;
//       btn.style.background="#F9530A";
//       }else{
//        btn.style.background="#8297FD";
//        btn.disabled = true;
//       alert('请勾选->我已阅读并接受《用户协议》');
//     };
// };


     var aaa = document.getElementById('aaa');
     var zzz = document.getElementById('zzz');
     function test(){
      if(aaa.checked==true){
          zzz.disabled=false;

      }else{
      zzz.disabled=true;
    alert("请勾选->我已阅读并接受《用户协议》");

      }
     }
  function inp(){
    if(aaa.checked==true){
      zzz.disabled = false;
       aaa.checked==false;
      }else{
      zzz.disabled = true;
      alert('请勾选->我已阅读并接受《用户协议》');
    };
};

</script>
</html>




