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
 <a class="btn btn-primary btn-template" href="{{ route('gazetteer.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),Session::get('language_val'))</a>
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
                                <th class="action">@lang('menu.gazetteer_id', array(),$session_lan= Session::get('language_val'))</th>
                                <th>@lang('menu.place', array(),$session_lan= Session::get('language_val'))</th>
                                <th>@lang('menu.datum', array(),$session_lan= Session::get('language_val'))</th>
                                <th>@lang('menu.longitude', array(),$session_lan= Session::get('language_val'))</th>
                                <th>@lang('menu.latitude', array(),$session_lan= Session::get('language_val'))</th>
                                <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                            </tr>
                        </thead>
                    </table>
  
  
</div>
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
                      var lang = ' <?php echo $lang=Session::get('language_val'); ?>';
                     // alert(lang);
                    //alert(sd);
              if(sd==1){
                  
              return '<a   class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;" href="/gazetteer/'+row.id+'"><i class="fa fa-search"></i>&nbsp; @lang('menu.view', array(),Session::get('language_val'))</a><?php if($getpermissionstatus!=0){?> <a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;"  data-placement="top" data-toggle="tooltip" data-original-title="Edit" href="/gazetteer/'+row.id+'/edit"><i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>  <div  id="'+row.id+'"  style="margin-left: 15px;" class="btn btn-small btn-success pull dng-w" onClick="divFunction(this.id,\'gazetteers\',\'<?php echo $lang=Session::get('language_val'); ?>\')"> <span id="ai'+row.id+'"> <i class="fa fa-check-circle"></i>&nbsp;  @lang('menu.active', array(),Session::get('language_val')) </span><?php } ?></div>' ;
          }else{
           return '<a   class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;" href="/gazetteer/'+row.id+'"><i class="fa fa-search"></i>&nbsp; @lang('menu.view', array(),Session::get('language_val'))</a> <?php if($getpermissionstatus!=0){?><a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;"  data-placement="top" data-toggle="tooltip" data-original-title="Edit" href="/gazetteer/'+row.id+'/edit"><i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>  <div   id="'+row.id+'"  style="margin-left: 15px;" class="btn btn-small btn-danger dng-w" onClick="divFunction(this.id,\'gazetteers\',\'<?php echo $lang=Session::get('language_val'); ?>\')"> <span id="ai'+row.id+'"> <i class="fa fa-times-circle"></i>&nbsp; <?php if($lang=Session::get('language_val')=='en'){ ?> In-active <?php }else{ ?> en activité <?php } ?> </sapn><?php } ?></div>' ;   
              
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
   
