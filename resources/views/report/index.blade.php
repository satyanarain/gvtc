@extends('report.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
        
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title ">View Reports</h3>
        </div>
        <div class="col-sm-4" >
   <div class="columns columns-right btn-group pull-right" >
<!-- <button class="btn btn-default refresh_tbl" type="button" name="refresh" aria-label="refresh" title="Refresh">
 <i class="fa fa-refresh"></i></button>-->
 <div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<!--<i class="fa fa-columns"></i>-->
Distribution Records&nbsp;&nbsp;<span class="caret"></span></button>
<ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
<!--<li role="menuitem"><label class="" style="" >Distribution</li>-->
<li role="menuitem"><label class="label_value" ><input checked type="checkbox" class="toggle-vis" data-column="tax" value="Taxon" >Taxon </label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="method" value="Method" checked >Method</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observation" value="Observation" checked >Observation</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox"  class="toggle-vis" data-column="species" value="Species" checked >Species </label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="place" value="Place" checked>Place</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="day" value="Day" checked>Day</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="number" value="Number" checked>Number</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" >Observer</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="age_group" value="Observer" >Age Group</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="abundance" value="Abundance" >Abundance</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="specimen_code" value="Specimen Code" >Specimen Code</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="collector_institution" value="Collector Institution" >Collector Institution</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="sex" value="Sex" >Sex</label></li>
<!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="specienewid" value="Specienewid" type="checkbox">Specienewid</label></li>-->
      <!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox"> Observer</label></li>-->
 </ul>
 </div>
 <div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<!--<i class="fa fa-columns"></i>-->
Species&nbsp;&nbsp;<span class="caret"></span></button>
<ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
<!--<li role="menuitem"><label class="" style="" >Species</li>-->
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="specienewid" value="Specienewid"  >Specienewid</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="order" value="Order" checked >Order</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="family" value="Family" checked>Family</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="genus" value="Genus" checked>Genus</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="species" value="Species" checked>Species</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="species_auth" value="Species Author" checked>Species Author</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="sub_species" value="Sub-species" >Sub-species</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="sub_species_auth" value="Sub-species Author" >Sub-species Author</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="common_name" value="Common Name" >Common Name (English)</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="common_name_fr" value="Common Name (French)" >Common Name (French)</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="iucn_threat_code" value="IUCN Threat Code" >IUCN Threat Code</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="range" value="Range" >Range</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="forest_use" value="Forest Use" >Forest Use</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="water_use" value="Water Use" >Water Use</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="endemism" value="Endemism" >Endemism</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="migration" value="Migration" >Migration</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="national_threat_code" value="National Threat Code" >National Threat Code</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="breeding" value="Breeding" >Breeding</label></li>

      <!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox"> Observer</label></li>-->
 </ul>
 </div> 
<div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<!--<i class="fa fa-columns"></i>-->
Gazetteers&nbsp;&nbsp;<span class="caret"></span></button>
<ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="gazeteer" value="Gazeteer" checked >Gazeteer</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="country" value="Country" checked >Country</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="place" value="Place" checked >Place</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="details" value="Details" checked >Details</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="longitude" value="Longitude" checked>Longitude</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="latitude" value="Latitude" checked >Latitude</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="datum" value="Datum" checked  >Datum (DD)</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="zone" value="Zone" checked  >Zone</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="eastings" value="Eastings" checked >Eastings</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="northings" value="Northings" checked >Northings</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="datum_utm" value="Datum (UTM)" checked >Datum (UTM)</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="habitat" value="Habitat"  >Habitat</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="altitude" value="Altitude" >Altitude</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="slope" value="Slope" >Slope</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="aspect" value="Aspect" >Aspect</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="admin_unit" value="Admin Unit">Admin Unit</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="protected_area" value="Protected Area">Protected Area</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="soil" value="soil">Soil</label></li>

      <!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox"> Observer</label></li>-->
 </ul>
 </div> 
 
       <div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<!--<i class="fa fa-columns"></i>-->
Observers&nbsp;&nbsp;<span class="caret"></span></button>
<ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="title" value="Title" >Title</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="first_name" value="First Name" >First Name</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="last_name" value="Last Name" checked >Last Name</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="address" value="Address"  >Address</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="work_tel_number" value="Work Tel. Number"  >Work Tel. Number</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="mobile" value="Mobile"  >Mobile</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="email" value="Email"  >Email</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="website" value="Website"  >Website</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="institution_name" value="Institution Name" checked >Institution Name</label></li>



      <!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox"> Observer</label></li>-->
 </ul>
 </div> 
       
       
<!-- <div class="export btn-group">
 <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
<i class="fa fa-download"></i> 
<span class="caret"></span></button>
<ul class="dropdown-menu" role="menu">
<li data-type="csv"><a href="javascript:void(0)">CSV</a></li>
<li data-type="excel"><a href="javascript:void(0)">MS-Excel</a></li>
<li data-type="doc"><a href="javascript:void(0)">MS-Word</a></li>
<li data-type="txt"><a href="javascript:void(0)">TXT</a></li>
<li data-type="json"><a href="javascript:void(0)">JSON</a></li>
<li data-type="xml"><a href="javascript:void(0)">XML</a></li>
<li data-type="pdf"><a href="javascript:void(0)">PDF</a></li>
</ul>
</div>-->
</div> 
</div>
    </div>
  </div>
  <!-- /.box-header -->
    
   <!-- /.box-header -->
  

   
   
   
<!--  <div class="keep-open btn-group" title="Columns">
  <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-columns"></i> 
      <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
      <li role="menuitem"><label><input checked type="checkbox" class="toggle-vis" data-column="tax" value="Taxon" > Taxon </label></li>
      <li role="menuitem"><label><input type="checkbox"  class="toggle-vis" data-column="species" value="Species" checked > Species </label></li>
      <li role="menuitem"><label><input type="checkbox" class="toggle-vis" data-column="method" value="Method" checked > Method</label></li>
      <li role="menuitem"><label><input type="checkbox" class="toggle-vis"  data-column="place" value="Place" checked> Place</label></li>
      <li role="menuitem"><label><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox"> Observer</label></li>
     </ul>
  </div> -->
   
<!--   <div id="drop_val" style="cursor:pointer">Please Click</div> 
<div style="display:none;postion:absolute;z-index:99999;background:#ccc;width:10%;" class="show_drop">  
<input type="checkbox" class="toggle-vis" data-column="tax" value="Taxon" checked />Taxon<br/>
<input type="checkbox" class="toggle-vis" data-column="species" value="Species" checked />Species<br/>
<input type="checkbox" class="toggle-vis" data-column="method" value="Method" checked/>Method<br/>
<input type="checkbox" class="toggle-vis" data-column="place"  value="Place" checked/>Place<br/>
<input type="checkbox" class="toggle-vis" data-column="observer"  value="Observer" />Observer<br/>
</div>-->
<hr>
  
            <div class="box-body"> 
                
             


<table id="example" class="display dataTable" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Taxon</th>
                 <th>Method</th>
                 <th>Observation</th>
                <th>Species</th>
                <th>Place</th>
                <th>Day</th>
                <th>Number</th>
                <th>Observer</th>
                <th>Age Group</th>
                <th>Abundance</th>
                <th>Specimen Code</th>
                <th>Collector Institution</th>
                <th>Sex</th>
                <th>Specienewid</th>
                <th>Order</th>
<th>Family</th>
<th>Genus</th>
<th>Species</th>
<th>Species Author</th>
<th>Sub-species</th>
<th>Sub-species Author</th>
<th>Common Name (English)</th>
<th>Common Name (French)</th>
<th>IUCN Threat Code</th>
<th>Range</th>
<th>Forest Use</th>
<th>Water Use</th>
<th>Endemism</th>
<th>Migration</th>
<th>National Threat Code</th>
<th>Breeding</th>

<th>Gazetteers</th>
<th>Country</th>
<th>Place</th>
<th>Details</th>
<th>Longitude</th>
<th>Latitude</th>
<th>Datum (DD)</th>
<th>Zone</th>
<th>Eastings</th>
<th>Northings</th>
<th>Datum (UTM)</th>
<th>Habitat</th>
<th>Altitude</th>
<th>Slope</th>
<th>Aspect</th>
<th>Admin Unit</th>
<th>Protected Area</th>
<th>Soil</th>

<th>Title</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th>Work Tel. Number</th>
<th>Mobile</th>
<th>Email</th>
<th>Website</th>
<th>Institution Name</th>


            </tr>
        </thead>
 
        
 
        <tbody>
            
              @foreach($distribution as $val) 
                <tr>
                <td><?php echo $val->taxon_code; ?></td>
                 <td><?php echo $val->code_description ; ?>(<?php echo $val->method_code; ?>)</td>
                 <td><?php echo $val->code_description ; ?>(<?php echo $val->observation_code ; ?>)</td>
                <td><?php if($val->common_name!=''){echo $val->common_name;}else{ ?>/<?php echo $val->genus; ?> / <?php echo $val->species; ?> / <?php echo $val->subspecies; ?><?php } ?></td>
                <td><?php echo $val->place; ?></td>
                <td><?php if($val->day!=''){echo $val->day.'-'; }?>&nbsp;<?php if($val->month!=''){ echo $val->month.'-'; }?>&nbsp;<?php if($val->year!=''){ echo $val->year;} ?></td>
                <td><?php echo $val->number; ?></td>
                <td><?php echo $val->first_name; ?> <?php echo $val->last_name; ?> <?php echo $val->institution; ?> </td>
                <td><?php echo $val->code_description; ?>(<?php echo $val->age_group; ?>)</td>
                <td><?php echo $val->code_description; ?>(<?php echo $val->abundance_group; ?>)</td>
                <td><?php echo $val->specimencode; ?></td>
                <td><?php echo $val->collectorinstitution; ?></td>
                <td><?php echo $val->Sex; ?></td>
                <td><?php echo $val->specienewid; ?></td>
                <td><?php echo $val->order; ?></td>
                <td><?php echo $val->family; ?></td>
 <td><?php echo $val->genus; ?></td>
 <td><?php echo $val->species; ?></td>
 <td><?php echo $val->species_author; ?></td>
 <td><?php echo $val->subspecies; ?></td>
 <td><?php echo $val->common_name; ?></td>
 <td><?php echo $val->common_name_fr; ?></td>
 <td><?php echo $val->iucn_threat_id; ?></td>
 <td><?php echo $val->range_id; ?></td>
 <td><?php echo $val->growth_id; ?></td>
 <td><?php echo $val->forestuse_id; ?></td>
 <td><?php echo $val->wateruse_id; ?></td>
 <td><?php echo $val->endenisms_id; ?></td>
 <td><?php echo $val->migration_tbl_id; ?></td>
 <td><?php echo $val->national_threat_code_id; ?></td>
 <td><?php echo $val->breeding_id; ?></td>
    
 
 <td><?php echo $val->gazeteer_id; ?></td>
 <td><?php echo $val->country_id; ?></td>
 <td><?php echo $val->place; ?></td>
 <td><?php echo $val->details; ?></td>
 <td><?php echo $val->eastings; ?></td>
 <td><?php echo $val->northings; ?></td>
 <td><?php echo $val->zone; ?></td>
 <td><?php echo $val->datum; ?></td>
 <td><?php echo $val->datum_dd; ?></td>
 <td><?php echo $val->longitude; ?></td>
 <td><?php echo $val->latitude; ?></td>
 
 <td><?php echo $val->habitat; ?></td>
 <td><?php echo $val->altitude; ?></td>
 <td><?php echo $val->slope; ?></td>
 <td><?php echo $val->aspect; ?></td>
 <td><?php echo $val->soil; ?></td>
 <td><?php echo $val->protected_area_code; ?>(<?php echo $val->protected_area_name; ?>)</td>
 <td><?php echo $val->adminunit_id; ?></td>
 
 
 <td><?php echo $val->tittle; ?></td>
 <td><?php echo $val->first_name; ?></td>
 <td><?php echo $val->last_name; ?></td>
 <td><?php echo $val->address; ?></td>
 <td><?php echo $val->work_tel_number; ?></td>
 <td><?php echo $val->mobile; ?></td>
 <td><?php echo $val->email; ?></td>
 <td><?php echo $val->website; ?></td>
 <td><?php echo $val->institution; ?></td>
 
 
              @endforeach
            
            
<!--            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td style="display:none" class="age">23</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>-->
             
            
        </tbody>
    </table>
         

   
              
              
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
@push('datatable_data')
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,b-1.0.3,b-colvis-1.0.3,b-flash-1.0.3,b-html5-1.0.3/datatables.min.js"></script>	
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,b-1.0.3,b-colvis-1.0.3,b-flash-1.0.3,b-html5-1.0.3/datatables.min.css">
<script>
   
   
   
   
   
   
   
   
   
   
   
   
    $(document).ready(function() {
    var table = $('#example').DataTable( {
         "scrollY": 200,
         "scrollX": true,
          //dom: 'B',
                 dom: 'Blfrtip',
                // select: true,
                 //text: 'Export',
                 
                 
//		 buttons: [
//           {
//               extend: 'excelHtml5',
//               exportOptions: {
//                   columns: ':visible'
//               }
//           },
//           {
//               extend: 'pdfHtml5',
//               title:'GVTC',
//               orientation: 'landscape',
//               pageSize: 'A4',
//               customize: function (doc) { doc.defaultStyle.fontSize = 10;
//                   //2,3,4,etc doc.styles.tableHeader.fontSize = 1; //2, 3, 4, etc 
//               },
//               exportOptions: {
//                    columns: ':visible'
//               }
//               
//           },{
//               extend: 'copy',
//               text: 'Copy to clipboard' },
//           {
//               extend: 'csvHtml5',
//               exportOptions: {
//                    columns: ':visible'
//               }
//           },
//           
//                   ],

"buttons": [
           {
       
              
              extend: 'collection',
              text: 'Export',
              postfixButtons: [
                  
                     {
                extend: 'csvHtml5',
             exportOptions: {
                   columns: ':visible'
              }  } ,
          
          {
             extend: 'pdfHtml5',
               title:'GVTC',
               orientation: 'landscape',
               pageSize: 'A4',
               customize: function (doc) { doc.defaultStyle.fontSize = 5;
                   //2,3,4,etc 
                   doc.styles.tableHeader.fontSize = 3; //2, 3, 4, etc 
               },
               exportOptions: {
                    columns: ':visible'
               }
               
           },
           
           {
               extend: 'excelHtml5',
               exportOptions: {
                    columns: ':visible'
               }},
             {
               extend: 'copyHtml5',
               exportOptions: {
                    columns: ':visible'
               }},
           
               
             
              
                        
                        //'copy','pdf','excel','csv'
              
                    ],
             
              
              
           }
           
          
           
       
		]  ,
                   
                   
           
                   
        
        
        "columns": [                                          
            { "name": "tax"},
            { "name": "method"},
            { "name": "observation"},
            { "name": "species"},
            { "name": "place"},
            { "name": "day"},
            { "name": "number"},
            { "name": "observer"},
            { "name": "age_group"},
            { "name": "abundance"},
            { "name": "specimen_code"},
            { "name": "collector_institution"},
            { "name": "sex"},
            { "name": "specienewid"},
            { "name": "order"},
            { "name": "family"},
            { "name": "genus"},
            { "name": "species"},
            { "name": "species_auth"},
            { "name": "sub_species"},
            { "name": "sub_species_auth"},
            { "name": "common_name"},
            { "name": "common_name_fr"},
            { "name": "iucn_threat_code"},
            { "name": "range"},
            { "name": "forest_use"},
            { "name": "water_use"},
            { "name": "endemism"},
            { "name": "migration"},
            { "name": "national_threat_code"},
            { "name": "breeding"},
            { "name": "gazeteer"},
            { "name": "country"},
            { "name": "place"},
            { "name": "details"},
            { "name": "longitude"},
            { "name": "latitude"},
            { "name": "datum"},
            { "name": "zone"},
            { "name": "eastings"},
            { "name": "northings"},
            { "name": "datum_utm"},
            { "name": "habitat"},
            { "name": "altitude"},
            { "name": "slope"},
            { "name": "aspect"},
            { "name": "admin_unit"},
            { "name": "protected_area"},
            { "name": "soil"},
            { "name": "title"},
            { "name": "first_name"},
            { "name": "last_name"},
            { "name": "address"},
            { "name": "work_tel_number"},
            { "name": "mobile"},
            { "name": "email"},
            { "name": "website"},
            { "name": "institution_name"}
       ],
       
       
       
       
       
       
       
       
       
       
       
       
       
       "columnDefs": [
           
           {
               "targets": [7,8,9,10,11,12,20,21,22,23,24,25,26,27,28,29,30,31,43,44,45,46,47,48,49,50,51,53,54,55,56,57],
               "visible": false
           }
       ]
       
      
      //ajax: "data.json" 
       
    } );
    
//    var table = $('#example').DataTable( {
//    ajax: "data.json"
//} );
// 
//setInterval( function () {
//    table.ajax.reload();
//}, 30000 );
 
 //$('#example').DataTable().ajax.reload();
    $('.refresh_tbl').click(function(){
        
        table.clear().draw();
        $('#example').dataTable()._fnAjaxUpdate();
        
        //table.fnDraw();
       // var mytbl = $("#example").datatable();
//mytbl.ajax.reload;
            //table.rows.add(result).draw();
       // var mytbl = $("#example").datatable();
       // mytbl.ajax.reload;
        //refreshTable();
       // alert('hi');
        //$("#example").ajax.reload();
       //$('#example').load();
       //alert('hi');
       //table.ajax.reload( null, false );
       //table.ajax.reload();
     });
      $('.toggle-vis').on( 'click', function (e) {
          var id = $(this).attr('id');
        //alert($(this).prop('checked'));  
        if($(this).prop('checked')==true)
            $('.'+id).show();
        else
            $('.'+id).hide();
        // Get the column API object
        var column = table.column( $(this).attr('data-column') + ':name');
 
        // Toggle the visibility
        column.visible( ! column.visible() );
        
    } );
    
    
   
   




    
} );
   
    
    
    </script>

@endpush