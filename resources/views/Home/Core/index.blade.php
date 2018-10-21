@extends("Home.CorePublic.public")
  @section("zz")
    <div class="mem_tit">
      收货地址
     </div> 
       <a href="/core/create"><img src="/static/homes/images/add_ad.gif" /></a> 
       @foreach($data as $row)
     <div class="address"> 
      <div class="a_close">
       <a href="#"><img src="/static/homes/images/a_close.png" /></a>
      </div> 
      <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0"> 
       <tbody>
        <tr> 
         <td colspan="2" style="font-size:14px; color:#ff4e00;">编号</td> 
         <td colspan="2" style="font-size:14px; color:#ff4e00;">收货人</td> 
         <td colspan="2" style="font-size:14px; color:#ff4e00;">手机号码</td>
         <td colspan="2" style="font-size:14px; color:#ff4e00;">收货地址</td> 
        </tr> 
       <tr>
       <td colspan="2" style="font-size:14px; color:black;">{{$row->id}}</td> 
         <td colspan="2" style="font-size:14px; color:black;">{{$row->name}}</td> 
         <td colspan="2" style="font-size:14px; color:black;">{{$row->phone}}</td>
         <td colspan="2" style="font-size:14px; color:black;">{{$row->address}}</td> 
     
        <td colspan="4" align="right"> <a href="#" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="#" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp; </td> 
       </tr>
       </tbody>
     </div> 
      </table> 
     </div> 
       @endforeach
  @endsection
