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
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 142px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">管理员</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 174px;">密码</th>
        
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 90px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($adminuser as $row)
       <tr class="odd"> 
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

 </script>
</html>
@endsection
