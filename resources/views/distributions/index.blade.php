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
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.distribution_record_log', array(),$session_lan= Session::get('language_val'))</h3>
        </div>
<?php if($getpermissionstatus!=0){?>
<div class="col-sm-4">
 <a class="btn btn-primary btn-template" href="{{ route('distribution.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan= Session::get('language_val'))</a>
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
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th style="display:none">id</th> 
                 <th>@lang('menu.taxon', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.species', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.selection_criteria', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.method', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.place', array(),Session::get('language_val'))</th>
                 <th>@lang('menu.observer', array(),Session::get('language_val'))</th>
                 <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                 
                </tr>
                </thead>
                <tbody>
                
                @foreach($distribution as $val) 
               <td style="display:none"><?php echo $val->id; ?></td>
                   <td><?php echo $val->taxon_code; ?></td>
                   <td><?php if($val->common_name!=''){echo $val->common_name;}else{ ?>/<?php echo $val->genus; ?> / <?php echo $val->species; ?> / <?php echo $val->subspecies; ?><?php } ?></td>
                  <td><?php echo $val->selectioncriteria; ?></td>
                  <td><?php echo $val->code_description ; ?>/<?php echo $val->method_code; ?></td>
                  <td><?php echo $val->place; ?></td>
                  <td><?php echo $val->first_name; ?> <?php echo $val->last_name; ?> <?php echo $val->institution; ?> </td>
                  
                 

                 
                  <td>
                   
                   <form class="row" method="POST" action="{{ route('distribution.destroy', $val->id) }}" onsubmit = "return confirm('Are you sure?')">
                       <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('distribution.show', $val->id) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;@lang('menu.view', array(),Session::get('language_val'))</a>                        
<?php if($getpermissionstatus!=0){?>
<a href="{{ route('distribution.edit', $val->id) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
<i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>
<span style="display:none;"><?php testdatas('distributions',$val->id,$val->status); ?> </span>
<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;@lang('menu.delete', array(),Session::get('language_val'))</button>
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
@endsection
