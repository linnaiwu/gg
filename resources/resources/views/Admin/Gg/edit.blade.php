@extends("Admin.AdminPublics.public")
@section("title",'广告修改')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>广告修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/gg/{{$data->id}}" method="post" enctype="multipart/form-data"ype>
	<div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">广告名字:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$data->name}}" /> 
       </div> 
      </div> 
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
	@if ($data->status==1) 
	checked
	@endif
        >显示
        <input type="radio" name="status" value="2" 
       @if ($data->status==2) 
	checked
	@endif
	 >隐藏
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
