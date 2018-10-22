@extends("Admin.AdminPublics.public")
@section("title",'后台权限列表')

@section('admin')
<html>
 <head></head>
 <script src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 后台权限列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 142px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">权限名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">控制器</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">方法</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 90px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($nodelist as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->name}}</td> 
        <td class=" ">{{$row->mname}}</td> 
        <td class=" ">{{$row->aname}}</td> 
        <td class=" ">
        <a href="/nodelist/{{$row->id}}" class="btn btn-warning">修改</a>
          <form action="/nodelist/{{$row->id}}" method="post">
            <button class="btn btn-success">普通删除</button>
            {{method_field('DELETE')}}
            {{csrf_field()}}
          </form>
          <!-- Ajax -->
        <!--   <a href="javascript:viod(0)" class="btn btn-info del">Ajax删除</a> -->
       
         <!--  <a href="/adminuser/{{$row->id}}/edit" class="btn btn-info"><i class="icon-wrench"></i></a> -->
        </td> 
       </tr>
       @endforeach
      </tbody>
     </table>
    
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
  
 </script>
</html>
@endsection
