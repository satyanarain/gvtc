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
                  <th>@lang('menu.action', array(),Session::get('language_val'))</th>
                </tr>
                </thead>
                <tbody>
                    
                

    
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Distribution Records <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}">
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <label class="checkbox-inline" style="margin-right: 50%">Distribution Records</label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="distribution_add" <?php if(in_array('distribution_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_edit" <?php if(in_array('distribution_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_view" <?php if(in_array('distribution_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label> 
                     
                </div>
                <div class="panel-body">
                    <label class="checkbox-inline">Distribution Records</label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="distribution_add" <?php if(in_array('distribution_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_edit" <?php if(in_array('distribution_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_view" <?php if(in_array('distribution_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label> 
                     
                </div>
                <div class="panel-body">
                    <label class="checkbox-inline">Distribution Records</label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="distribution_add" <?php if(in_array('distribution_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_edit" <?php if(in_array('distribution_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_view" <?php if(in_array('distribution_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label> 
                     
                </div>
                <div class="panel-body">
                    <label class="checkbox-inline">Distribution Records</label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="distribution_add" <?php if(in_array('distribution_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_edit" <?php if(in_array('distribution_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_view" <?php if(in_array('distribution_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label> 
                     
                </div>
                <div class="panel-body">
                    <label class="checkbox-inline">Distribution Records</label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="distribution_add" <?php if(in_array('distribution_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_edit" <?php if(in_array('distribution_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_view" <?php if(in_array('distribution_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label> 
                     
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #2
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #3
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>

    </div><!-- panel-group -->
    
    
 
                    
                    
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
                 <td>Country<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="country_add" <?php if(in_array('country_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="country_edit" <?php if(in_array('country_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="country_view" <?php if(in_array('country_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Forest Use<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="forestuse_add" <?php if(in_array('forestuse_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="forestuse_edit" <?php if(in_array('forestuse_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="forestuse_view" <?php if(in_array('forestuse_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Water Use<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="wateruse_add" <?php if(in_array('wateruse_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="wateruse_edit" <?php if(in_array('wateruse_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="wateruse_view" <?php if(in_array('wateruse_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Endenism<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="endenism_add" <?php if(in_array('endenism_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="endenism_edit" <?php if(in_array('endenism_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="endenism_view" <?php if(in_array('endenism_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Admin Unit  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="adminunit_add" <?php if(in_array('adminunit_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="adminunit_edit" <?php if(in_array('adminunit_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="adminunit_view" <?php if(in_array('adminunit_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Migration  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="migration_add" <?php if(in_array('migration_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="migration_edit" <?php if(in_array('migration_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="migration_view" <?php if(in_array('migration_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Method  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="method_add" <?php if(in_array('method_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="method_edit" <?php if(in_array('method_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="method_view" <?php if(in_array('method_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Observation<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="observation_add" <?php if(in_array('observation_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observation_edit" <?php if(in_array('observation_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observation_view" <?php if(in_array('observation_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Age Group<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="agegroup_add" <?php if(in_array('agegroup_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="agegroup_edit" <?php if(in_array('agegroup_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="agegroup_view" <?php if(in_array('agegroup_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Abundance<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="abundance_add" <?php if(in_array('abundance_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="abundance_edit" <?php if(in_array('abundance_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="abundance_view" <?php if(in_array('abundance_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Breeding<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="breeding_add" <?php if(in_array('breeding_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="breeding_edit" <?php if(in_array('breeding_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="breeding_view" <?php if(in_array('breeding_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
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
