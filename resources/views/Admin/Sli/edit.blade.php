@extends("Admin.AdminPublics.public")
@section("title",'轮播图修改')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>轮播图修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/slides/{{$data->id}}" method="post" enctype="multipart/form-data"ype>

     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">图片上传:</label> 
       <div class="mws-form-item"> 
        <input type="file" class="large" name="pic" value="" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
        <input type="radio" name="status" value="1"
	@if $data->status==1@endif
        >显示
        <input type="radio" name="status" value="2">隐藏
       </div> 
      </div>
   
      
     </div> 
     <div class="mws-button-row">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
