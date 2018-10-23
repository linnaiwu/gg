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
                  <li><a href="/orderlist" class="now">我的订单</a></li>
                    <li><a href="Member_Address.html">收货地址</a></li>
                    
                </ul>
            </div>
            <div class="left_m">
              <div class="left_m_t t_bg2">会员中心</div>
                <ul>
                  <li><a href="/meuser">用户信息</a></li>
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
            
        </div>
    <div class="m_right">
            <p></p>
            <div class="mem_tit">我的订单</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="15%" colspan="2">下单时间</td>
                <td width="8%">总金额</td>
                <td width="5%">姓名</td>
                <td width="15%">电话</td>
                <td width="15%">收货人地址</td>
                <td width="10%">订单状态</td>
                <td width="15%">操作</td>
              </tr>
              @foreach($data as $v)
              <tr>
                <td colspan="2" align="left">订单号: <font color="#ff4e00">{{$v->oid}}</font></td>
                <td colspan="2" align="left">{{$v->addtime}}</td>
                <td>{{$v->total}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->address}}</td>
                <td>
                @if($v->status==0)
                <a href="/pays">{{$status[$v->status]}}</a>
                @elseif($v->status==1)
                {{$status[$v->status]}}
                @elseif($v->status==2)
                <a href="/zt/{{$v->sid}}">{{$status[$v->status]}}</a>
                @elseif($v->status==3)
                {{$status[$v->status]}}
                @endif
                </td>
                <td>
                  <p>查看物流<p>
                  @if($v->status==0)
                  <a href="/ddxh/{{$v->sid}}">取消订单</a>
                  @endif
                </td>
              </tr>
              @foreach($v->dev as $vv)
              <tr>
                <td>商品名:</td>         
                <td>{{$vv->name}}</td>     
                <td colspan="4"><img src="{{$vv->pic}}" width="200" height="200"></td>
                <td>价格:{{$vv->price}}</td>
                <td>数量:x{{$vv->num}}</td>
                <td align="left" colspan="2">产地:{{$vv->producer}}</td>
              </tr>
              @endforeach
              @endforeach
            </table>        
        </div>
    </div>
    <script>

    </script>
@endsection
