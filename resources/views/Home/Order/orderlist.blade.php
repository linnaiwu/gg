@extends("home.me.public")
@section('me')
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
  <div class="m_content">
      <div class="m_left"> 
            <div class="left_m">
              <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                  <li><a href="/orderlist" class="now">我的订单</a></li>
                    <li><a href="/address">收货地址</a></li>
                    
                </ul>
            </div>
            <div class="left_m">
              <div class="left_m_t t_bg2">会员中心</div>
                <ul>
                  <li><a href="/meuser">用户信息</a></li>
                   
                </ul>
            </div>
            <div class="left_m">
              <div class="left_m_t t_bg3">账户中心</div>
                <ul>
                  <li><a href="/safe">账户安全</a></li>
                
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
                @if($v->os==0)
                <a href="/pays">{{$status[$v->os]}}</a>
                @elseif($v->os==1)
                {{$status[$v->os]}}
                @elseif($v->os==2)
                <a href="/zt/{{$v->sid}}">{{$status[$v->os]}}</a>
                @elseif($v->os==3)
                {{$status[$v->os]}}
                @elseif($v->os==4)
                <p>{{$status[$v->os]}}<p>
                @elseif($v->os==5)
                <p>{{$status[$v->os]}}<p>
                @endif
                </td>
                <td>
                  <p>查看物流<p>
                  @if($v->os==0)
                  <a href="/ddxh/{{$v->sid}}">取消订单</a>
                  @endif
                  @if($v->os==3)
                  <a href="/zt/{{$v->sid}}">申请退款</a>
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
     @if(session('success'))
  <script>alert("{{session('success')}}")</script>
 @endif
 @if(session('error'))
 <script>alert("{{session('error')}}")</script>
 @endif
    <script>

    </script>
@endsection
