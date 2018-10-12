@extends("Admin.AdminPublics.public")
@section("title",'公告添加')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span轮播图添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/notice" method="post" enctype="multipart/form-data">
   
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">公告标题:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="title" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">公告说明:</label> 
       <div class="mws-form-item"> 
          <textarea cols="" rows="" name=""></textarea>
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
