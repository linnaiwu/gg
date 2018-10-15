@extends("Admin.AdminPublics.public")
@section("title",'后台商品修改')

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
    <span>商品修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminshop/{{$info->id}}" method="post" enctype="multipart/form-data">
 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$info->name}}" /> 
       </div> 
      </div> 
   
      <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">旧图</label> 
       <div class="mws-form-item">
          <img src="{{$info->pic}}" width="200px" height="200px"> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">图片上传</label> 
       <div class="mws-form-item"> 
        <input type="file" class="large" name="pic" /> 
       </div> 
      </div>
 
       <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品价格</label> 
       <div class="mws-form-item"> 
        ￥ <input type="text" name="price" value="{{$info->price}}"/>.00 元
       </div> 
      </div> 
       <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">库存</label> 
       <div class="mws-form-item"> 
        <input type="text" name="stock" value="{{$info->stock}}"/> 
       </div> 
      </div> 
      <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">是否上架</label> 
       <div class="mws-form-item"> 
        <input type="radio" name="display" value="0" @if($info->display==0) checked @endif/> 下架
        <input type="radio" name="display" value="1" @if($info->display==1) checked @endif/> 上架
       </div> 
      </div> 
       <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">出厂地</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="producer" value="{{$info->producer}}" /> 
       </div> 
      </div> 
       <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">描述</label> 
       <div class="mws-form-item"> 
          <script id="editor" type="text/plain" name="descr" style="width:800px;height:500px;">{!!$info->descr!!}</script>
       </div> 
      </div> 
     </div> 
     <div class="mws-button-row">
      {{csrf_field()}}
      {{method_field("PUT")}}
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
    <script type="text/javascript">
  //实例化编辑器
  //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接
  // 调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('editor');
    </script>
</html>
@endsection
