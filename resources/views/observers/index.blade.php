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
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Observers Log</h3>
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
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">id</th> 
                  <th class="action">Observer ID</th>
                  <th>Observer Type</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                </tr>
                </thead>
                <tbody>
                @foreach($observers as $val) 
                <tr>
                   <td style="display:none">{{ $val['id'] }}</td>
                  <td>{{ $val['observer_id'] }}</td>
                  <td>{{ $val['observeroption'] }}</td>
                  <td>{{ $val['first_name'] }}</td>
                  <td>{{ $val['last_name'] }}</td>
                  <td>{{ $val['email'] }}</td>
                  <td>{{ $val['mobile'] }}</td>
              <td>
 <form class="row" method="POST" action="{{ route('observer.destroy', $val['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('observer.show', $val['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;@lang('menu.view', array(),Session::get('language_val'))</a>                        
<?php if($getpermissionstatus!=0){?>
<a href="{{ route('observer.edit', $val['id']) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
<i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>
<?php testdatas('observers',$val['id'],$val['status']); ?>    
<?php } ?>
<!--<button type="submit" class="btn btn-google mini blue-stripe" id="id_of_your_button" style="margin-left: 20px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->
                    
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
