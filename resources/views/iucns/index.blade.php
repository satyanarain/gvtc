@extends('iucns.base')
@section('action-content')
<?php $session_lan= Session::get('language_val'); ?> 
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "IUCNThreatCode_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);

//print_r($getpermissionstatus);
?>       
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">IUCN Threat Code Log</h3>
        </div>
        <?php if($getpermissionstatus!=0){?>
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('iucns.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan)</a>
        </div>
        <?php } ?>
    </div>
  </div>
 <?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "IUCNThreatCode_edit";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>         
  <!-- /.box-header -->
 
   <!-- /.box-header -->
   @include('partials.message')
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">id</th>  
                  <th>IUCN Threat Code</th>
                  <th>IUCN Code Description</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                  
                @foreach($iucns as $iucn) 
                
                <tr>
                  <td style="display:none">{{ $iucn['id'] }}</td>  
                  <td>{{ $iucn['iucn_threat_code'] }}</td>
                  <td>{{ $iucn['iucn_code_description'] }}</td>
                 
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('iucns.destroy', $iucn['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <a href="{{ route('iucns.show', $iucn['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
                        <?php if($getpermissionstatus!=0){?>
                        <a href="{{ route('iucns.edit', $iucn['id']) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
<i class="fa fa-pencil"></i>&nbsp;Edit</a>
                        <?php } ?>
  <?php testdatas('iucn_threats',$iucn['id'],$iucn['status']); ?>                      
<!--                        <button type="submit" class="btn btn-google mini blue-stripe" id="id_of_your_button" style="margin-left: 20px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->
                       
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
