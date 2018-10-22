@extends("Home.HomePublic.public")
@section("title","确认订单付款列表")

@section("home")
<div class="i_bg">  
    <div class="content mar_20">
      <img src="/static/homes/images/img3.jpg" />        
    </div>
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
      
        <!--Begin 银行卡支付 Begin -->
      <div class="warning">         
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td style="font-size:18px;">
                  感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">{{$order->oid}}</font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                  您选定的配送方式为: <font color="#ff4e00">申通快递</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">支付宝</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">{{$order->total}}</font>
                </td>
              </tr>
              <tr>
                <td style="padding:20px 0 30px 0; font-family:'宋体';">
                  收货人 信息：全称 {{$address->name}}；地址 {{$address->address}} 。 <br />
                   
                </td>
              </tr>
              <tr>
                <td>
                  <a href="#">首页</a> &nbsp; &nbsp; <a href="#">用户中心</a>
                </td>
              </tr>
            </table>          
        </div>
        <!--Begin 银行卡支付 Begin -->
        
        <!--Begin 支付宝支付 Begin -->
      <div class="warning">         
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td style="font-size:18px;">
                  感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">{{$order->oid}}</font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                  您选定的配送方式为: <font color="#ff4e00">申通快递</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">支付宝</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">￥{{$order->total}}</font>
                </td>
              </tr>
              <tr>
                <td style="padding:20px 0 30px 0; font-family:'宋体';">
                  支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br />
                    支付宝收款接口：在线即可开通，零预付，免年费，单笔阶梯费率，无流量限制。<br />
                    <a href="#" style="color:#ff4e00;">立即在线申请</a>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="btn_u" style="margin:0 auto; padding:0 20px; width:120px;"><a href="/pays/{{$order->id}}">立即使用支付宝支付</a></div>
                  <a href="/home">首页</a> &nbsp; &nbsp; <a href="#">用户中心</a>
                </td>
              </tr>
            </table>          
        </div>
@endsection
