
@extends("Home.HomePublic.public")
@section("title","商品")

@section("home")

  <div class="i_bg"> 
   <div class="postion"> 
   </div> 
   <div class="content"> 
   @foreach($dataa as $row)
    <div id="tsShopContainer"> 
     <div id="tsImgS">
     <!-- 大图 -->
   
      <a href="/static/homes/images/p_big.jpg" title="Images" class="MagicZoom" id="MagicZoom"><img src="{{$row->pic}}" width="390" height="390" /></a>
     </div> 
     <div id="tsPicContainer"> 
      <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div> 
      <div id="tsImgSCon"> 
       <ul> 
        <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="{{$row->pic}}" tsimgs="/static/homes/images/ps1.jpg" width="79" height="79" /></li> 
       </ul> 
      </div> 
      <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div> 
     </div> 
     <img class="MagicZoomLoading" width="16" height="16" src="/static/homes/images/loading.gif" alt="Loading..." /> 
    </div> 
    <div class="pro_des"> 
     <div class="des_name"> 
      <p>{{$row->name}}</p>
     </div> 
     <div class="des_price">
       本店价格：
      <b>￥{{$row->price}}</b>
      <br /> 消费积分：
      <span>28R</span> 
     </div> 
     <div class="des_choice"> 
      <span>货存：{{$row->stock}}&nbsp;量</span> 
      
     </div> 
   
     <div class="des_share"> 
       <span>商品描述:</span> 
       <span>&nbsp;&nbsp;{!!$row->descr!!}</span>
      
     </div> 
     <div class="des_join"> 
      <div class="j_nums"> 
       <input type="text" value="1" name="" class="n_ipt" /> 
       <input type="button" value="" onclick="addUpdate(jq(this));" class="n_btn_1" /> 
       <input type="button" value="" onclick="jianUpdate(jq(this));" class="n_btn_2" /> 
      </div> 
      <span class="fl"><a onclick="ShowDiv_1('MyDiv1','fade1')"><img src="/static/homes/images/j_car.png" /></a></span> 
     </div> 
    </div> 
    @endforeach
   </div> 
 
   <!--Begin 弹出层-收藏成功 Begin--> 
   <div id="fade" class="black_overlay"></div> 
   <div id="MyDiv" class="white_content"> 
    <div class="white_d"> 
     <div class="notice_t"> 
      <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/static/homes/images/close.gif" /></span> 
     </div> 
     <div class="notice_c"> 
      <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0"> 
       <tbody>
        <tr valign="top"> 
         <td width="40"><img src="/static/homes/images/suc.png" /></td> 
         <td> <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br /> <a href="#">查看我的关注 &gt;&gt;</a> </td> 
        </tr> 
        <tr height="50" valign="bottom"> 
         <td>&nbsp;</td> 
         <td><a href="#" class="b_sure">确定</a></td> 
        </tr> 
       </tbody>
      </table> 
     </div> 
    </div> 
   
   </div> 
   <!--End 弹出层-收藏成功 End--> 
   <!--Begin 弹出层-加入购物车 Begin--> 
   <div id="fade1" class="black_overlay"></div> 
   <div id="MyDiv1" class="white_content"> 
    <div class="white_d"> 
     <div class="notice_t"> 
      <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="/static/homes/images/close.gif" /></span> 
     </div> 
     <div class="notice_c"> 
      <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0"> 
       <tbody>
        <tr valign="top"> 
         <td width="40"><img src="/static/homes/images/suc.png" /></td> 
         <td> <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br /> 购物车共有1种宝贝（3件） &nbsp; &nbsp; 合计：1120元 </td> 
        </tr> 
        <tr height="50" valign="bottom"> 
         <td>&nbsp;</td> 
         <td><a href="#" class="b_sure">去购物车结算</a><a href="#" class="b_buy">继续购物</a></td> 
        </tr> 
       </tbody>
      </table> 
     </div> 
    </div> 
   </div> 
  </div>


@endsection
