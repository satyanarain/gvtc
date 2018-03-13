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
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Distribution Record Log</h3>
        </div>
<?php if($getpermissionstatus!=0){?>
<div class="col-sm-4" >
 <a class="btn btn-primary btn-template" href="{{ route('distribution.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan= Session::get('language_val'))</a>
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
                  <th>Taxon</th>
                  <th>Species</th>
                  <th>Selection Criteria</th>
                  <th>Method</th>
                  <th>Place</th>
                 <th>Observer</th>
                  <th>Action</th>
                 
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
                   
                   <form class="row" method="POST" action="{{ route('species.destroy', $val->id) }}" onsubmit = "return confirm('Are you sure?')">
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('distribution.show', $val->id) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
<?php if($getpermissionstatus!=0){?>
<a href="{{ route('distribution.edit', $val->id) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
<i class="fa fa-pencil"></i>&nbsp;Edit</a>
<?php } ?>
<?php testdatas('distributions',$val->id,$val->status); ?> 
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
