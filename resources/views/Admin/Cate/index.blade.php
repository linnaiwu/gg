@extends("Admin.AdminPublics.public")
@section("title",'后台分类列表')

@section('admin')
<html>
 <head></head>
 <script src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 后台分类列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

 
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 142px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">分类名</th>
       
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">pid</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">path</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">状态</th>
        
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 90px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($cate as $row)
       <tr class="odd"> 
        <th class="  sorting_1">{{$row->id}}</th> 
        <th class=" ">{{$row->name}}</th> 
        <th class=" ">{{$row->pid}}</th> 
        <th class=" ">{{$row->path}}</th> 
        <th class=" ">@if($row->status == 1) 显示 @endif
        @if($row->status == 0) 隐藏 @endif</th> 
       
        <th class=" ">
          <form action="/admincate/{{$row->id}}" method="post">
            <button class="btn btn-success">普通删除</button>
            {{method_field('DELETE')}}
            {{csrf_field()}}
          </form>
     
          <a href="/admincate/{{$row->id}}" class="btn btn-info">&nbsp;&nbsp;<i class="icon-wrench"></i>&nbsp;&nbsp;</a>
        </th> 
       </tr>
       @endforeach
      </tbody>
     </table>
    
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     {{$cate->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
  
 </script>
</html>
@endsection
