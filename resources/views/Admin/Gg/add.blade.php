@extends("Admin.AdminPublics.public")
@section("title",'广告添加')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span广告添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/gg" method="post" enctype="multipart/form-data">
   
     <div class="mws-form-inline"> 
     <div class="mws-form-row"> 
       <label class="mws-form-label">广告名字:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" /> 
       </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">广告上传:</label> 
       <div class="mws-form-item"> 
        <input type="file" class="large" name="pic" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态:</label> 
       <div class="mws-form-item"> 
          <input type="radio" name="status" value="1" >显示
          <input type="radio" name="status" value="2">隐藏
       </div> 
      </div>
      
     </div> 
     <div class="mws-button-row">
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
