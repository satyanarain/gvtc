@extends('searchresult.base')
@section('action-content')
<?php $session_lan= Session::get('language_val'); ?> 
    <!-- Main content -->
<?php
//$user_id=Auth::id();
//$role=Auth::user()->role;
//$permission_key = "taxon_add";
//$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);

//print_r($getpermissionstatus);
 
?>   
    <section class="content">
      <div class="box">
  <div class="box-header with-border">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.searchrequest', array(),Session::get('language_val')) </h3>
        </div>
      
<div class="col-sm-4" >
<!-- <a class="btn btn-primary btn-template" href="fgdf"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan)</a>-->
</div>
 
    </div>
  </div>
  <!-- /.box-header -->
    @include('partials.message')
   <!-- /.box-header -->
   <?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "searchresult_edit";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);

?>
  
            <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">id</th> 
                  <th>&nbsp;@lang('menu.username', array(),Session::get('language_val'))</th>
                  <th>&nbsp;Search Date</th>
                  <th>&nbsp;Search Criteria</th>
                  <?php if($getpermissionstatus!=0){?>
                  <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                 <?php } ?> 
                </tr>
                </thead>
                <tbody>
                    
                @foreach($searchresult as $val) 
                <?php
                $datadate=explode(" ",$val['created_at']);
                $searchdatak=explode("=",$val['serchurl']);
                $exdate=explode('-',$datadate[0]);
                $currentdate= $exdate[2].'-'.$exdate[1].'-'.$exdate[0];
                ?>
                <tr>
                   <td style="display:none">{{ $val['id'] }}</td>
                   <td>{{ $val['username'] }}</td>
                   <td>{{ $currentdate }}</td>
                    <td>{{ rtrim($searchdatak[2],"%20") }} </td>
            <?php if($getpermissionstatus!=0){?>
                  <td>
               



<!--<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->

<a href="{{ route('searchresult.edit', $val['uesrid']) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe"   data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i>&nbsp;@lang('menu.view', array(),Session::get('language_val'))</a>
    <?php if($val['adminaprovel']==1){ ?>
    
<a href="#" style="margin-left: 15px;" class="btn btn-small btn-success pull" data-placement="top" data-toggle="tooltip" data-original-title=""><i class="fa fa-check-circle"></i>&nbsp;Approved</a>    
    <?php }else{ ?>
<a href="#" style="margin-left: 15px;width: 95px;" class="btn btn-small btn-danger" data-placement="top" data-toggle="tooltip" data-original-title=""><i class="fa fa-times-circle"></i>&nbsp;Pending</a>
    <?php } ?> 
</td>
<?php } ?>  
</tr>
                   
                    </form
                          

               
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


