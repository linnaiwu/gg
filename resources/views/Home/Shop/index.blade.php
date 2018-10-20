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
                                    @foreach($goods as $row)
                    <li >
                        <div class="img"><a href="/details/{{$row->id}}"><img src="{{$row->pic}}"  width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{$row->price}}</span></font> &nbsp; 
                        </div>
                        <div class="name"><a href="#">{{$row->name}}</a></div>
                        <div class="carbg">
                            <a href="#" class="ss">收藏</a>
                            <a href="#" class="j_car">加入购物车</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
          
            </div>
        </div>
    </div>


@endsection
