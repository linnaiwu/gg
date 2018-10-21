@extends("Home.HomePublic.public")
@section("title","商品")

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
            <ul>
                    @foreach($data as $row)     
                <li>
                    <div class="img"><a href="#"><img src="{{$row->pic}}" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="l_list">
            <div class="list_t">
                <span class="fl list_or">
                    <a href="#" class="now">默认</a>
                   
              </span>
                <span class="fr"></span>
            </div>
            <div class="list_c uid">
                
                <ul class="cate_list">
                    @if(!empty($data))
                    @foreach($data as $row)     
                    <li>
                        <div class="img"><a href="/details/{{$row->id}}"><img src="{{$row->pic}}" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{$row->price}}</span></font> &nbsp; 
                        </div>
                        <div class="name"><a href="#">{{$row->name}}</a></div>
                        <div class="carbg">
                            <a href="#" class="ss">收藏</a>
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


@endsection
