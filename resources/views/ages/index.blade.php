@extends('ages.base')
@section('action-content')
<?php //print_r($forests);die; ?>
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "agegroup_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>      
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Age Group Log</h3>
        </div>
          <?php if($getpermissionstatus!=0){?> 
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('age.create') }}" data-placement="top" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;
@lang('menu.add', array(),Session::get('language_val'))
              </a>
        </div>
          <?php } ?>
    </div>
  </div>
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "agegroup_edit";
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
                  <th>Age Group</th>
                  <th>Code Description</th>
                
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                 
                @foreach($age as $val) 
                <?php //print_r($age); die; ?>
                
                <tr>
                  <td style="display:none">{{ $val['id'] }}</td>  
                  <td>{{ $val['age_group'] }}</td>
                  <td>{{ $val['code_description'] }}</td>
                
                 
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('age.destroy', $val['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('age.show', $val['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
<?php if($getpermissionstatus!=0){?> 
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('age.edit', $val['id']) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;Edit</a>

<!--<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->
<?php testdatas('ages',$val['id'],$val['status']); ?>
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
