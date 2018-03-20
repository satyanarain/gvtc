@extends('users-mgmt.base')
@section('action-content')
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "user_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>     
<?php $session_lan= Session::get('language_val'); ?>   
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.users_log', array(),$session_lan)</h3>
        </div>
          <?php if($getpermissionstatus!=0){?> 
        <div class="col-sm-4" >
<a class="btn btn-primary btn-template" href="{{ route('user-management.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan)</a>
        </div>
          <?php } ?>
    </div>
  </div>
  <!-- /.box-header -->
 @include('partials.message')
   <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">id</th>
                  <th>Username</th>
                  <th>User Type</th>
                  <th>Email</th>
                   <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)    
                <?php if($user->role!=='admin'){?>
                <tr>
                   <td style="display:none">{{ $user['id'] }}</td>
                   <td>{{ucfirst($user->username) }}</td>
                   <td>
                       <?php 
                       if($user->role=='guest'){
                       
                       ?>
                       <small class="label label-warning"><span class="glyphicon glyphicon-user"></span>&nbsp;{{ ucfirst ($user->role)}}</small>
                       <?php }else{ ?>
                       <small class="label label-success"><span class="glyphicon glyphicon-user"></span>&nbsp;{{ ucfirst ($user->role)}}</small>
                       <?php } ?>
                   </td>
                  <td>{{ $user->email }}</td>
                  <td> <?php if($user->status==0){ ?><i class="icon fa fa-ban" style="color:#dd4b39;"></i> In-Active <?php }else{ ?><i class="icon fa fa-check" style="color:green"></i> Active<?php } ?></td>
                  <td>
<form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('user-management.show', ['id' => $user->id]) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a> 
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "user_edit";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
if($getpermissionstatus!=0){?> 
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('user-management.edit', ['id' => $user->id]) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;Edit</a>
<?php userstatus('users',$user['id'],$user['status']); ?> 
<?php } ?>
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "user_permissions";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
if($getpermissionstatus!=0){?> 
 <a  href="{{ url('permission/generate').'/'.$user->id }}" class="btn-dropbox btn  mini blue-stripe"  style="margin-left: 15px;"><span class="glyphicon glyphicon-edit"></span>&nbsp;Permissions</a>
<?php } ?> 
</form>
 </td>
 </tr>
<?php } ?>
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