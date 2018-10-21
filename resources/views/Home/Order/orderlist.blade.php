@extends("Home.HomePublic.public")
@section("title","订单列表")

@section("home")
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
  <div class="m_content">
      <div class="m_left">
          <div class="left_n">管理中心</div>
            <div class="left_m">
              <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                  <li><a href="Member_Order.html" class="now">我的订单</a></li>
                    <li><a href="Member_Address.html">收货地址</a></li>
                    <li><a href="#">缺货登记</a></li>
                    <li><a href="#">跟踪订单</a></li>
                </ul>
            </div>
            <div class="left_m">
              <div class="left_m_t t_bg2">会员中心</div>
                <ul>
                  <li><a href="Member_User.html">用户信息</a></li>
                    <li><a href="Member_Collect.html">我的收藏</a></li>
                    <li><a href="Member_Msg.html">我的留言</a></li>
                    <li><a href="Member_Links.html">推广链接</a></li>
                    <li><a href="#">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
              <div class="left_m_t t_bg3">账户中心</div>
                <ul>
                  <li><a href="Member_Safe.html">账户安全</a></li>
                    <li><a href="Member_Packet.html">我的红包</a></li>
                    <li><a href="Member_Money.html">资金管理</a></li>
                </ul>
            </div>
            <div class="left_m">
              <div class="left_m_t t_bg4">分销中心</div>
                <ul>
                  <li><a href="Member_Member.html">我的会员</a></li>
                    <li><a href="Member_Results.html">我的业绩</a></li>
                    <li><a href="Member_Commission.html">我的佣金</a></li>
                    <li><a href="Member_Cash.html">申请提现</a></li>
                </ul>
            </div>
        </div>
    <div class="m_right">
            <p></p>
            <div class="mem_tit">我的订单</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="10%">订单号</td>
                <td width="10%">下单时间</td>
                <td width="10%">商品名</td>
                <td width="5%">总金额</td>
                <td width="5%">姓名</td>
                 <td width="15%">电话</td>
                <td width="15%">收货人地址</td>
                <td width="5%">订单状态</td>
                <td width="15%">操作</td>
              </tr>
              @foreach($row as $v)
              <tr>
                <td><font color="#ff4e00">{{$v->oid}}</font></td>
                <td>{{$v->addtime}}</td>
              
                <td></td>
           
                <td>{{$v->total}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->address}}</td>
                <td>{{$v->status}}</td>
                <td>取消订单</td>

              </tr>
             @endforeach
            </table>        
        </div>
    </div>
@endsection