@extends("Admin.AdminPublics.public")
@section("title",'后台用户列表')

@section('admin')
<html>
 <head></head>
 <script src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 后台用户列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

    <form action="/adminuser" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索用户名: <input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}" />搜索手机: <input type="text" aria-controls="DataTables_Table_1" name="keywordss" value="{{$request['keywordss'] or ''}}" /></label>
      <input type="submit" value="搜索">
     </div>
      
    </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 142px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">用户名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 174px;">密码</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">邮箱</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">电话</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">创建时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 122px;">修改时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 90px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($users as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->username}}</td> 
        <td class=" ">{{$row->password}}</td> 
        <td class=" ">{{$row->email}}</td> 
        <td class=" ">{{$row->phone}}</td> 
        <td class=" ">{{$row->status}}</td> 
        <td class=" ">{{$row->created_at}}</td> 
        <td class=" ">{{$row->updated_at}}</td> 
        <td class=" ">
          <form action="/adminuser/{{$row->id}}" method="post">
            <button class="btn btn-success">普通删除</button>
            {{method_field('DELETE')}}
            {{csrf_field()}}
          </form>
          <!-- Ajax -->
        <!--   <a href="javascript:viod(0)" class="btn btn-info del">Ajax删除</a> -->
        <a href="/adminuser/{{$row->id}}" class="btn btn-info">会员详情</a>
        <a href="/adminuseraddress/{{$row->id}}" class="btn btn-info">会员收货地址</a>
          <a href="/adminuser/{{$row->id}}/edit" class="btn btn-info"><i class="icon-wrench"></i></a>
        </td> 
       </tr>
       @endforeach
      </tbody>
     </table>
    
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     {{$users->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
    // alert($);
    // 获取删除按钮
    $('.del').click(function(){
      // 获取id
      id=$(this).parents('tr').find("td:first").html();
      s=$(this).parents("tr");
      ss = confirm("确定删除吗?");
      if(ss){
        // alert(id);
        $.get("/adminuserdel",{id:id},function(data){
            // alert(data);
            if(data==1){
              // alert("删除成功");
              // 删除数据所在的tr[页面]
              s.remove();
            }
        });
        
      }
    });
 </script>
</html>
@endsection
