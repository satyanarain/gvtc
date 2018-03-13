@extends('permission.base')

@section('action-content')

<?php
$user_id=request()->route('id');
$getAllPermission = getAllPermission($user_id);  
//print_r($getAllPermission);die;

?>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Permission Mangement</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form role="form" method="POST" action="{{ route('permission.generatesave') }}" enctype="multipart/form-data">
              {{ csrf_field() }}  
              
              
            <div class="box-body">
             
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Action</th>
                  
                 
                </tr>
                </thead>
                <tbody>
                  <tr>
                 <td>Distribution Records <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                    <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="distribution_add" <?php if(in_array('distribution_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_edit" <?php if(in_array('distribution_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_view" <?php if(in_array('distribution_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
               <tr>
                 <td>Species  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="species_add" <?php if(in_array('species_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="species_edit" <?php if(in_array('species_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="species_view" <?php if(in_array('species_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
               <tr>
                 <td>Gazetteer  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="gazetteer_add" <?php if(in_array('gazetteer_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="gazetteer_edit" <?php if(in_array('gazetteer_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="gazetteer_view" <?php if(in_array('gazetteer_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                 <tr>
                 <td>Observers  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="observer_add" <?php if(in_array('observer_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observer_edit" <?php if(in_array('observer_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observer_view" <?php if(in_array('observer_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                ------
                <tr>
                 <td>Taxon  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="taxon_add" <?php if(in_array('taxon_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="taxon_edit" <?php if(in_array('taxon_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="taxon_view" <?php if(in_array('taxon_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>IUCN Threat Code  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="IUCNThreatCode_add" <?php if(in_array('IUCNThreatCode_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="IUCNThreatCode_edit" <?php if(in_array('IUCNThreatCode_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="IUCNThreatCode_view" <?php if(in_array('IUCNThreatCode_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Range  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="range_add" <?php if(in_array('range_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="range_edit" <?php if(in_array('range_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="range_view" <?php if(in_array('range_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Growth Form  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="growthform_add" <?php if(in_array('growthform_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="growthform_edit" <?php if(in_array('growthform_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="growthform_view" <?php if(in_array('growthform_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Protected Area  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="protectedarea_add" <?php if(in_array('protectedarea_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="protectedarea_edit" <?php if(in_array('protectedarea_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="protectedarea_view" <?php if(in_array('protectedarea_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Country  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="country_add" <?php if(in_array('country_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="country_edit" <?php if(in_array('country_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="country_view" <?php if(in_array('country_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                
                
                
                
                
                
                
                
                
                
                
                
                </tbody>
                
              </table>
            </div>
            
            
           
                
                 
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">Create</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection
