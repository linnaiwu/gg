@extends("Admin.AdminPublics.public")
@section("title",'后台分配权限列表')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="container"> 
   <div class="container"> 
    <div class="mws-panel-body no-padding"> 
     <form class="mws-form" action="/saveauth" method="post"> 
      <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">权限信息</label> 
        <div class="mws-form-item clearfix"> 
         <h4>当前角色 :<font size="5" color="red">{{$role->name}}</font> 的角色信息</h4> 
         <ul class="mws-form-list inline">
         @foreach($auth as $row)
          <li><input type="checkbox" name="nids[]" value="{{$row->id}}" @if(in_array($row->id,$nids))checked @endif/> <label>{{$row->name}}</label></li><br>
         @endforeach
         </ul> 
        </div> 
       </div> 
      </div> 
      <div class="mws-button-row">
      {{csrf_field()}}
      <input type="hidden" name="rid" value="{{$role->id}}">
       <input value="分配权限" class="btn btn-danger" type="submit" /> 
       <input value="Reset" class="btn " type="reset" /> 
      </div> 
     </form> 
    </div> 
    <!-- Panels End --> 
   </div> 
   <!-- Panels End --> 
  </div>
 </body>
</html>
@endsection
