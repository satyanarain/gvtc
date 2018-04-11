<?php //print_r($gazetteer);die; ?>  
 
@extends('gazetteers.base')
@section('action-content')
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "gazetteer_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);

//print_r($getpermissionstatus);
?>     
    <section class="content">
      <div class="box">
  <div class="box-header with-border">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Gazetteer Log</h3>
        </div>
        <?php if($getpermissionstatus!=0){?> 
        <div class="col-sm-4" >
 <a class="btn btn-primary btn-template" href="{{ route('gazetteer.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan= Session::get('language_val'))</a>
</div>
        <?php } ?>
    </div>
  </div>
  <!-- /.box-header -->
    @include('partials.message')
   <!-- /.box-header -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "gazetteer_edit";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?> 
 <div class="box-body">
    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th style="display:none">id</th>  
                                <th class="no-sort">Gazetteer ID</th>
                                <th>Place</th>
                                <th>Datum</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
  
  
</div>
    </section>
    <!-- /.content -->
  </div>
  






<script type="text/javascript">
$(document).ready(function() {
    
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('gazetteer/getdata') }}',
        "autoWidth"   : true,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'gazeteer_id', name: 'gazeteer_id'},
            {data: 'place', name: 'place'},
            {data: 'datum', name: 'datum'},
            {data: 'longitude', name: 'longitude'},
            {data: 'latitude', name: 'latitude'},
            {
                mRender: function (data, type, row) {
                    //console.log(row.id);
                      var sd = row.status;
                    //alert(sd);
                    
                   if(sd==1) 
                   {
               return '<a   class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;" href="/gazetteer/'+row.id+'"><i class="fa fa-search"></i>&nbsp; View</a> <a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;"  data-placement="top" data-toggle="tooltip" data-original-title="Edit" href="/gazetteer/'+row.id+'/edit"><i class="fa fa-pencil"></i>&nbsp;Edit</a>  <div  value="'+row.id+'"  style="margin-left: 15px;" class="btn btn-small btn-success pull customstatus" > <i class="fa fa-check-circle"></i>Active</div>' ;
           }else
           {
             return '<a   class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;" href="/gazetteer/'+row.id+'"><i class="fa fa-search"></i>&nbsp; View</a> <a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;"  data-placement="top" data-toggle="tooltip" data-original-title="Edit" href="/gazetteer/'+row.id+'/edit"><i class="fa fa-pencil"></i>&nbsp;Edit</a>  <div  value="'+row.id+'"  style="margin-left: 15px;" class="btn btn-small btn-danger dng-ww customstatus" > <i class="fa fa-times-circle"></i>In-active</div>' ;  
               }
            
            }}
        
           
        ],
 "columnDefs": [
           
           {
               "targets": [0],
               "visible": false
           }
       ]

   
 

    });
      
});
</script> 



@endsection
   
