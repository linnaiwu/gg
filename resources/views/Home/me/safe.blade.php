@extends("home.me.public")
@section('title', '账户安全')
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
                	<li><a href="/meuser">用户信息</a></li>
              
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg3">账户中心</div>
                <ul>
                	<li><a href="/safe" class="now">账户安全</a></li>
                  
                </ul>
            </div>
        </div>
		<div class="m_right">
            <p></p>
            <div class="mem_tit">账户安全</div>
            <div class="m_des">
                <form action="/meuser" method="post">
                {{csrf_field()}}
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45"><span style="font-size:17px;color:#0086FF"> 
                 
                  {{session('phone')}}</span>
                    <td width="80" align="right">原手机 &nbsp; &nbsp;</td>
                    <td><input type="text" value="{{$users->phone}}" class="add_ipt" style="width:180px;"  readonly />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">新手机 &nbsp; &nbsp;</td>
                    <td><input type="text" id="ph" name="phone" value="" class="add_ipt" style="width:180px;" />&nbsp;
                     <font color="#ff4e00" id="zheng">
 						{{session('cunz')}}
 						{{session('ephone')}}
                    </font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
            <td><input type="submit" value="确认修改" class="btn_tj" onclick="on()"/></td>
                  </tr>
                </table>
                </form>
            </div>
            
            <div class="m_des">
                <form action="/meuser" method="post">
                {{csrf_field()}}
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                  <span style="font-size:17px;color:#0086FF"> 
								{{session('email')}}

							</span>
                    <td width="80" align="right">原邮箱 &nbsp; &nbsp;</td>
                    <td><input type="text" value="{{$users->email}}" class="add_ipt" style="width:180px;"  readonly />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">新邮箱 &nbsp; &nbsp;</td>
                    <td><input type="text" name="email" value="" class="add_ipt" style="width:180px;" />&nbsp; 
                    <font color="#ff4e00">
								{{session('eer')}}
								{{session('eer1')}}
                    </font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td><input type="submit" id="sbt1" value="确认修改" class="btn_tj" /></td>
                  </tr>
                </table>
                </form>
            </div>
            
            <div class="m_des">
                <form action="/mecode" method="post">
                {{csrf_field()}}
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">原密码 &nbsp; &nbsp;</td>
                    <td><input type="password" name="passworded" value="" class="add_ipt" style="width:180px;" />&nbsp; 
                    <font color="#ff4e00">
                    {{session('ecode')}}

                    </font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">新密码 &nbsp; &nbsp;</td>
                    <td><input type="password" name="password" value="" class="add_ipt" style="width:180px;" />&nbsp; 
                    <font color="#ff4e00">
                 @if (count($errors)>0)
                 @foreach ($errors->get('password') as $error)
                  {{ $error }}
                 @endforeach
            	  @endif

                    </font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">确认密码 &nbsp; &nbsp;</td>
                    <td><input type="password" name="repassword" value="" class="add_ipt" style="width:180px;" />&nbsp;
                     <font color="#ff4e00">
                @if (count($errors)>0)
                 @foreach ($errors->get('repassword') as $error)
                  {{ $error }}
                 @endforeach
              	@endif
                     </font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td><input type="submit" id="sbt2" value="确认修改" class="btn_tj" /></td>
                  </tr>
                </table>
                </form>
            </div>            
        </div>
    </div>
@endsection
<script>
// alert("1");
//手机号正则
var inp = document.getElementById('ph');
var  myfont = document.getElementById('zheng');
inp.onfocus=function(){
	alert("1");
  console.log('获取焦点');
  myfont.innerHTML = '&nbsp;&nbsp;请输入11位数字的电话号码';
  myfont.color="#666666";
  myfont.size =1;
};
inp.onblur = function(){
  //获取input里面的值
  str = this.value;
  //alert(str);
  //match() --->null
  if (str.match(/^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/)==null) {
    //alert('没有匹配到')
    myfont.innerHTML = '&nbsp;&nbsp;用户名验证失败';
    myfont.color="red";
    myfont.size=1;
  }else{
    myfont.innerHTML = '√';
    myfont.color="green";
    myfont.size =1;
    //alert('匹配到了')
  }
}
</script>



