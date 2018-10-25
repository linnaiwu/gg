@extends("home.me.public")
@section('me')

	<div class="m_content">
   		<div class="m_left">
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="/orderlist">我的订单</a></li>
                    <li><a href="/address">收货地址</a></li>
                   
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg2">会员中心</div>
                <ul>
                	<li><a href="/meuser" class="now">用户信息</a></li>
                    <li><a href="#">我的收藏</a></li>
                    <li><a href="#">我的留言</a></li>
                    <li><a href="#">推广链接</a></li>
                    <li><a href="#">我的评论</a></li>
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
        	<div class="m_des">
            	<table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
  <div class="face">
        <p><img class="normalFace" src="/static/homes/images/user.jpg"></p><hr/>

  </div>
                  </tr>
                </table>	
            </div>
          <div class="mem_t">账号信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="40%">用户ID：<span style="color:#555555;">{{$data->id}}</span></td>    
                 <td width="40%">用户名：<span style="color:#555555;">{{$data->username}}</span></td>

              </tr>
              <tr>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">{{$data->phone}}</span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">{{$data->email}}</span></td>
              </tr>

            </table>



    </div>
    </div>

 @endsection

