@extends("Home.HomePublic.public")
@section("title","商品列表")

@section("home")
<div class="i_bg">
    
    <!--Begin 筛选条件 Begin-->
    <div class="content mar_10">
        <table border="0" class="choice" style="width:100%; font-family:'宋体'; margin:0 auto;" cellspacing="0" cellpadding="0">
          <tr >
            <td width="70">&nbsp; 类别：</td>
            <td class="td_a">
             @foreach($cate as $row)
                        @foreach($row->dev as $rrr)
                    <a href="/shop/{{$rrr->id}}">{{$rrr->name}}</a>
                @endforeach
           @endforeach
            </td>
          </tr>
                                                     
        </table>                                                                                 
    </div>
    <!--End 筛选条件 End-->
    
    <div class="content mar_20">
        <div class="l_history">
            <div class="his_t">
                <span class="fl">浏览历史</span>
                <span class="fr"><a href="#">清空</a></span>
            </div>
            
        </div>
        <div class="l_list">
            <div class="list_t">
                <span class="fl list_or">
                    <h1 href="#" class="now">商品列表</h1>
                   
              </span>
                <span class="fr"></span>
            </div>
            <div class="list_c uid">
                
                <ul class="cate_list">
                    @if(count($goods) < 1)
                   <div style="align:center">搜索不到您想要的商品</div>
                    @else 
                    @foreach($goods as $row)
                    <li >
                        <div class="img"><a href="/details/{{$row->id}}"><img src="{{$row->pic}}"  width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{$row->price}}</span></font> &nbsp; 
                        </div>
                        <div class="name"><a href="/details/{{$row->id}}">{{$row->name}}</a></div>
                        <div class="carbg">
                            <form action="/Cart" method="post">
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <input type="hidden" name="num" value="1">
                            <button  class="j_car" style="width20px;height:30px;background:#FF4E00;color:#FFFFFF">加入购物车</button>
                            {{csrf_field()}}
                            </form>
                        </div>
                    </li>
                    @endforeach
                    @endif

                </ul>
          
            </div>
        </div>
    </div>
     @if(session('success'))
  <script>alert("{{session('success')}}")</script>
 @endif
 @if(session('error'))
 <script>alert("{{session('error')}}")</script>
 @endif

@endsection
