@extends('offline.base')
@section('action-content')
<?php $session_lan= Session::get('language_val'); 


?> 
    <!-- Main content -->
<?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "taxon_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);


?>   
    <section class="content">
      <div class="box">
          <div class="box-header" style="width:50%">
    <div class="row">
        <div class="col-sm-12">
          <h3 class="box-title">Offline Record Log</h3>
    

          
        </div>
       

 
    </div>
  </div>
  <!-- /.box-header -->
    @include('partials.message')
   <!-- /.box-header -->
   <?php
$user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "offline_delete";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
?>
  <form role="form" method="POST" action="{{ route('offlinerecord.bulk') }}" enctype="multipart/form-data" onsubmit = "return confirm('Are you sure?')">
    {!! csrf_field() !!}
    

    
    <div class="pull-right" style="margin-right: 10px;margin-top:-52px;">
     <?php
      $sql=DB::table('distributions_offline')->get();
      $record=count($sql);
      if($getpermissionstatus!=0){
     ?>
        
    <button type="submit" class="btn btn-danger dng-w btn-show" name="delete" value="delete" style="display:none"  id="bulk-delete"><i class="fa fa-times-circle"></i> Delete</button>&nbsp;
    
    <button type="button" class="btn btn-danger dng-w default-btn" style="cursor: default;opacity: 0.6;" name="default-btn" value="delete"  id="bulk-delete"><i class="fa fa-times-circle"></i> Delete</button>&nbsp;
    <?php } 
    $user_id=Auth::id();
$role=Auth::user()->role;
$permission_key = "offline_add";
$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
   if($getpermissionstatus!=0){ 
    ?>
    <button type="submit" class="btn btn-primary btn-show" style="background-color: #1b6b36 !important;border-color: #00a65a; display:none"  name="add" value="add"  id="bulk-submit"> <span class="glyphicon glyphicon-plus" title="Add">Add</button>
    
    <button type="button" class="btn btn-primary default-btn" style="background-color: #1b6b36 !important;border-color: #00a65a; cursor: default;opacity: 0.6;" name="default-btn1" value="add1"  id="bulksubmitdefault"> <span class="glyphicon glyphicon-plus" title="Add">Add</button>
    <?php } ?>
    </div>
   <div class="box-body">
     <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    
                    <td>
                     <?php if($record > 0){ ?>   
                    <input name="delete" type="checkbox" id="selectall" class="checked"  />
                    <?php } ?>
                    
                    </td>  
                  
                  <th>Taxon</th>
                  <th>Species</th>
                  <th>Selection Criteria</th>
                  <th>Method</th>
                  <th>Place</th>
                  <th>Observer</th>
                  <th>Day Month Year</th>
                  <th>Number</th>
                  <th>Age Group</th>
                  <th>Abundance</th>
                  <th>Specimen Code</th>
                  <th>Collector Institution</th>
                  <th>Sex</th>
                  <th>Remarks</th>
<!--                  <th>Action</th>-->
                 
                </tr>
                </thead>
                <tbody>
                  
                @foreach($offline as $val) 
                <?php 
                //print_r($val);
                //echo $val->Sex;
               // die;
                
                ?>
                
                <tr>
                   <td><input type="checkbox" onClick="checkbox_is_checked()" name="id[]" value="{{$val->id}}" class="check-all"></td> 
                   
                  <td>{{ $val->taxon_code }}</td>
                  <td><?php echo $val->species; ?></td>
                  <td><?php echo $val->selectioncriteria; ?></td>
                  <td><?php echo $val->method_code; ?> <?php echo $val->code_description; ?></td>
                  <td><?php echo $val->place; ?></td>
                  <td><?php echo $val->observer_id; ?></td>
                  <td><?php echo $val->day; ?><?php echo $val->month; ?><?php echo $val->year; ?></td>
                  <td><?php echo $val->number; ?></td>
                  <td><?php echo $val->age_id; ?></td>
                  <td><?php echo $val->abundance_id; ?></td>
                  <td><?php echo $val->specimencode; ?></td>
                  <td><?php echo $val->collectorinstitution; ?></td>
                  <td><?php echo $val->Sex; ?></td>
                  <td><?php echo $val->remark; ?></td>
                  

                   
 </form>                     
</td>
</tr>
               
              @endforeach
             
            </tbody>
                
              </table>
                
                
                
                
          <div class="form-group col-md-6">
             <input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
            </div>         
                
                

   
   
                
                
                
            </div>
            <!-- /.box-body -->
   </form>
  
  
  
  
  

  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
 
  @endsection


