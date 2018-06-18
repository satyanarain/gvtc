@extends('distributions.base')
@section('action-content')
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
                    <th>@lang('menu.taxon', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.species', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.method', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.observation', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.place', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.selection_criteria', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.day', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.month', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.year', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.number', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.observer', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.age_group', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.abundance_group', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.specimen_code', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.collector_institution', array(),Session::get('language_val'))</th>
                   <th>@lang('menu.sex', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.remarks', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.habitat', array(),Session::get('language_val'))</th>
                    <th class="action">Action</th>
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
  <script type="text/javascript" language="javascript" >
$(document).ready(function() {
    var token = window.Laravel.csrfToken;
    //alert(token);
    var dataTable = $('#employee-grid').DataTable( {
         "order": [[ 0, "desc" ]],
         "aoColumnDefs": [
        {
        'bSortable' : false,
        'aTargets' : [ 'action', 'text-holder' ]
    } ] ,
        oLanguage: {
        sProcessing: "<img  src='../dist/img/gvtc_loader.gif' style='z-index:9999 !important; position: absolute;'>"
        },
        processing : true, 
        "scrollX": true,
        "destroy":true,
        "serverSide": true,
        //"lengthMenu": [[50, 100, 500, 1000, -1], [50, 100, 500, 1000, "All"]],
        dom: 'lBfrtip',        
        "ajax":{
               // url :"/data.php", // json datasource
               url :"{{ route('distribution/getdata') }}", // json datasource
               //route('distribution/getdata'),
                //url :"passes/searchdata", // json datasource
                type: "POST",  // method  , by default get
                data:{'_token':token},
                error: function(){  // error handling
                        $(".employee-grid-error").html("");
                        $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="4">No data found in the server</th></tr></tbody>');
                        $("#employee-grid_processing").css("display","none");

                }
        }
} ).clear();
    
} );
</script>
<script>
 function recordDelete(id,tablename,lang)
 {
   var r = confirm("Are you sure want to Delete?");
if (r == true) {  
   //alert(id);  
   //alert(tablename);  
   //alert(lang); 
   $.ajax({
   type:'get',
   url:'/distribution/recordDelete/'+id,
   data:"tablename="+tablename,
     
        });  
 }
 location.reload(); 
 }
</script>
@endsection
