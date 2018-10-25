@extends("Home.HomePublic.public")
@section("title","购物车")

@section("home")
<div class="i_bg">  
    <div class="content mar_20">
        <img src="/static/homes/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20"> 
     @if(!empty(session('cart')))
  
 
        <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>                       
        
          @foreach($data as $v)
          <tr>
            <td>
                <div class="c_s_img"><img src="{{$v['pic']}}" width="73" height="73" /></div>
                {{$v['name']}}
            </td>
            <td align="center">
                <div class="c_num">
                    <input type="button" value="" onclick="test({{$v['id']}},0)" class="car_btn_1" />
                    <input type="text" value="{{$v['num']}}"  name="" class="car_ipt" />  
                    <input type="button" value="" onclick="test({{$v['id']}},1)" class="car_btn_2" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">{{$v['price']*$v['num']}}</td>
            <td align="center"><a href="Carts/{{$v['id']}}" >删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr>
          @endforeach
          <tr height="70">
            <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad"><input type="checkbox" name="clear" checked="checked" /></label><label class="r_txt">清空购物车</label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">{{$total}}</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
            <td colspan="6" align="right">
                <a href="/shop"><img src="/static/homes/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="/order"><img src="/static/homes/images/buy2.gif" /></a>
            </td>
          </tr>
          </table> 
          @else
         <div style="with='100%';height:500px;text-align:center;line-height:100px; font-size:15px; ">购物车无东西 请<a href="/homelogin"><font color="blue">登录</font>或<a href="/shop"><font color="blue">去购物</font>......</div>
         @endif
      
    </div>
    <!--End 第一步：查看购物车 End--> 
    
    <script>
    function test(id,n){
        
       if(n==1){
         $.get('jia',{id:id},function(data){
            if(data==0){
                alert('库存不够');
            }else{
               window.location.reload(); 
            }
         });
       }
       if(n==0){

         $.get('/jian',{id:id},function(data){
            if(data==0){
                return false;
            }else{
               window.location.reload(); 
            }
         
         });
       }
    }
     
  
    </script>  
@endsection
