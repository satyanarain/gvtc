@extends('users-mgmt.base')
@section('action-content')
    <!-- Main content -->
<?php $session_lan= Session::get('language_val'); ?>   
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.users_log', array(),$session_lan)</h3>
        </div>
        <div class="col-sm-4" >

          <a class="btn btn-primary btn-template" href="{{ route('user-management.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan)</a>
        </div>
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
                <tr>
                   <td style="display:none">{{ $user['id'] }}</td>
                   <td>{{ $user->username }}</td>
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
                  <td><div class="<?php if($user->status==0){ echo "inactive_record";}else{ echo "active_record"; } ?>"></div></td>
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        
                    
                <a href="{{ route('user-management.show', ['id' => $user->id]) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a> 
                
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('user-management.edit', ['id' => $user->id]) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;Edit</a>
   @if ($user->name != Auth::user()->name)
<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;Active</button>        
 @else
 
 <a  href="#" class="btn-danger btn"  style="margin-left: 15px; opacity: 0.5;filter: alpha(opacity=50);  cursor: default;"><i class="fa fa-trash"></i>&nbsp;Inactive</a>
 @endif 
 <a  href="#" class="btn-success btn  mini blue-stripe"  style="margin-left: 15px;"><span class="glyphicon glyphicon-edit"></span>&nbsp;Define Permissions</a>
                       
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