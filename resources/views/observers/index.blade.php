@extends('observers.base')
@section('action-content')
<?php $session_lan= Session::get('language_val'); ?> 
    <!-- Main content -->
   <?php  //print_r($observers);die;  ?> 
    <?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "observer_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
//print_r($getpermissionstatus);
?> 
    <section class="content">
      <div class="box">
  <div class="box-header with-border">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.observers', array(),Session::get('language_val')) @lang('menu.log', array(),Session::get('language_val'))</h3>
        </div>
<?php if($getpermissionstatus!=0){?>       
        <div class="col-sm-4" >
 <a class="btn btn-primary btn-template" href="{{ route('observer.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan)</a>
</div>
<?php } ?>
    </div>
  </div>
  <?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "observer_edit";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>         
  <!-- /.box-header -->
    @include('partials.message')
   <!-- /.box-header -->
   
  
            <div class="box-body">
             
               <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                <thead>
                <tr>
                  <th style="display:none">id</th> 
                  <th class="action">@lang('menu.observer_id', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.observer_type', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.first_name', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.last_name', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.institution', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.email', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.mobile_number', array(),Session::get('language_val'))</th>
                  <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                </tr>
                </thead>
                <tbody>
            
              
              
                </tbody>
                
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
        oLanguage: {
        sProcessing: "<img src='../dist/img/gvtc_loader.gif'>"
    },
    processing : true,
        serverSide: true,
        ajax: '{{ route('observer/getdata') }}',
        "autoWidth"   : true,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'observer_id', name: 'observer_id'},
            {data: 'observeroption', name: 'observeroption'},
            {data: 'first_name', name: 'first_name',},
            {data: 'last_name', name: 'last_name'},
            {data: 'institution', name: 'institution'},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {
                mRender: function (data, type, row) {
                    //console.log(row.id);
                      var sd = row.status;
                      var lang = ' <?php echo $lang=Session::get('language_val'); ?>';
                     // alert(lang);
                    //alert(sd);
              if(sd==1){
                  
              return '<a   class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;" href="/observer/'+row.id+'"><i class="fa fa-search"></i>&nbsp; @lang('menu.view', array(),Session::get('language_val'))</a> <?php if($getpermissionstatus!=0){?>  <a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;"  data-placement="top" data-toggle="tooltip" data-original-title="Edit" href="/observer/'+row.id+'/edit"><i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>  <div  id="'+row.id+'"  style="margin-left: 15px;" class="btn btn-small btn-success pull dng-w" onClick="divFunction(this.id,\'observers\',\'<?php echo $lang=Session::get('language_val'); ?>\')"> <span id="ai'+row.id+'"> <i class="fa fa-check-circle"></i>&nbsp;  @lang('menu.active', array(),Session::get('language_val')) </span><?php } ?></div>' ;
          }else{
           return '<a   class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;" href="/observer/'+row.id+'"><i class="fa fa-search"></i>&nbsp; @lang('menu.view', array(),Session::get('language_val'))</a> <?php if($getpermissionstatus!=0){?>  <a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;"  data-placement="top" data-toggle="tooltip" data-original-title="Edit" href="/observer/'+row.id+'/edit"><i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>  <div   id="'+row.id+'"  style="margin-left: 15px;" class="btn btn-small btn-danger dng-w" onClick="divFunction(this.id,\'observers\',\'<?php echo $lang=Session::get('language_val'); ?>\')"> <span id="ai'+row.id+'"> <i class="fa fa-times-circle"></i>&nbsp; <?php if($lang=Session::get('language_val')=='en'){ ?> In-active <?php }else{ ?> en activité <?php } ?> </sapn><?php } ?></div>' ;   
              
              }
           
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
                        
                        
                       
                    ] ,
        
        
        
        
        
        
        
        


   
 

    });
      
});
</script> 
@endsection
