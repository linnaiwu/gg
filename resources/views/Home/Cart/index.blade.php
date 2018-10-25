@extends("Home.HomePublic.public")
@section("title","购物车")

@section("home")
<div class="i_bg">  
    <div class="content mar_20">
        <img src="/static/homes/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20 vs"> 
     @if(!empty(session('cart')) && !empty((session('homename'))))
     <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>                       
          @foreach($data as $v)
          <tr class="dd{{$v['id']}}">
            <td>
                <div class="c_s_img"><img src="{{$v['pic']}}" width="73" height="73" /></div>
                {{$v['name']}}
            </td>
            <td align="center">
                <div class="c_num">
                    <input type="button" value="" class="car_btn_1" />
                    <input type="text" value="{{$v['num']}}" class="car_ipt"  disabled  aid="{{$v['id']}}" />  
                    <input type="button" value="" class="car_btn_2 cc{{$v['id']}}" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;" class="a{{$v['id']}}" a="{{$v['price']}}">{{$v['price']*$v['num']}}</td>
            <td align="center"><a href="javascript:void(0)" class="del" dd="{{$v['id']}}">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr>
          @endforeach
          <tr height="70">
            <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad"></label><label class="r_txt"><a href="javascript:void(0);" class="delcar">清空购物车</a></label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;" class="total">{{$total}}</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
            <td colspan="6" align="right">
                <a href="/shop"><img src="/static/homes/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="/order"><img src="/static/homes/images/buy2.gif" /></a>
            </td>
          </tr>
          </table>
          @elseif(empty(session('cart')) && empty(session('homename')))
         <div style="width:'100%';height:500px;text-align:center;line-height:100px; font-size:15px; ">购物车无东西 请<a href="/homelogin"><font color="blue">登录</font>或<a href="/shop"><font color="blue">去购物</font>......</div>
         @endif
         @if(empty(session('cart')) && !empty((session('homename'))))

         <div style="width:'100%';height:500px;text-align:center;line-height:100px; font-size:15px; ">亲,购物车无东西 请<a href="/shop"><font color="blue">去购物</font></a>......</div>
        
         @elseif(!empty(session('cart')) && empty((session('homename'))))

         <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>                       
          @foreach($data as $v)
          <tr class="dd{{$v['id']}}">
            <td>
                <div class="c_s_img"><img src="{{$v['pic']}}" width="73" height="73" /></div>
                {{$v['name']}}
            </td>
            <td align="center">
                <div class="c_num">
                    <input type="button" value="" class="car_btn_1" />
                    <input type="text" value="{{$v['num']}}" class="car_ipt"  disabled  aid="{{$v['id']}}" />  
                    <input type="button" value="" class="car_btn_2 cc{{$v['id']}}" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;" class="a{{$v['id']}}" a="{{$v['price']}}">{{$v['price']*$v['num']}}</td>
            <td align="center"><a href="javascript:void(0)" class="del" dd="{{$v['id']}}">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr>
          @endforeach
          <tr height="70">
            <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad"></label><label class="r_txt"><a href="javascript:void(0);" class="delcar">清空购物车</a></label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;" class="total">{{$total}}</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
            <td colspan="6" align="right">
                <a href="/shop"><img src="/static/homes/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="/order"><img src="/static/homes/images/buy2.gif" /></a>
            </td>
          </tr>
          </table>
         @endif
      
    </div>
    <!--End 第一步：查看购物车 End--> 
    
    <script>
  
     
      $('.car_btn_2').click(function(){
         
         id = $(this).prev().attr('aid');
         o = $(this);
         num1 = $(this).prev().val();
          n1  =parseInt(num1)+1;

          if(n1>99){
               o.prev().val(99);
               o.attr('disabled',true);
              alert('最多可买99件');
              return false;
            }
         $.get('/jia',{id:id,num:n1},function(data){ 
           });
            
              price = o.parents('td').next().attr('a');
              total = $('.total').html();      
              pr = price*Number(n1)
              to = (Number(price)+Number(total));
              $('.total').html(to);
              o.prev().val(n1);
              o.parents('td').next().html(pr);
            
            
            
       
       });
      
    

  
        $('.car_btn_1').click(function(){

         id = $(this).next().attr('aid');
         o = $(this);
         o.attr('disabled',false);
         num2 = $(this).next().val();
         n2 = parseInt(num2)-1;


         if(n2<1){
              $(this).next().val('1');
              return false;
            }
         $.get('/jian',{id:id,num:n2},function(data){
            // alert(data);
         });
            
             
              price =  o.parents('td').next().attr('a');
              total = $('.total').html();      
              pr = price*Number(n2);
              to = total-price;
              $('.total').html(to);
              o.next().val(n2);
              o.parents('td').next().html(pr);

          

            
        
       });
      


   $('.del').click(function(){
      id = $(this).attr('dd');
      mon = $(this).parent('td').prev().html();
      ts = $(this);
    
      $.get('/Carts',{id:id},function(data){
      
        if(data==0){
         
          ts.parents('table').remove();
          $('.vs').html(`<div style="width:100%;height:500px;text-align:center;line-height:100px; font-size:15px; ">购物车无东西 请<a href="/homelogin"><font color="blue">登录</font>或<a href="/shop"><font color="blue">去购物</font>......</div>`);
  
      }

      if(data==1){
        ts.parents('tr').remove();
        total = $('.total').html();  
        to =total-mon;
        $('.total').html(to);
      }

      if(data==2){
        ts.parents('table').remove();
        $('.vs').html(`<div style="width:'100%';height:500px;text-align:center;line-height:100px; font-size:15px; ">亲,购物车无东西 请<a href="/shop"><font color="blue">去购物</font></a>......</div>`);
      }

      if(data==3){
        ts.parents('tr').remove();
        total = $('.total').html();  
        to =total-mon;
        $('.total').html(to);
      }
    });
});
   $('.delcar').click(function(){
    o = $(this);
      $.get('/delcar',{},function(data){
         if(data==0){
         
          o.parents('table').remove();
          $('.vs').html(`<div style="width:100%;height:500px;text-align:center;line-height:100px; font-size:15px; ">购物车无东西 请<a href="/homelogin"><font color="blue">登录</font>或<a href="/shop"><font color="blue">去购物</font>......</div>`);
        }
           if(data==1){
          o.parents('tr').remove();
          total = $('.total').html();  
          to =total-mon;
          $('.total').html(to);
      }

      if(data==2){
          o.parents('table').remove();
          $('.vs').html(`<div style="width:'100%';height:500px;text-align:center;line-height:100px; font-size:15px; ">亲,购物车无东西 请<a href="/shop"><font color="blue">去购物</font></a>......</div>`);
      }

      if(data==3){
          o.parents('tr').remove();
          total = $('.total').html();  
          to =total-mon;
          $('.total').html(to);
      }

      });
   });
     
  
    </script>  
@endsection