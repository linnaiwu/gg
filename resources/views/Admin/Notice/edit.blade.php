@extends("Admin.AdminPublics.public")
@section("title",'公告修改')

@section('admin')
<html>
 <head></head>
  <script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/ueditor.all.min.js">
</script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加
载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/lang/zh-cn/zh-cn.js">
</script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>公告修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/notice/{{$data->id}}" method="post" enctype="multipart/form-data"ype>
	
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">公告标题:</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="title" value="{{$data->title}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态:</label> 
       <div class="mws-form-item"> 
          <input type="radio" name="status" value="0" @if($data->status ==0) checked @endif>隐藏
          <input type="radio" name="status" value="1" @if($data->status ==1) checked @endif>显示
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">公告内容:</label> 
       <div class="mws-form-item"> 
        <script id="editor" type="text/plain" name="descr" style="width:800px;height:500px;">{!!$data->descr!!}
        </script>
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
  <script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');
</script>
</html>
@endsection
