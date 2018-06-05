@extends('distributions.base')
@section('action-content')
<script type="text/javascript" language="javascript" >
$(document).ready(function() {
var dataTable = $('#employee-grid').DataTable( {
        //"sprocessing": '<img src="{{ asset("/adminlte/img/bus_loader.gif") }}">',
        oLanguage: {
        sProcessing: "<img src='{{ asset('/adminlte/img/bus_loader.gif') }}'>"
        },
        processing : true, 
        "serverSide": true,
        dom: 'lBfrtip',
        buttons: [
             'csv', 'excel', 'pdf','colvis'
        ],
               
        "ajax":{
                url :"/data.php", // json datasource
                //url :"passes/searchdata", // json datasource
                type: "POST",  // method  , by default get
                error: function(){  // error handling
                        $(".employee-grid-error").html("");
                        $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="4">No data found in the server</th></tr></tbody>');
                        $("#employee-grid_processing").css("display","none");

                }
        }
} );
} );
</script>
<!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "distribution_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);

//print_r($getpermissionstatus);
?>
    <section class="content">
      <div class="box">
  <div class="box-header with-border">
    <div class="row">
        <div class="col-sm-7">
          <h3 class="box-title">@lang('menu.distribution_record_log', array(),$session_lan= Session::get('language_val'))</h3>
        </div>
<?php if($getpermissionstatus!=0){?>
<div class="col-sm-5">
<a class="btn btn-primary btn-template" style="margin-left: 10px;" href="{{ route('distribution.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan= Session::get('language_val'))</a>
<a class="btn btn-primary btn-template" href="{{ route('distribution.bulkupload') }}"><span class="glyphicon glyphicon-plus" title="Upload"></span>&nbsp;@lang('menu.bulk_upload', array(),$session_lan= Session::get('language_val'))</a>
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
$permission_key = "distribution_edit";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>
  
            <div class="box-body">
           <div class="panel panel-default">
        <div class="panel-heading">
            <span style=" font-size: 20px; font-weight: bold"> List of Card Inventory  </span>
        </div>
        <div class="panel-body table-responsive">
            <table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" style="font-size: 13px;" width="100%">
            <thead>
                <tr>
                    <th>taxon_id</th>
                    <th>specie_id</th>
                    <th>specie_data</th>
                    <th>method_id</th>
                    <th>day</th>
                    <th>Action</th>
                </tr>
            </thead> 
            </table>
        </div>
        
    </div>
            </div>
            <!-- /.box-body -->
  
  
  
  
  
  

  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
  
  


  
  


<script src="{{ asset ('js/jquery.js') }}"></script>
<script src="{{ asset ('js/jquery.dataTables.js') }}"></script>  
  
  
  
  
  
  
  
  
@endsection
