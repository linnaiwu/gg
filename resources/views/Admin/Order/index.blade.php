@extends("Admin.AdminPublics.public")
@section("title",'后台订单列表')

@section('admin') 
<html>
 <head></head>
 <script src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 后台订单列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

    <form action="/adminorderlist" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索订单号: <input type="text" aria-controls="DataTables_Table_1" name="orderid" value="" /></label>
      <input type="submit" value="搜索">
     </div>
      
    </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"  aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;">订单号</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">用户</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">收货人</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">收货人电话</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 174px;">收货地址</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 100px;">总金额</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 100px;">状态</th>
        <th  style="width: 150px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($order as $v)    
       <tr class="odd"> 
        <td class="  sorting_1">{{$v->id}}</td> 
        <td class=" ">{{$v->oid}}</td> 
        <td class=" ">{{$v->username}}</td> 
        <td class=" ">{{$v->aname}}</td>
        <td class=" ">{{$v->phone}}</td>
        <td class=" ">{{$v->address}}</td>
        <td class=" ">{{$v->total}}</td> 
        <td class=" ">

        @if($v->status==1)
        <a href="/adminorderstatus/{{$v->id}}" class="btn btn-danger">{{$status[$v->status]}}</a>
        @elseif($v->status==2)
        {{$status[$v->status]}}
        @elseif($v->status==3)
        {{$status[$v->status]}}
        @elseif($v->status==0)
        {{$status[$v->status]}}
        @elseif($v->status==4)
        <a href="/adminorderstatus/{{$v->id}}" class="btn btn-danger">{{$status[$v->status]}}</a>
        @elseif($v->status==5)
        {{$status[$v->status]}}</a>
        @endif
        </td>
        <td class=" " align="center">
          <a href="adminorderlist/{{$v->id}}" class="btn btn-info">详情</a>
        </td> 
       </tr>
       @endforeach

      </tbody>
     </table>
    
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      {{$order->appends($orderid)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
