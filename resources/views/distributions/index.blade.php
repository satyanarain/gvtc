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
        "scrollX": true,
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
          

      
                <table id="employee-grid" class="table table-hover table-bordered table-striped datatable display nowrap"   style="width:100%">
            <thead>
                <tr>
                    <th>Taxon</th>
                    <th>Species</th>
                    <th>Method</th>
                    <th>Observation</th>
                    <th>Place</th>
                    <th>Selection criteria</th>
                    <th>Day</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Number</th>
                    <th>Observer</th>
                    <th>Age Group</th>
                    <th>Abundance Group</th>
                    <th>Specimen Code</th>
                    <th>Collector Institution</th>
                   <th>Sex</th>
                    <th>Remarks</th>
                    <th>Habitat</th>
                    <th>Action</th>
                </tr>
            </thead> 
            </table>
        
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
