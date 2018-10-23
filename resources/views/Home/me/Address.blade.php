<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link type="text/css" rel="stylesheet" href="/static/homes/css/style.css" />
	<link type="text/css" rel="stylesheet" href="/static/homes/css/bootstrap.min.css" />
    <!--[if IE 6]>
    <script src="/static/homes/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
        
    <script type="text/javascript" src="/static/homes/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/homes/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/homes/js/jquery-1.8.2.min.js"></script>

    <script type="text/javascript" src="/static/homes/js/menu.js"></script>    
        
	<script type="text/javascript" src="/static/homes/js/select.js"></script>
        
    
<title>尤洪</title>
</head>
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
        <span class="fr">
        	<span class="fl">你好,{{session('homename')}}&nbsp;&nbsp;<a href="/pull" style="color:#ff4e00;">退出</a>&nbsp;|&nbsp;<a href="#">我的订单</a>&nbsp;|</span>
        	<span class="ss">
            	<div class="ss_list">
                	<a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">我的收藏夹</a></li>
                                <li><a href="#">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
                <div class="ss_list">
                	<a href="#">客户服务</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/static/homes/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>

<!--End Header End--> 
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="/orderlist">我的订单</a></li>
                    <li><a href="#" class="now">收货地址</a></li>
                    
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
                	<li><a href="/safe">账户安全</a></li>
                    <li><a href="Member_Packet.html">我的红包</a></li>
                    <li><a href="Member_Money.html">资金管理</a></li>
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
	<!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/homes/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/homes/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/homes/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/homes/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
    	<dl>                                                                                            
        	<dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
        	<a href="#" class="b_sh1">新浪微博</a>            
        	<a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/static/homes/images/er.gif" width="118" height="118" /></div>
            <img src="/static/homes/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/static/homes/images/b_1.gif" width="98" height="33" /><img src="/static/homes/images/b_2.gif" width="98" height="33" /><img src="/static/homes/images/b_3.gif" width="98" height="33" /><img src="/static/homes/images/b_4.gif" width="98" height="33" /><img src="/static/homes/images/b_5.gif" width="98" height="33" /><img src="/static/homes/images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
</div>

</body>
<script>
//手机号正则
var inp = document.getElementById('ph');
var  myfont = document.getElementById('zheng');
inp.onfocus=function(){
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

//删除地址
  $(".dele").click(function(){
    //获取id
    id=$(this).parents("tr").find("td:first").html();
    // alert(id);
    s=$(this).parents("tr");
    ss=confirm("你确定删除吗?");
    if(ss){
       // alert(id);
        $.get("/addrdel",{id:id},function(data){
          // alert(data);
          if(data==1){
            // alert("删除成功");
            //删除数据所在的tr
            s.remove();
          }
        });
    }
  });
$(".status").click(function(){
  // alert("1");
   idd=$(this).parents("tr").find("td:first").html();
   // alert(idd);
   $.get("/status",{id:idd},function(tt){
    // alert(tt);
    if(tt==1){
     // alert("默认") ;
 window.location.reload(); 
    }else{
      alert("已是默认地址");
    }
   });

});

  //第一级别获取
  $.get('/ajaxaddr',{upid:0},function(result){
    //禁止请选择选中
    // alert(result);
    $('.ss').attr('disabled',true);

      //得到的数据数组内容 我们要遍历得到里面的每个对象
      for(var i=0;i<result.length;i++){
        console.log(result[i].name);
        //将我们得到的地址写到option标签中
        var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');

        //将得到的optiion对象添加到select对象中
        $('#sid').append(info);
      }

  },'json');

  //其他级别内容
  $('select').live('change',function(){
    //将当前对象存储
    obj = $(this);

    //通过id来查找下一个级别
    //alert($(this).val());
    id = $(this).val();
    //清除所有其他的select
    obj.nextAll('select').remove();

    $.getJSON('./ajaxaddr',{upid:id},function(result){
      if(result != ''){

      
      //if(!result)
      //创建一个select标签对象
      var select = $('<select></select>');
      //防止当前城市没有办法选择所以添加请选择option标签
      var op = $('<option class="mm">--请选择--</option>');

      select.append(op);

      //循环得到的数组表里面的option 标签添加到select标签中
      for(var i=0;i<result.length;i++){
        var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
        //将option标签添加到select标签中
        select.append(info);
      }
      //将select添加到当前标签后面
      obj.after(select);
      //把其他级别的请选择禁用
      $('.mm').attr('disabled',true);
      }

    })
  })
  //获取选中的数据提交到操作页面
  $('button').click(function(){
    arr=[];
    console.log($('select'));
    $('select').each(function(){
      //获取当前select被选中option标签的中文文本
      opdata = $(this).find('option:selected').html();

      //将我们得到的每个值放置到数组中
      arr.push(opdata);
    })

    //将得到的数据直接赋值给隐藏域的value值即可
    
    $('input[name=city]').val(arr);


  })

</script>
</html>
