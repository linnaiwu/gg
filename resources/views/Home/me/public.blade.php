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
    <script type="text/javascript" src="/static/homes/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/homes/js/menu.js"></script>    
            
  <script type="text/javascript" src="/static/homes/js/lrscroll_1.js"></script>   
     
    
  <script type="text/javascript" src="/static/homes/js/n_nav.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/static/homes/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/static/homes/css/MagicZoom.css" />
    <script type="text/javascript" src="/static/homes/js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="/static/homes/js/num.js">
      var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="/static/homes/js/p_tab.js"></script>
    
    <script type="text/javascript" src="/static/homes/js/shade.js"></script>
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
  <title>个人中心</title> 
 </head> 
 <body> 
  <!--Begin Header Begin--> 
  <div class="soubg"> 
   <div class="sou"> 
    <!--Begin 所在收货地区 Begin--> 
    <a href="/">首页</a>
    <!--End 所在收货地区 End--> 
    <span class="fr"> <span class="fl">
    @if(empty(session('homename')))你好,请<a href="/homelogin">登录</a>&nbsp; <a href="/register/create" style="color:#ff4e00;">免费注册</a>
    @else
    <span class="fr"> <span class="fl">你好,<a href="" style="color:gold;font-size:15px;">{{session('homename')}}</a>&nbsp;<a href="/pull">退出&nbsp;</a><a href="/meuser">个人中心</a>
    @endif
    &nbsp;|&nbsp;<a href="/orderlist">我的订单</a>&nbsp;</span> 
     <span class="fl">|&nbsp;关注我们：</span> <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span> <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/static/homes/images/s_tel.png" align="absmiddle" /></a></span> </span> 
   </div> 
  </div> 
 

  <!--End Header End--> 
  <!--Begin Menu Begin-->

  
<!--End Header End--> 

    <!--Begin 用户中心 Begin -->

@section('me') 

@show

	<!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/homes/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/homes/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/homes/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/homes/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
    	<dl>                                                                                            
        	<dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
        	<a href="#" class="b_sh1">新浪微博</a>            
        	<a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/static/homes/images/er.gif" width="118" height="118" /></div>
            <img src="/static/homes/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/static/homes/images/b_1.gif" width="98" height="33" /><img src="/static/homes/images/b_2.gif" width="98" height="33" /><img src="/static/homes/images/b_3.gif" width="98" height="33" /><img src="/static/homes/images/b_4.gif" width="98" height="33" /><img src="/static/homes/images/b_5.gif" width="98" height="33" /><img src="/static/homes/images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
