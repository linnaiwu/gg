@extends("Home.HomePublic.public")
@section("title","个人中心")

@section("home")

  <div class="i_bg bg_color"> 
   <!--Begin 用户中心 Begin --> 
   <div class="m_content"> 
    <div class="m_left"> 
     <div class="left_n">
      管理中心
     </div> 
     <div class="left_m"> 
      <div class="left_m_t t_bg1">
       订单中心
      </div> 
      <ul> 
       <li><a href="#">我的订单</a></li> 
       <li><a href="/core" class="now">收货地址</a></li> 
       <li><a href="#">缺货登记</a></li> 
       <li><a href="#">跟踪订单</a></li> 
      </ul> 
     </div> 
     <div class="left_m"> 
      <div class="left_m_t t_bg2">
       会员中心
      </div> 
      <ul> 
       <li><a href="E#">用户信息</a></li> 
       <li><a href="#">我的收藏</a></li> 
       <li><a href="#">我的留言</a></li> 
       <li><a href="#">推广链接</a></li> 
       <li><a href="#">我的评论</a></li> 
      </ul> 
     </div> 
     <div class="left_m"> 
      <div class="left_m_t t_bg3">
       账户中心
      </div> 
      <ul> 
       <li><a href="#">账户安全</a></li> 
       <li><a href="#">我的红包</a></li> 
       <li><a href="#">资金管理</a></li> 
      </ul> 
     </div> 
     <div class="left_m"> 
      <div class="left_m_t t_bg4">
       分销中心
      </div> 
      <ul> 
       <li><a href="#">我的会员</a></li> 
       <li><a href="#">我的业绩</a></li> 
       <li><a href="#">我的佣金</a></li> 
       <li><a href="#">申请提现</a></li> 
      </ul> 
     </div> 
    </div> 
    <div class="m_right"> 
     <p></p> 
   @yield("zz")

   </div> 
   <!--End 用户中心 End--> 


@endsection
