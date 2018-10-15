@extends("Admin.AdminPublics.public")
@section("title",'后台会员列表')

@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 后台会员Ajax分页列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

    <form action="/adminuserss" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索会员: <input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}" /></label>
      <input type="submit" value="搜索">
     </div>
      
    </form>
    <div id="uid">
      
       <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
        <thead> 
         <tr role="row">
          <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 142px;">ID</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">会员名</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 174px;">邮箱</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 174px;">电话</th>
          
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 90px;">操作</th>
         </tr> 
        </thead> 
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($data as $row)
         <tr class="odd"> 
          <td class="  sorting_1">{{$row->id}}</td> 
          <td class=" ">{{$row->username}}</td> 
          <td class=" ">{{$row->email}}</td> 
          <td class=" ">{{$row->phone}}</td> 
          <td class=" ">
            <a href="" class="btn btn-info"><i class="icon-wrench"></i></a>
          </td> 
         </tr>
        @endforeach
        </tbody>
       </table>
    </div>
    
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     <!-- 分页 -->
     @foreach($pp as $row)
     <a href="javascript:void(0)" onclick="page({{$row}})" class="btn btn-info">{{$row}}</a>
     @endforeach
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
    function page(page){
      // alert(page);
      // 触发Ajax请求
       $.get("/adminuserss",{page:page},function(data){
        // alert(data);
        // 赋值给id值为uid的div(用div包含着table)
        $('#uid').html(data);
      });
    }
 </script>
</html>
@endsection
