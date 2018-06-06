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
           <table class="table table-hover table-bordered table-striped datatable display nowrap"   style="width:100%">
                <thead>
                <tr>
                 <th style="display:none">id</th> 
                 <th>@lang('menu.taxon', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.species', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.method', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.selection_criteria', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.day', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.month', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.year', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.number', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.abundance_group', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.specimen_code', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.collector_institution', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.sex', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.observation', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.age_group', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.place', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.habitat', array(),Session::get('language_val'))</th>
                 <th> @lang('menu.observer', array(),Session::get('language_val'))</th>
                 <th> @lang('menu.remarks', array(),Session::get('language_val'))</th>
                 <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                 
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
  
  <script type="text/javascript">
$(document).ready(function() {
    
    $('.datatable').DataTable({
        "order": [[ 0, "desc" ]],
        "scrollX": true,
          oLanguage: {
        sProcessing: "<img src='../dist/img/gvtc_loader.gif'>"
    },
        processing : true,
        serverSide: true,
        ajax: '{{ route('distribution/getdata') }}',
        "lengthMenu": [[50, 100, 500, 1000, -1], [50, 100, 500, 1000, "All"]],
        "autoWidth"   : true,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'taxon_id', name: 'taxon_id'},
            {data: 'specie_id', name: 'specie_id'},
            {data: 'method_id', name: 'method_id'},
            {data: 'selectioncriteria', name: 'selectioncriteria'},
            {data: 'day', name: 'day'},
            {data: 'month', name: 'month'},
            {data: 'year', name: 'year'},
            {data: 'number', name: 'number'},
            {data: 'abundance_id', name: 'abundance_id'},
            {data: 'specimencode', name: 'specimencode'},
            {data: 'collectorinstitution', name: 'collectorinstitution'},
            {data: 'Sex', name: 'Sex'},
            {data: 'observation_id', name: 'observation_id'},
            {data: 'age_id', name: 'age_id'},
            {data: 'gazetteer_id', name: 'gazetteer_id'},
            {data: 'habitat', name: 'habitat'},
            {data: 'observer_id', name: 'observer_id'},
            {data: 'remark', name: 'remark'},
      {
                mRender: function (data, type, row) {
                    //console.log(row.id);
                      var sd = row.status;
                      var lang = ' <?php echo $lang=Session::get('language_val'); ?>';
                     // alert(lang);
                    //alert(sd);
           
             //return '<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;@lang('menu.delete', array(),Session::get('language_val'))</button>';     
              return '<a   class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;" href="/distribution/'+row.id+'"><i class="fa fa-search"></i>&nbsp; @lang('menu.view', array(),Session::get('language_val'))</a> <?php if($getpermissionstatus!=0){?> <a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;"  data-placement="top" data-toggle="tooltip" data-original-title="Edit" href="/distribution/'+row.id+'/edit"><i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a> <button  onClick="recordDelete(this.id,\'distributions\',\'<?php echo $lang=Session::get('language_val'); ?>\')" class="btn-danger btn  mini blue-stripe" id="'+row.id+'" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;@lang('menu.delete', array(),Session::get('language_val'))</button> <?php } ?> ' ;
          
           
           }}
        
           
        ],
        
  "aoColumnDefs": [
         {
                        
                        "bVisible": false, "aTargets": [0] 
                        
                        },
                        
{

'bSortable' : false,
   'aTargets' : [ 'action', 'text-holder' ]

}
                        
                        
                       
                    ] 
        
        
        
        
        
        
        
        


   
 

    });
      
});
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
