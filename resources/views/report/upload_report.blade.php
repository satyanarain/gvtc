@extends('report.breadcrumb.bred')
@section('action-content')
<?php //print_r($reportresult);die; ?>
<?php $session_lan= Session::get('language_val'); ?> 
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "taxon_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);

//print_r($getpermissionstatus);
?>   
    <section class="content">
      <div class="box">
  <div class="box-header with-border">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Report Log</h3>
        </div>
<?php if($getpermissionstatus!=0){?>        
<div class="col-sm-4" >
 <a class="btn btn-primary btn-template" href="{{ route('report.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan)</a>
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
$permission_key = "taxon_edit";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>
  
            <div class="box-body">
             
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>  
                  <th style="display:none">id</th> 
                  <th>Report Title</th>
                  <th>Report Category</th>
                  <th>Report Created Date</th>
                  <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                 
                </tr>
                </thead>
                <tbody id="tablecontents">
                 <?php 
                 //echo '<pre>';
                // print_r($reportresult);
                 ?>   
                @foreach($reportresult as $val) 
               
                <tr data-id="{{ $val->id }}" class="row1">
                  <td>
                    <div style="color:#00a65a; padding-left: 10px; float: left; font-size: 20px; cursor: pointer;" title="change display order">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                    </div>
                  </td>  
                  <td style="display:none">{{ $val->id }}</td>
                  <td>{{ $val->report_title }}</td>
                  <td>{{ $val->title }}</td>
                  <td>
                  <?php 
                  $createdval=$val->created_at;
                  $createdarra=explode(' ',$createdval);
                  $dateInput = $createdarra[0];
                  $date=explode('-',$dateInput);
                  //print_r($date);
                  echo $combdate=$date[2].'-'.$date[1].'-'.$date[0];
                  //print_r($date);
                  
                  ?></td>
                  <td>
                   
                   <form class="row" method="POST" action="{{ route('report.destroy', $val->id) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('report.show', $val->id) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;@lang('menu.view', array(),Session::get('language_val'))</a>                        
 <?php if($getpermissionstatus!=0){?> 
<a href="{{ route('report.edit', $val->id) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
<i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>
<?php testdatas('report',$val->id,$val->status); ?>
<a href="{{ asset("report_document/$val->uploded_report") }}" style="margin-left: 15px;" class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip"  onClick="openTab(this)"  target="_blank"><i class="glyphicon glyphicon-download-alt">&nbsp;Download</i></a>
<?php } ?>
                   
 </form>                     
</td>
</tr>
               
              @endforeach
             
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
  $(function () {
      
    //$("#example3").DataTable();

    $( "#tablecontents" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });

    function sendOrderToServer() {

      var order = [];
      $('tr.row1').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index+1
        });
      });

      $.ajax({
        type: "POST", 
        dataType: "json", 
         url: "{{ route('report/sortabledatatable') }}",
        data: {
          order:order,
          _token: '{{csrf_token()}}'
        },
        success: function(response) {
       
            if (response.status == "success") {
              console.log(response);
            } else {
              console.log(response);
            }
        }
      });

    }
  });

</script>
<script>
  $(function () {
    $('#example3').DataTable({  
      "paging"      : true,
      "lengthChange": true,
      "searching"   : true,
    
      "order"       : [],
      "info"       : true,
      "autoWidth"   : false,
       "aoColumnDefs" : [
 {
   'bSortable' : false,
   'aTargets' : [ 'action', 'text-holder' ]
 }]
 
 
 
})
  })
</script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  @endsection


