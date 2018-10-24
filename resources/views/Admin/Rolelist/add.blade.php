@extends("Admin.AdminPublics.public")
@section("title",'后台角色添加')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>角色添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/rolelist" method="post">
 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">新角色名</label> 
       <div class="mws-form-item"> 
        <input type="text" name="name" /> 
       </div> 
      </div> 
     
     </div> 
     <div class="mws-button-row">
      {{csrf_field()}}
      <input type="hidden" name="status" value="1">
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
