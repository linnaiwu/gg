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
  <title>前台首页</title> 
 </head> 
 <body> 
  <!--Begin Header Begin--> 
  <div class="soubg"> 
   <div class="sou"> 
    <!--Begin 所在收货地区 Begin--> 
   
      
    <!--End 所在收货地区 End--> 
    <span class="fr"> <span class="fl">
    @if(empty(session('homename')))你好,请<a href="/homelogin">登录</a>&nbsp; <a href="/register/create" style="color:#ff4e00;">免费注册</a>
    @else
    <span class="fr"> <span class="fl">你好,<a href="/homelogin" style="color:gold;font-size:15px;">{{session('homename')}}</a>&nbsp;<a href="/pull">退出&nbsp;</a><a href="/meuser">个人中心</a>
    &nbsp;|&nbsp;<a href="/orderlist">我的订单</a>
    @endif
    &nbsp;&nbsp;关注我们：</span> <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span> <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/static/homes/images/s_tel.png" align="absmiddle" /></a></span> </span> 
   </div> 
  </div> 
  <div class="top"> 
   <div class="logo">
    <a href="/"><img src="/static/homes/images/logo.png" /></a>
   </div> 
   <div class="search"> 
    <form action="/shop" method="get" id="for"> 
     <input type="text" name="name" value="" id="text" class="s_ipt" /> 
     <input type="submit" value="搜索" class="s_btn" /> 
    </form> 
    <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span> 
   </div> 
   <div class="i_car"> 
    <div class="car_t">
   
      <a href="/Cart">  查看购物车</a>
     </div> 
     <!--End 购物车已登录 End--> 
    </div> 
   </div> 
  </div> 
  <!--End Header End--> 
   <!--Begin Menu Begin--> 
  <div class="menu_bg"> 
   <div class="menu"> 
    <!--Begin 商品分类详情 Begin--> 
    <div class="nav"> 
     <div class="nav_t">
      全部商品分类
     </div> 
     <div class="leftNav"> 
      <ul> 
      @foreach($cate as $row)
       <li> 
        <div class="fj"> 
         <span class="n_img"><span></span><img src="/static/homes/images/nav1.png" /></span> 
         <span class="fl">{{$row->name}}</span> 
        </div> 
        @if(count($row->dev))
        <ul class="zj"> 
         <div class="zj_l"> 
          @foreach($row->dev as $ss)
          <div class="zj_l_c"> 
           <h2 ><a href="/shop/{{$ss->id}}">{{$ss->name}}</a></h2>
            @foreach($ss->dev as $aaa)
             <a href="#">{{$aaa->name}}</a>|
            @endforeach
          </div>
          @endforeach
         </div> 
        </ul> 
        @endif
       </li> 
       @endforeach
      </ul> 
     </div> 
    </div> 
    <!--End 商品分类详情 End--> 
  <!--   <ul class="menu_r"> 
    @foreach($cate as $row)
     <li><a href="/shop">{{$row->name}}</a></li> 
    @endforeach
    </ul>  -->
   
   </div> 
  </div> 
  <div class="i_bg bg_color"> 
   <div class="i_ban_bg"> 
    <!--Begin Banner Begin--> 
    <div class="banner"> 
     <div class="top_slide_wrap"> 
      <ul class="slide_box bxslider"> 
      @foreach($data as $v)
       <li><img src="{{$v->pic}}" width="740" height="401" /></li> 
       @endforeach
      </ul>      <div class="op_btns clearfix"> 
       <a href="#" class="op_btn op_prev"><span></span></a> 
       <a href="#" class="op_btn op_next"><span></span></a> 
      </div> 
     </div> 
    </div> 
    <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script> 
    <!--End Banner End--> 
    <div class="inews"> 
     <div class="news_t"> 
      <span class="fr"><a href="#">更多 &gt;</a></span>公告 
     </div> 
     <ul> 
     @foreach($gg as $r)
      <li><span>[公告]</span><a href="/gonggao/{{$r->id}}">{{$r->title}}</a></li> 
     @endforeach
     </ul> 
    
    </div> 
   </div> 
   <!--Begin 热门商品 Begin--> 

   <div class="content mar_20"> 
    <img src="/static/homes/images/mban_1.jpg" width="1200" height="110" /> 
   </div> 
   <!--Begin 进口 生鲜 Begin--> 
   <div class="i_t mar_10"> 
    <span class="floor_num">1F</span> 
   @foreach($cate as $row)
    <span class="fl"><b>·</b>&nbsp;{{$row->name}}&nbsp;</span> 
    @foreach($row->dev as $rr)
    <span class="i_mores fr ll" ><a href="/shop/{{$rr->id}}">{{$rr->name}}</a>&nbsp; &nbsp;</span> 
    @endforeach
   @endforeach
   </div> 
   <!-- 左边图 -->
   <div class="content"> 
    <div class="fresh_left"> 
     <div class="fre_ban"> 
      <div id="imgPlay1"> 
       <ul class="imgs" id="actor1"> 
        <li><a href="#"><img src="/static/homes/images/fre_r.jpg" width="211" height="286" /></a></li> 
       
       </ul> 
       <div class="prevf">
        上一张
       </div> 
       <div class="nextf">
        下一张
       </div> 
      </div> 
     </div> 
     <div > 

     </div> 
    </div> 
    <div class="fresh_mid"> 
     <ul> 
     @foreach($goods as $rr)
      <li> 
       <div class="name">
        <a href="#"></a>
       </div> 
       <div class="img">
        <a href="/details/{{$rr->id}}"><img src="{{$rr->pic}}" width="185" height="155" /></a>
       </div> 
       <div class="price"> 
       <font class="fl">{{$rr->name}}</font>
        <font>￥<span>{{$rr->price}}<span></font> &nbsp; 
       </div> 
       </li> 
       @endforeach
     </ul> 
    </div> 
    <!-- 右边图 -->
    <div class="fresh_right"> 
     <ul> 
      <li><a href="#"><img src="/static/homes/images/fre_b1.jpg" width="260" height="220" /></a></li> 
     </ul> 
    </div> 
   </div> 
   <!--End 进口 生鲜 End--> 
 
   <!--Begin Footer Begin --> 
   <div class="b_btm_bg b_btm_c"> 
    <div class="b_btm"> 
     <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0"> 
      <tbody>
       <tr> 
        <td width="72"><img src="/static/homes/images/b1.png" width="62" height="62" /></td> 
        <td><h2>正品保障</h2>正品行货 放心购买</td> 
       </tr> 
      </tbody>
     </table> 
     <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0"> 
      <tbody>
       <tr> 
        <td width="72"><img src="/static/homes/images/b2.png" width="62" height="62" /></td> 
        <td><h2>满38包邮</h2>满38包邮 免运费</td> 
       </tr> 
      </tbody>
     </table> 
     <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0"> 
      <tbody>
       <tr> 
        <td width="72"><img src="/static/homes/images/b3.png" width="62" height="62" /></td> 
        <td><h2>天天低价</h2>天天低价 畅选无忧</td> 
       </tr> 
      </tbody>
     </table> 
     <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0"> 
      <tbody>
       <tr> 
        <td width="72"><img src="/static/homes/images/b4.png" width="62" height="62" /></td> 
        <td><h2>准时送达</h2>收货时间由你做主</td> 
       </tr> 
      </tbody>
     </table> 
    </div> 
   </div> 
   <div class="b_nav"> 
    <dl> 
     <dt>
      <a href="#">新手上路</a>
     </dt> 
     <dd>
      <a href="#">售后流程</a>
     </dd> 
     <dd>
      <a href="#">购物流程</a>
     </dd> 
     <dd>
      <a href="#">订购方式</a>
     </dd> 
     <dd>
      <a href="#">隐私声明</a>
     </dd> 
     <dd>
      <a href="#">推荐分享说明</a>
     </dd> 
    </dl> 
    <dl> 
     <dt>
      <a href="#">配送与支付</a>
     </dt> 
     <dd>
      <a href="#">货到付款区域</a>
     </dd> 
     <dd>
      <a href="#">配送支付查询</a>
     </dd> 
     <dd>
      <a href="#">支付方式说明</a>
     </dd> 
    </dl> 
    <dl> 
     <dt>
      <a href="#">会员中心</a>
     </dt> 
     <dd>
      <a href="#">资金管理</a>
     </dd> 
     <dd>
      <a href="#">我的收藏</a>
     </dd> 
     <dd>
      <a href="#">我的订单</a>
     </dd> 
    </dl> 
    <dl> 
     <dt>
      <a href="#">服务保证</a>
     </dt> 
     <dd>
      <a href="#">退换货原则</a>
     </dd> 
     <dd>
      <a href="#">售后服务保证</a>
     </dd> 
     <dd>
      <a href="#">产品质量保证</a>
     </dd> 
    </dl> 
    <dl> 
     <dt>
      <a href="#">联系我们</a>
     </dt> 
     <dd>
      <a href="#">网站故障报告</a>
     </dd> 
     <dd>
      <a href="#">购物咨询</a>
     </dd> 
     <dd>
      <a href="#">投诉与建议</a>
     </dd> 
    </dl> 
    <div class="b_tel_bg"> 
     <a href="#" class="b_sh1">新浪微博</a> 
     <a href="#" class="b_sh2">腾讯微博</a> 
     <p> 服务热线：<br /> <span>400-123-4567</span> </p> 
    </div> 
    <div class="b_er"> 
     <div class="b_er_c">
      <img src="/static/homes/images/er.gif" width="118" height="118" />
     </div> 
     <img src="/static/homes/images/ss.png" /> 
    </div> 
   </div> 
   <div class="btmbg"> 
    <div class="btm">
    	<p class="mod_copyright_links" clstag="h|keycount|btm|btmnavi_null03"><a href="/link" target="_blank">友情链接</a><span class="mod_copyright_split"></span></p>
      备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com Copyright &copy; 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group 
     <br /> 
     <img src="/static/homes/images/b_1.gif" width="98" height="33" />
     <img src="/static/homes/images/b_2.gif" width="98" height="33" />
     <img src="/static/homes/images/b_3.gif" width="98" height="33" />
     <img src="/static/homes/images/b_4.gif" width="98" height="33" />
     <img src="/static/homes/images/b_5.gif" width="98" height="33" />
     <img src="/static/homes/images/b_6.gif" width="98" height="33" /> 
    </div> 
   </div> 
   <!--End Footer End --> 
    <!-- 广告 -->
  <script src="/static/guanggao/js/King_Chance_Layer.js"></script>
  <link href="/static/guanggao/css/lanrenzhijia.css" type="text/css" rel="stylesheet" />
  <!-- 代码部分begin -->
  @if(count($a))
  <div class="King_Chance_Layer">
      <div class="King_Chance_LayerCont" style="display:none;">
          <div class="King_Chance_Layer_Close">Close</div>
            
            <div class="King_Chance_Layer_Btn">
              <ul>
                @foreach($a as $v)
                  <li><a href="#">{{$v->name}}</a></li>
                  @endforeach
                </ul>
            </div>
            <div class="King_Chance_Layer_Content">
              <ul>
              @foreach($a as $v)
                  <li><a href="" target="_blank"><img src="{{$v->pic}}" /></a></li>
                  @endforeach
                </ul>
            </div>
        </div>
    </div>
<script src="/static/guanggao/js/lanrenzhijia.js"></script>
  </div>  
  
  @endif
  <!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->  

<!-- 搜索 -->
<script type="text/javascript">
$('#for').submit(function(e){
   var t=$("#text").val();
   // alert(t);
        // alert(t);
        if(t==''){
           e.preventDefault();
       }
});
</script>
 </body>

</html>
