@extends("Admin.AdminPublics.public")
@section("title",'分类修改')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>分类修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admincate/{{$row->id}}" method="post">
   
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$row->name}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
          <input type="radio" name="status" value="0" @if($row->status==0) checked @endif>隐藏
          <input type="radio" name="status" value="1" @if($row->status==1) checked @endif>显示
       </div> 
      </div> 
      
     </div> 
     <div class="mws-button-row">
      {{csrf_field()}}
      {{method_field("PATCH")}}
      <input type="hidden" name="pid" value="{{$row->pid}}">
      <input type="hidden" name="path" value="{{$row->path}}">
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
