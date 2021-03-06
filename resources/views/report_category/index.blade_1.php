@extends('report_category.base')
@section('action-content')
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
          <h3 class="box-title">Report Category Log</h3>
        </div>
<?php if($getpermissionstatus!=0){?>        
<div class="col-sm-4" >
 <a class="btn btn-primary btn-template" href="{{ route('reportcategory.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan)</a>
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
             
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                  <th style="display:none">id</th> 
                  <th>@lang('menu.title', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.description', array(),Session::get('language_val'))</th>
                  <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                 
                </tr>
                </thead>
                <tbody id="tablecontents">
                    
                @foreach($rcategory as $val) 
                
                
                <tr data-id="{{ $val['id'] }}" class="row1">
                    <td>
                        <div style="color:rgb(124,77,255); padding-left: 10px; float: left; font-size: 20px; cursor: pointer;" title="change display order">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                        </div>
                      </td>
                   <td style="display:none">{{ $val['id'] }}</td>
                  <td>{{ $val['title'] }}</td>
                  <td>{{ $val['description'] }}</td>
                  <td>
                   
                   <form class="row" method="POST" action="{{ route('taxons.destroy', $val['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('reportcategory.show', $val['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;@lang('menu.view', array(),Session::get('language_val'))</a>                        
 <?php if($getpermissionstatus!=0){?> 
<a href="{{ route('reportcategory.edit', $val['id']) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
<i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>
<?php testdatas('report_categories',$val['id'],$val['status']); ?>
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

  
  


<!--   jQuery UI 
  <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
 
   Datatables Js
  <script type="text/javascript" src="//cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>-->

  <script type="text/javascript">
  $(function () {
  $("#table").DataTable();

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
        ajax: '{{ route('reportcategory/sortabledatatable') }}',
        //data: $(this).serializeArray(),
        //contentType: "application/json",
        
        
        success: function(response) {
            
            alert(response);
//            if (response.status == "success") {
//              console.log(response);
//            } else {
//              console.log(response);
//            }
        }
      });

    }
  });

</script>

@endsection


