@extends('observations.base')
@section('action-content')
<?php //print_r($observation);die; ?>
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "observation_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>     
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.observation', array(),Session::get('language_val')) @lang('menu.log', array(),Session::get('language_val'))</h3>
        </div>
         <?php if($getpermissionstatus!=0){?> 
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('observation.create') }}" data-placement="top" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;
@lang('menu.add', array(),Session::get('language_val'))
         
              </a>
        </div>
         <?php } ?>
    </div>
  </div>
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "observation_edit";
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
                  <th><span class="lang-sm" lang="en"></span>&nbsp;@lang('menu.observation_code', array(),Session::get('language_val'))</th>
                  <th><span class="lang-sm" lang="en"></span>&nbsp;@lang('menu.code_description', array(),Session::get('language_val')) </th>
                  <th><span class="lang-sm" lang="fr"></span>&nbsp;@lang('menu.code_description', array(),Session::get('language_val')) </th>
                
                  <th>@lang('menu.action', array(),Session::get('language_val'))</th>
                 
                </tr>
                </thead>
                <tbody>
                 
                @foreach($observation as $observations) 
                <?php //print_r($observations); die; ?>
                
                <tr>
                  <td style="display:none">{{ $observations['id'] }}</td>  
                  <td>{{ $observations['observation_code'] }}</td>
                  <td>{{ $observations['code_description'] }}</td>
                  <td>{{ $observations['code_description_fr'] }}</td>
                
                 
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('observation.destroy', $observations['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('observation.show', $observations['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;@lang('menu.view', array(),Session::get('language_val'))</a>                        
 <?php if($getpermissionstatus!=0){?> 
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('observation.edit', $observations['id']) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>
<?php testdatas('observation',$observations['id'],$observations['status']); ?>
 <?php } ?>
<!--<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->
                        
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
