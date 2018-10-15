@extends("Admin.AdminPublics.public")
@section("title",'后台权限添加')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>权限添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/nodelist" method="post">
 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">权限名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name"  /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">控制器</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="mname" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">方法</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="aname" /> 
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
