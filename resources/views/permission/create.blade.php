@extends('permission.base')

@section('action-content')

<?php
$user_id=request()->route('id');
$getAllPermission = getAllPermission($user_id);  
//print_r($getAllPermission);die;

?>
<?php
$user_id=Request::segment(3);
$sql=DB::table('users')->where('id',$user_id)->first();
$username= $sql->username;
//print_r($sql);

?>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">List Of Permission</h3>
              </br></br>
              <div class="pull-right">
<a href="/" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
<p><span style="font-weight:bold;margin-top:10px;font-size:16px;">Permissions For</span> : <span style="color:#006a00;font-size:14px;">{{$username}}</span></p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form role="form" method="POST" action="{{ route('permission.generatesave') }}" enctype="multipart/form-data">
              {{ csrf_field() }}  
              
              
            <div class="box-body">
             
                
                
                
                
                 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="accordion-toggle collapsed">
                        
                        Distribution Records <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}">
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <label class="checkbox-inline"><span class="label_accord">Distribution Records</span><input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="distribution_add" <?php if(in_array('distribution_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_edit" <?php if(in_array('distribution_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_view" <?php if(in_array('distribution_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label> 
                     
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="accordion-toggle collapsed">
                        
                        Manage Masters<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}">
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                <label class="checkbox-inline"><span class="label_accord">Species</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></label>   
                <label class="checkbox-inline"><input type="checkbox" name="action[]" value="species_add" <?php if(in_array('species_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                <label class="checkbox-inline"><input type="checkbox" name="action[]" value="species_edit" <?php if(in_array('species_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                <label class="checkbox-inline"><input type="checkbox" name="action[]" value="species_view" <?php if(in_array('species_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>   
                </div>
                <div class="panel-body">
                <label class="checkbox-inline"><span class="label_accord">Gazetteer</span><input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></label>
                <label class="checkbox-inline"><input type="checkbox" name="action[]" value="gazetteer_add" <?php if(in_array('gazetteer_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                <label class="checkbox-inline"><input type="checkbox" name="action[]" value="gazetteer_edit" <?php if(in_array('gazetteer_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                <label class="checkbox-inline"><input type="checkbox" name="action[]" value="gazetteer_view" <?php if(in_array('gazetteer_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline"><span class="label_accord">Observers</span><input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="observer_add" <?php if(in_array('observer_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observer_edit" <?php if(in_array('observer_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observer_view" <?php if(in_array('observer_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="accordion-toggle collapsed">
                        
                       Manage Tables<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}">
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse custom-panel-body" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <label class="checkbox-inline title_space">Observers</label>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="observer_add" <?php if(in_array('observer_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observer_edit" <?php if(in_array('observer_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observer_view" <?php if(in_array('observer_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                
                <div class="panel-body">
                <label class="checkbox-inline title_space">Taxon</label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="taxon_add" <?php if(in_array('taxon_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="taxon_edit" <?php if(in_array('taxon_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="taxon_view" <?php if(in_array('taxon_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">IUCN Threat Code</label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="IUCNThreatCode_add" <?php if(in_array('IUCNThreatCode_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="IUCNThreatCode_edit" <?php if(in_array('IUCNThreatCode_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="IUCNThreatCode_view" <?php if(in_array('IUCNThreatCode_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">@lang('menu.national_threat_code', array(),Session::get('language_val')) </label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="NationalThreatCode_add" <?php if(in_array('NationalThreatCode_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="NationalThreatCode_edit" <?php if(in_array('NationalThreatCode_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="NationalThreatCode_view" <?php if(in_array('NationalThreatCode_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                
                <div class="panel-body">
                <label class="checkbox-inline title_space">Range</label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="range_add" <?php if(in_array('range_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="range_edit" <?php if(in_array('range_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="range_view" <?php if(in_array('range_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Growth Form </label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="growthform_add" <?php if(in_array('growthform_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="growthform_edit" <?php if(in_array('growthform_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="growthform_view" <?php if(in_array('growthform_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Protected Area</label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="protectedarea_add" <?php if(in_array('protectedarea_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="protectedarea_edit" <?php if(in_array('protectedarea_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="protectedarea_view" <?php if(in_array('protectedarea_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Country</label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="country_add" <?php if(in_array('country_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="country_edit" <?php if(in_array('country_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="country_view" <?php if(in_array('country_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Forest Use</label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="forestuse_add" <?php if(in_array('forestuse_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="forestuse_edit" <?php if(in_array('forestuse_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="forestuse_view" <?php if(in_array('forestuse_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Water Use</label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="wateruse_add" <?php if(in_array('wateruse_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="wateruse_edit" <?php if(in_array('wateruse_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="wateruse_view" <?php if(in_array('wateruse_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Endenism</label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="endenism_add" <?php if(in_array('endenism_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="endenism_edit" <?php if(in_array('endenism_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="endenism_view" <?php if(in_array('endenism_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Admin Unit</label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="adminunit_add" <?php if(in_array('adminunit_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="adminunit_edit" <?php if(in_array('adminunit_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="adminunit_view" <?php if(in_array('adminunit_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Migration</label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="migration_add" <?php if(in_array('migration_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="migration_edit" <?php if(in_array('migration_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="migration_view" <?php if(in_array('migration_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Method</label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="method_add" <?php if(in_array('method_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="method_edit" <?php if(in_array('method_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="method_view" <?php if(in_array('method_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Observation</label>
                <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="observation_add" <?php if(in_array('observation_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observation_edit" <?php if(in_array('observation_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observation_view" <?php if(in_array('observation_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Age Group</label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="agegroup_add" <?php if(in_array('agegroup_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="agegroup_edit" <?php if(in_array('agegroup_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="agegroup_view" <?php if(in_array('agegroup_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Abundance</label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="abundance_add" <?php if(in_array('abundance_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="abundance_edit" <?php if(in_array('abundance_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="abundance_view" <?php if(in_array('abundance_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
                <div class="panel-body">
                <label class="checkbox-inline title_space">Breeding</label>
                 <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="breeding_add" <?php if(in_array('breeding_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="breeding_edit" <?php if(in_array('breeding_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="breeding_view" <?php if(in_array('breeding_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                </div>
            </div>
        </div>
         <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="accordion-toggle collapsed">
                        
                        Manage Users <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}">
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                    <label class="checkbox-inline label_accord">Manage Users<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="user_add" <?php if(in_array('user_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="user_edit" <?php if(in_array('user_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="user_view" <?php if(in_array('user_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label> 
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="user_permissions" <?php if(in_array('user_permissions',$getAllPermission)){echo 'checked="checked"';}?>>Define Permissions</label> 
                     
                </div>
            </div>
        </div>             
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive" class="accordion-toggle collapsed">
                        
                        Reports <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}">
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
                    <label class="checkbox-inline label_accord">Manage Reports<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="download_report" <?php if(in_array('download_report',$getAllPermission)){echo 'checked="checked"';}?>>Download</label>
                   
                     
                </div>
            </div>
        </div>  
                     
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="accordion-toggle collapsed">
                        
                        Offline Records <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}">
                    </a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
            <div class="panel-body">
                    <label class="checkbox-inline label_accord">Manage Offline Records<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="offline_view" <?php if(in_array('offline_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="offline_add" <?php if(in_array('offline_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                   <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="offline_delete" <?php if(in_array('offline_delete',$getAllPermission)){echo 'checked="checked"';}?>>Delete</label>
                   
                     
                </div>
            </div>
        </div>             

    </div><!-- panel-group -->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
<!--              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>@lang('menu.action', array(),Session::get('language_val'))</th>
                </tr>
                </thead>
                <tbody>
                    
                    
                    
                    
                  <tr>
                 <td>Distribution Records <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                    <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="distribution_add" <?php //if(in_array('distribution_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_edit" <?php //if(in_array('distribution_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="distribution_view" <?php //if(in_array('distribution_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
               <tr>
                 <td>Species  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="species_add" <?php //if(in_array('species_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="species_edit" <?php //if(in_array('species_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="species_view" <?php //if(in_array('species_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
               <tr>
                 <td>Gazetteer  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="gazetteer_add" <?php //if(in_array('gazetteer_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="gazetteer_edit" <?php //if(in_array('gazetteer_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="gazetteer_view" <?php //if(in_array('gazetteer_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                 <tr>
                 <td>Observers  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="observer_add" <?php //if(in_array('observer_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observer_edit" <?php //if(in_array('observer_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observer_view" <?php //if(in_array('observer_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>

                <tr>
                 <td>Taxon  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="taxon_add" <?php //if(in_array('taxon_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="taxon_edit" <?php //if(in_array('taxon_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="taxon_view" <?php //if(in_array('taxon_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>IUCN Threat Code  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="IUCNThreatCode_add" <?php //if(in_array('IUCNThreatCode_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="IUCNThreatCode_edit" <?php //if(in_array('IUCNThreatCode_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="IUCNThreatCode_view" <?php //if(in_array('IUCNThreatCode_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Range  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="range_add" <?php //if(in_array('range_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="range_edit" <?php //if(in_array('range_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="range_view" <?php //if(in_array('range_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Growth Form  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="growthform_add" <?php //if(in_array('growthform_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="growthform_edit" <?php //if(in_array('growthform_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="growthform_view" <?php //if(in_array('growthform_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Protected Area  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="protectedarea_add" <?php //if(in_array('protectedarea_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="protectedarea_edit" <?php //if(in_array('protectedarea_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="protectedarea_view" <?php //if(in_array('protectedarea_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Country<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="country_add" <?php //if(in_array('country_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="country_edit" <?php //if(in_array('country_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="country_view" <?php //if(in_array('country_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Forest Use<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="forestuse_add" <?php //if(in_array('forestuse_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="forestuse_edit" <?php //if(in_array('forestuse_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="forestuse_view" <?php //if(in_array('forestuse_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Water Use<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="wateruse_add" <?php //if(in_array('wateruse_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="wateruse_edit" <?php //if(in_array('wateruse_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="wateruse_view" <?php //if(in_array('wateruse_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Endenism<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="endenism_add" <?php //if(in_array('endenism_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="endenism_edit" <?php //if(in_array('endenism_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="endenism_view" <?php //if(in_array('endenism_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Admin Unit  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="adminunit_add" <?php //if(in_array('adminunit_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="adminunit_edit" <?php //if(in_array('adminunit_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="adminunit_view" <?php //if(in_array('adminunit_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Migration  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="migration_add" <?php //if(in_array('migration_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="migration_edit" <?php //if(in_array('migration_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="migration_view" <?php //if(in_array('migration_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Method  <input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="method_add" <?php //if(in_array('method_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="method_edit" <?php //if(in_array('method_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="method_view" <?php //if(in_array('method_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Observation<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="observation_add" <?php //if(in_array('observation_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observation_edit" <?php //if(in_array('observation_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="observation_view" <?php //if(in_array('observation_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Age Group<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="agegroup_add" <?php //if(in_array('agegroup_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="agegroup_edit" <?php //if(in_array('agegroup_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="agegroup_view" <?php //if(in_array('agegroup_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Abundance<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="abundance_add" <?php //if(in_array('abundance_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="abundance_edit" <?php //if(in_array('abundance_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="abundance_view" <?php //if(in_array('abundance_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                <tr>
                 <td>Breeding<input type="hidden"  name="user_id" value="{{ Request::segment(3)}}"></td>
                <td>
                     <label class="checkbox-inline"> <input type="checkbox" name="action[]" value="breeding_add" <?php //if(in_array('breeding_add',$getAllPermission)){echo 'checked="checked"';}?>>Add</label>
                     <label class="checkbox-inline"><input type="checkbox" name="action[]" value="breeding_edit" <?php //if(in_array('breeding_edit',$getAllPermission)){echo 'checked="checked"';}?>>Edit</label>
                    <label class="checkbox-inline"><input type="checkbox" name="action[]" value="breeding_view" <?php //if(in_array('breeding_view',$getAllPermission)){echo 'checked="checked"';}?>>View</label>
                 </td>
                   
                </tr>
                
                
                </tbody>
                
              </table>-->
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
