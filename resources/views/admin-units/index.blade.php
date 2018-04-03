@extends('admin-units.base')
@section('action-content')
<?php 
//echo'<pre>';
//print_r($adminunits); die; ?>
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "adminunit_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>     
    <section class="content">
      <div class="box">
  <div class="box-header with-border">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.admin_unit', array(),Session::get('language_val')) @lang('menu.log', array(),Session::get('language_val'))</h3>
        </div>
        <?php if($getpermissionstatus!=0){?> 
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('admin-unit.create') }}" data-placement="top" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;
 @lang('menu.add', array(),Session::get('language_val'))
         
              </a>
        </div>
        <?php } ?>
    </div>
  </div>
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "adminunit_edit";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>         
  <!-- /.box-header -->
  @include('partials.message')
   <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">id</th>  
                  <th>@lang('menu.admin_unit', array(),Session::get('language_val')) @lang('menu.name', array(),Session::get('language_val'))</th>
                  <th>@lang('menu.country', array(),Session::get('language_val'))</th>
                 <th>@lang('menu.admin_unit_type', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.action', array(),Session::get('language_val'))</th>
                 
                </tr>
                </thead>
                <tbody>
                 
                @foreach($adminunits as $adminunit) 
                
                
                <tr>
                  <td style="display:none">{{ $adminunit->id }}</td>  
                  <td>{{ $adminunit->name  }}</td>
                  <td>{{ $adminunit->range_within_albertine_rift}}({{ $adminunit->range_code }})</td>
                
                  <td>{{ $adminunit->admincode }}</td>
                
                 <?php //print_r($endenism); die; ?>
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('admin-unit.destroy', $adminunit->id) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('admin-unit.show', $adminunit->id) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;@lang('menu.view', array(),Session::get('language_val'))</a>                        
<?php if($getpermissionstatus!=0){?> 
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('admin-unit.edit', $adminunit->id) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>
<!--<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->
<?php testdatas('adminunits',$adminunit->id,$adminunit->status); ?> 
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
