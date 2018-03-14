@extends('ranges.base')
@section('action-content')
    <!-- Main content -->
 <?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "range_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);

//print_r($getpermissionstatus);
?>    
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Range Log</h3>
        </div>
        <?php if($getpermissionstatus!=0){?>
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('ranges.create') }}" data-placement="top" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;
 @lang('menu.add', array(),Session::get('language_val'))
         
              </a>
        </div>
        <?php } ?>
    </div>
  </div>
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "range_edit";
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
                  <th>Range</th>
                  <th>Range Code Description</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                 
                @foreach($ranges as $range) 
                
                <tr>
                  <td style="display:none">{{ $range['id'] }}</td>  
                  <td>{{ $range['range_code'] }}</td>
                  <td>{{ $range['range_within_the_albertine_rift'] }}</td>
                 
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('ranges.destroy', $range['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('ranges.show', $range['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
<?php if($getpermissionstatus!=0){?>
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('ranges.edit', $range['id']) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;Edit</a>
<?php } ?>
<!--<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->
<?php testdatas('ranges',$range['id'],$range['status']); ?>                         
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
