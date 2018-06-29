@extends('abundances.base')
@section('action-content')
<?php //print_r($forests);die; ?>
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "abundance_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>       
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.abundance', array(),Session::get('language_val')) @lang('menu.log', array(),Session::get('language_val')) </h3>
        </div>
        <?php if($getpermissionstatus!=0){?> 
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('abundance.create') }}" data-placement="top" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;
 @lang('menu.add', array(),Session::get('language_val'))
         
              </a>
        </div>
        <?php } ?>
    </div>
  </div>
 <?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "abundance_edit";
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
                  <th><span class="lang-sm" lang="en"></span>&nbsp;@lang('menu.abundance_group', array(),Session::get('language_val'))</th>
                  <th><span class="lang-sm" lang="en"></span>&nbsp;@lang('menu.code_description', array(),Session::get('language_val'))</th>
                  <th><span class="lang-sm" lang="fr"></span>&nbsp;@lang('menu.code_description', array(),Session::get('language_val'))</th>
                
                  <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                 
                </tr>
                </thead>
                <tbody>
                 
                @foreach($abundance as $val) 
                <?php //print_r($abundance); die; ?>
                
                <tr>
                  <td style="display:none">{{ $val['id'] }}</td>  
                  <td>{{ $val['abundance_group'] }}</td>
                  <td>{{ $val['code_description'] }}</td>
                  <td>{{ $val['code_description_fr'] }}</td>
                
                 
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('abundance.destroy', $val['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('abundance.show', $val['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;@lang('menu.view', array(),Session::get('language_val'))</a>                        
<?php if($getpermissionstatus!=0){?> 
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('abundance.edit', $val['id']) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>
 <?php testdatas('abundances',$val['id'],$val['status']); ?> 
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
