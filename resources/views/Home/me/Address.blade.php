<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:wb="http://open.weibo.com/wb">
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
     <script src="https://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="/static/homes/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/homes/js/menu.js"></script>    
            
  <script type="text/javascript" src="/static/homes/js/lrscroll_1.js"></script>   
     
    
  <script type="text/javascript" src="/static/homes/js/n_nav.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/static/homes/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/static/homes/css/MagicZoom.css" />
    <script type="text/javascript" src="/static/homes/js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="/static/homes/js/num.js">
      var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="/static/homes/js/p_tab.js"></script>
    
    <script type="text/javascript" src="/static/homes/js/shade.js"></script>
  <script type="text/javascript" src="/static/homes/js/jquery-1.11.1.min_044d0927.js"></script> 
  <script type="text/javascript" src="/static/homes/js/jquery.bxslider_e88acd1b.js"></script> 
  <script type="text/javascript" src="/static/homes/js/jquery-1.8.2.min.js"></script> 
  <script type="text/javascript" src="/static/homes/js/menu.js"></script> 
  <script type="text/javascript" src="/static/homes/js/select.js"></script> 
  <script type="text/javascript" src="/static/homes/js/lrscroll.js"></script> 
  <script type="text/javascript" src="/static/homes/js/iban.js"></script> 
  <script type="text/javascript" src="/static/homes/js/fban.js"></script> 
  <script type="text/javascript" src="/static/homes/js/f_ban.js"></script> 
  <script type="text/javascript" src="/static/homes/js/mban.js"></script> 
  <script type="text/javascript" src="/static/homes/js/bban.js"></script> 
  <script type="text/javascript" src="/static/homes/js/hban.js"></script> 
  <script type="text/javascript" src="/static/homes/js/tban.js"></script> 
  <script type="text/javascript" src="/static/homes/js/lrscroll_1.js"></script> 
  <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
  <title>收货地址</title> 
 </head> 
 <body> 
  <!--Begin Header Begin--> 
  <div class="soubg"> 
   <div class="sou"> 
    <!--Begin 所在收货地区 Begin--> 
    <a href="/">首页</a>
    <!--End 所在收货地区 End--> 
 <!--End 所在收货地区 End--> 
    <span class="fr"> <span class="fl">
    @if(empty(session('homename')))你好,请<a href="/homelogin">登录</a>&nbsp; <a href="/register/create" style="color:#ff4e00;">免费注册</a>
    @else
    <span class="fr"> <span class="fl" style="width:480px;">你好,<a href="/homelogin" style="color:gold;font-size:15px;">{{session('homename')}}</a>&nbsp;<a href="/pull">退出&nbsp;</a><a href="/meuser">个人中心</a>
    &nbsp;|&nbsp;<a href="/orderlist">我的订单</a>
    @endif
    &nbsp;&nbsp;关注我们：<a href="#" class="sh1"><wb:follow-button uid="6796261616" type="red_1" width="67" height="24" ></wb:follow-button></a></span>
    <!-- 微信开始 -->
    <div class="bdsharebuttonbox s_sh" data-tag="share_1" style="width:30px;margin-top:3px;">
      <a class="bds_weixin" data-cmd="weixin" href="#"></a>
     </div>
     <!-- /微信结束 -->
    </span>
   </div> 
  </div> 

  <!--End Header End--> 
  <!--Begin Menu Begin-->

  
    <!--End 商品分类详情 End--> 
  <!--   <ul class="menu_r"> 
    @foreach($cate as $row)
     <li><a href="/shop">{{$row->name}}</a></li> 
    @endforeach
    </ul> 
    -->

<!--End Header End--> 
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="/orderlist">我的订单</a></li>
                    <li><a href="/address" class="now">收货地址</a></li>
                    
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
          <tr>
            <td><button class="btn btn-info"><a href="/order">订单信息</a></button></td>
          </tr>
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
                <td style="font-family:'宋体';"><input type="text" name="name" value="" class="add_ipt"  id="name" />
               @if (count($errors)>0)
                 @foreach ($errors->get('name') as $error)
               <span style="color:red"> {{ $error }}</span>
                 @endforeach
                @else
            <span  style="color:red"> (必填) </span>
              @endif
                </td>

              </tr>
              <tr>
                <td align="right">附加地址</td>
                <td style="font-family:'宋体';"><input type="text" name="addr" value="" class="add_ipt" />  <span  style="color:red"> (必填) </span></td>
              </tr>
              <tr>
                <td align="right">手机</td>
                <td style="font-family:'宋体';"><input type="text" id="ph" name="phone" value="" class="add_ipt" /><span id="zheng" style="color:red"> (必填) </span></td>
              </tr>
           <tr>
                <td aling="right">
                 <button type="submit" class="btn btn-success" id="btn">确认添加</button>
                 </td>
            </tr>
            </table>
          </form>
            
        </div>
    </div>
	<!--End 用户中心 End--> 
    
    <!--End Footer End -->    
</div>

</body>
<script>
//手机号正则
  var  btn = document.getElementById('btn');
var inp = document.getElementById('ph');
var  myfont = document.getElementById('zheng');
    btn.disabled = true;
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
    myfont.innerHTML = '&nbsp;&nbsp;手机验证失败';
    myfont.size=1;
    btn.disabled = true;
    // alert("用户名验证失败");
  }else{
    myfont.innerHTML = '√';
    myfont.color="green";
    myfont.size =1;
      btn.disabled = false;
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
 <!-- 分享模块 -->
<script>
  window._bd_share_config = {
    common : {
      bdText : '自定义分享内容', 
      bdDesc : '自定义分享摘要', 
      bdUrl : '自定义分享url地址',   
      bdPic : '自定义分享图片'
    },
    share : [{
      "bdSize" : 16
    }],
    selectShare : [{
      "bdselectMiniList" : ['weixin']
    }]
  }
  with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
<!-- 分享模块结束 -->
</html>
