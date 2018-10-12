   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
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
    
    
     </div>
