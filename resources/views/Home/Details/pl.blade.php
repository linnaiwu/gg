  @extends("Home.HomePublic.public")
@section("title","商品评价")

@section("home")
         <div class="content mar_20">
         <div class="mem_tit">商品:</div>
               <table border="0" style="width:880px; margin-top:20px;" cellspacing="0" cellpadding="0">
               <tr>
                 <td>商品名:{{$gg->name}}</td>
               </tr>
                <tr>
                 <td>图片:<img src="{{$gg->pic}}"></td>
               </tr>
               </table>
           <div class="mem_tit">评价:</div>
            <form action="/pl" method="post">
            <table border="0" style="width:880px; margin-top:20px;" cellspacing="0" cellpadding="0">

              <tbody><tr >
                <td width="80" align="right">好评值: &nbsp; &nbsp;</td>
                <td>                            
                  <ul class="rating nostar">
  <li class="one"><a href="#" title="1 Star"  class="xx">1</a></li>
  <li class="two"><a href="#" title="2 Stars"  class="xx">2</a></li>
  <li class="three"><a href="#" title="3 Stars"  class="xx">3</a></li>
  <li class="four"><a href="#" title="4 Stars"  class="xx">4</a></li>
  <li class="five"><a href="#" title="5 Stars"  class="xx">5</a></li>

</ul>
                </td>
              </tr>
        
              <tr valign="top" height="110">
                <td align="right">评价内容 &nbsp; &nbsp;</td>
                <td style="padding-top:5px;"><textarea class="add_txt" placeholder="请填写评论 限定字数为30" style="resize: none; " name="content"></textarea></td>
              </tr>

            
              <tr height="50" valign="bottom">
                <td>&nbsp;</td>
                <input type="hidden" name="score" value="">
                <input type="hidden" name="gid" value="{{$info['gid']}}">
                <input type="hidden" name="oid" value="{{$info['oid']}}">
                {{csrf_field()}}
                <td><input type="submit" value="提交" class="btn_tj"></td>
              </tr>
            </tbody></table>
            </form>          
    </div>
    <script>
  
/*字数限制*/
    $(".add_txt").on("input propertychange", function () {
        var $this = $(this),
                _val = $this.val(),
                count = "";
        if (_val.length > 30) {
            $this.val(_val.substring(0, 30));
        }
        count = 100 - $this.val().length;
        $("#text-count").text(count);
    });



    $('.xx').click(function(){
       a = $(this).html();
       if(a==1){
        $(this).parents('ul').attr('class','rating onestar');
       }
       if(a==2){
        $(this).parents('ul').attr('class','rating twostar');
       }
       if(a==3){
        $(this).parents('ul').attr('class','rating threestar');
       }
       if(a==4){
        $(this).parents('ul').attr('class','rating fourstar');
       }
       if(a==5){
        $(this).parents('ul').attr('class','rating fivestar');
       }

       $('input[name="score"]').val(a);
    });
     
    </script>
   @endsection