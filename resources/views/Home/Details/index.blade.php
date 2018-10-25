
@extends("Home.HomePublic.public")
@section("title","商品")

@section("home")

 <div class="i_bg">
  <div class="postion">
     
    </div>    
       @foreach($dataa as $row)                    
    <div class="content">
     <div id="tsShopContainer"> 
     <div id="tsImgS">
     <!-- 大图 -->
   
      <a href="{{$row->pic}}" title="Images" class="MagicZoom" id="MagicZoom"><img src="{{$row->pic}}" width="390" height="390" /></a>
     </div> 
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                <!-- 大图的放大镜 -->
                   <ul> 
                    <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="{{$row->pic}}" tsimgs="{{$row->pic}}" width="79" height="79" />
                    </li> 
                   </ul> 
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="images/loading.gif" alt="Loading..." />       
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
           
        
            <div class="des_join"> 
              <div class="j_nums"> 
              <form action="/Cart" method="post">
               <input type="text" value="1" name="num" readonly class="n_ipt" /> 
               <input type="button" value="" onclick="addUpdate(jq(this));" class="n_btn_1"  /> 
               <input type="button" value="" onclick="jianUpdate(jq(this));" class="n_btn_2" /> 
              </div> 
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$row->id}}">
              <span class="fl"><button style="background:url('/static/homes/images/j_car.png');width:180px;height:200px;">购物车</button></span> 
              </form>
             </div> 
            </div>    
        
    </div>
    <div class="content mar_20">
      
    
            @foreach($dataa as $row)
            <div class="des_border" id="p_details">
                <div class="des_t">商品详情</div>
                <div class="des_con">
                    <font align="center">
                        {!!$row->descr!!}
                    </font>
                </div>
            </div>  
            @endforeach
    </div>
    @endforeach
    


@endsection
