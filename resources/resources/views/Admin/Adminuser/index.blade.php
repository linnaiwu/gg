@extends("Admin.AdminPublics.public")
@section("title",'后台管理员列表')

@section('admin')
<html>
 <head></head>
 <script src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 后台管理员列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

    <form action="/adminusers" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索管理员: <input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}" /></label>
      <input type="submit" value="搜索">
     </div>
      
    </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"  aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 142px;">&nbsp;全选</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 142px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">管理员</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 174px;">密码</th>
        
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 90px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($adminuser as $row)
       <tr class="odd"> 
        <td class=" " align="center"><input type="checkbox" value="{{$row->id}}"></td> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->name}}</td> 
        <td class=" ">{{$row->password}}</td> 
        <td class=" ">
        <a href="/adminrole/{{$row->id}}" class="btn btn-success">分配角色</a>
          <form action="/adminusers/{{$row->id}}" method="post">
            <button class="btn btn-success">删除</button>
            {{method_field('DELETE')}}
            {{csrf_field()}}
          </form>
          <!-- Ajax -->
        <!--   <a href="javascript:viod(0)" class="btn btn-info del">Ajax删除</a> -->
       
          <a href="/adminuser/{{$row->id}}/edit" class="btn btn-info"><i class="icon-wrench"></i></a>
        </td> 
       </tr>
       @endforeach
       <tr>
         <td colspan="5"><a href="javascript:void(0)" class="btn btn-success allchoose">全选</a>
         <a href="javascript:void(0)" class="btn btn-success nochoose">全不选</a>
         <a href="javascript:void(0)" class="btn btn-success fchoose">反选</a>
         </td>
       </tr>
       <tr>
         <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-info del">删除</a></td>
       </tr>
      </tbody>
     </table>
    
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     {{$adminuser->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 // alert($);
 // 全选
$(".allchoose").click(function(){
  $("#DataTables_Table_1").find("tr").each(function(){
    // alert(aa);
    $(this).find(":checkbox").attr("checked",true);
  });
});
// 全不选
$(".nochoose").click(function(){
  $("#DataTables_Table_1").find("tr").each(function(){
    // alert(aa);
    $(this).find(":checkbox").attr("checked",false);
  });
});
// 反选
$(".fchoose").click(function(){
  $('#DataTables_Table_1').find("tr").each(function(){
    // 判断是否选中
    if($(this).find(":checkbox").attr("checked")){
      // 设置为不选中
      $(this).find(":checkbox").attr("checked",false);
    }else{
      $(this).find(":checkbox").attr("checked",true);
    }
  });
});

// Ajax删除
$(".del").click(function(){
  a=[];
  // 先获取选中的id
  // 遍历
  $(":checkbox").each(function(){
    if($(this).attr("checked")){
      id=$(this).val();
      // alert(id);
      // 元素添加到数组里
      a.push(id);
    }
  });
  // alert(a);
  // Ajax 通过id传过去
  $.get("/dels",{a:a},function(data){
    // alert(data);
    if(data==1){
      alert("删除成功");
      // 删除成功再删除tr
      // 遍历
      for(var i=0;i<a.length;i++){
        // 找tr remove删除
        $("input[value='"+a[i]+"']").parents("tr").remove();
      }
    }else{
      alert(data);
    }
  });

});
 </script>
</html>
@endsection
