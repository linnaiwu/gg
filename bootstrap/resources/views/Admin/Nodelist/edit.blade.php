@extends("Admin.AdminPublics.public")
@section("title",'后台权限修改')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>权限修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/nodelist/{{$row->id}}" method="post">
 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">权限名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$row->name}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">控制器</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="mname" value="{{$row->mname}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">方法</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="aname" value="{{$row->aname}}"/> 
       </div> 
      </div>
     </div> 
     <div class="mws-button-row">
      {{csrf_field()}}
      {{method_field("PATCH")}}
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
