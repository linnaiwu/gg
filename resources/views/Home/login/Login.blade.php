<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.sy{
  color:#FF4E4F;
  text-decoration: underline
}
</style>
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
    
    
<title>登录</title>
</head>
<body>  

<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">

        <div class="logo"><a href="/"><img src="/static/homes/images/logo.png" /></a></div>
    </div>
	<div class="login">
   	<div class="log_img"><img src="/static/homes/images/l_img.png" width="611" height="425" /></div>
		<div class="log_c">
  <center>
      <span style="color:red;font-size:17px"> {{session('error')}}</span>
      <span style="color:#D72323;font-size:20px"> {{session('reset')}}</span>
  </center>
        	<form action="/homelogin" method="post">
          {{csrf_field()}}
            <table border="0" style="width:370px; font-size:14px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="55">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">登录</span>
                    <span class="fr">还没有商城账号，<a href="/register/create" style="color:#ff4e00;">立即注册</a></span>
                </td>
              </tr>
              <tr height="70">
                <td>用户名</td>
                <td><input type="text" name="username" value="" class="l_user" /></td>
              </tr>
              <tr height="70">
                <td>密&nbsp; &nbsp; 码</td>
                <td><input type="password" name="password" value="" class="l_pwd" /></td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">

                    <span class="fr"><a href="/forget" style="color:#ff4e00;">忘记密码?</a></span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="submit" value="登录" class="log_btn" /></td>
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


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
