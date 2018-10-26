<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:wb="http://open.weibo.com/wb">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link type="text/css" rel="stylesheet" href="/static/homes/css/style.css" /> 
  <!--[if IE 6]>
    <script src="/static/homes/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]--> 
      <script src="https://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
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
 <!--End 所在收货地区 End--> 
    <span class="fr"> <span class="fl">
    @if(empty(session('homename')))你好,请<a href="/homelogin">登录</a>&nbsp; <a href="/register/create" style="color:#ff4e00;">免费注册</a>
    @else
    <span class="fr"> <span class="fl" style="width:480px;">你好,<a href="/homelogin" style="color:gold;font-size:15px;">{{session('homename')}}</a>&nbsp;<a href="/pull">退出&nbsp;</a><a href="/meuser">个人中心</a>
    &nbsp;|&nbsp;<a href="/orderlist">我的订单</a>
    @endif
    &nbsp;&nbsp;关注我们：<a href="#" class="sh1"><wb:follow-button uid="6796261616" type="red_1" width="67" height="24" ></wb:follow-button></a></span>
    <!-- 微信开始 -->
    <div class="bdsharebuttonbox s_sh" data-tag="share_1" style="width:30px;margin-top:3px;">
      <a class="bds_weixin" data-cmd="weixin" href="#"></a>
     </div>
     <!-- /微信结束 -->
    </span>
   </div> 
  </div> 

  <!--End Header End--> 
  <!--Begin Menu Begin-->

  
<!--End Header End--> 

    <!--Begin 用户中心 Begin -->

@section('me') 

@show

	
    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
<!-- 分享模块 -->
<script>
  window._bd_share_config = {
    common : {
      bdText : '自定义分享内容', 
      bdDesc : '自定义分享摘要', 
      bdUrl : '自定义分享url地址',   
      bdPic : '自定义分享图片'
    },
    share : [{
      "bdSize" : 16
    }],
    selectShare : [{
      "bdselectMiniList" : ['weixin']
    }]
  }
  with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
<!-- 分享模块结束 -->
</html>
