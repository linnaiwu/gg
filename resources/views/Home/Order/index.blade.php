@extends("Home.HomePublic.public")
@section("title","确认订单列表")

@section("home")

<div class="i_bg">  
    <div class="content mar_20">
        <img src="/static/homes/images/img2.jpg" />        
    </div>
  <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
        <div class="two_bg">
            <div class="two_t">
                <span class="fr"><a href="/Cart">修改</a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
              </tr>
              @foreach($data as $v)
              <tr>
                <td>
                    <div class="c_s_img"><img src="{{$v['pic']}}" width="73" height="73" /></div>
                   {{$v['name']}}
                </td>
                <td align="center">{{$v['num']}}</td>
                <td align="center" style="color:#ff4e00;">{{$v['price']}}</td>
          
              </tr>
             @endforeach
                <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                    商品总价：{{$total}}   
                </td>
              </tr>

            </table>
            
            <div class="two_t">
                <span class="fr"><a href="/address">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="p_td" width="160">收货人姓名</td>
                <td width="395" id="skk">{{$addr['name']}}</td>
              </tr>
              <tr>
                <td class="p_td">收货地址</td>
                <td>{{$addr['address']}}</td>
              </tr>
              <tr>
                <td class="p_td">电话</td>
                <td>{{$addr['phone']}}</td>
              </tr>
            </table>
            <table border="0" style="width:1100px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="70">
                <td align="right">
                    <b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">{{$total}}</span></b>
                </td>
              </tr>
              <tr height="70">
                <form action="/orders" method="post">
                <input type="hidden" name="aid" value="{{$addr['id']}}">
                <input type="hidden" name="total" value="{{$total}}">
                {{csrf_field()}}
                <td align="right"><input type="submit" value="" style="background:url(/static/homes/images/btn_sure.gif) no-repeat center; width:150px;height:45px;"></td>
                </form>
              </tr>
            </table>
@endsection
