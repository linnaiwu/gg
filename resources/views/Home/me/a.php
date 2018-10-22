	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="Member_Order.html">我的订单</a></li>
                    <li><a href="Member_Address.html" class="now">收货地址</a></li>
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
            <div class="mem_tit">收货地址</div>
			<div class="address">
            	<div class="a_close"><a href="#"><img src="/static/homes/images/a_close.png" /></a></div>
            	<table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
          <tr> 
              <td>编号</td>
              <td>名字</td>
              <td>电话</td>
              <td>收货地址</td>
               <td>操作</td>
          </tr>
          @foreach($data as $val)
          <tr><td class="aid">{{ $val->id }}</td>
              <td>{{$val->name}}</td>
              <td>{{$val->phone}}</td>
              <td>{{$val->address}}</td>
              <td><button class="btn btn-warning dele" >删除</button>
        @if($val->status==1)
              <button class="btn btn-info status stu">设为默认</button>
        @else
              <button class="btn btn-success status stu1">默认地址</button>
        @endif
            
            </td>
          </tr>
          @endforeach
                </table>
            </div>

            <div class="mem_tit">
            	<a href="#"><img src="/static/homes/images/add_ad.gif" /></a>
            </div><p style="color:red"> @if(session('en')) {{session('en')}} @endif</p>
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
              
                <td width="135" align="right">配送地区</td>
                <td colspan="3" style="font-family:'宋体';">
       <form action="/address" method="post" >
        {{csrf_field()}}
            <select id="sid">
              <option value="" class="ss">--请选择--</option> 
              <input type="hidden" name="city">
            </select>
                </td>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';"><input type="text" name="name" value="" class="add_ipt" />（必填）</td>

              </tr>
              <tr>
                <td align="right">附加地址</td>
                <td style="font-family:'宋体';"><input type="text" name="addr" value="" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">手机</td>
                <td style="font-family:'宋体';"><input type="text" id="ph" name="phone" value="" class="add_ipt" /><span id="zheng"> (必填) </span></td>
              </tr>
           <tr>
                <td aling="right">
                 <button type="submit" class="btn btn-success">确认添加</button>
                 </td>
            </tr>
            </table>
          </form>
            
        </div>
    </div>