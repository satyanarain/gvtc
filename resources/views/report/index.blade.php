@extends('report.base')
@section('action-content')
<?php //print_r($users);die;?>
    <!-- Main content -->
    
    <section class="content">
        
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-7">
        <h3 class="box-title ">@lang('menu.report_log', array(),Session::get('language_val'))</h3>
        </div>
        <div class="col-sm-5" >
   <div class="columns columns-right btn-group pull-right" >
<!-- <button class="btn btn-default refresh_tbl" type="button" name="refresh" aria-label="refresh" title="Refresh">
 <i class="fa fa-refresh"></i></button>-->
 <div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<!--<i class="fa fa-columns"></i>-->
Distribution Records&nbsp;&nbsp;<span class="caret custom-caret"></span></button>
<ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
<!--<li role="menuitem"><label class="" style="" >Distribution</li>-->
<li role="menuitem"><label class="label_value" ><input checked type="checkbox" class="toggle-vis" data-column="tax" value="Taxon" >&nbsp;Taxon </label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox"  class="toggle-vis" data-column="species" value="Species" checked >&nbsp;Species </label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="method" value="Method" checked >&nbsp;Method</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observation" value="Observation" checked >&nbsp;Observation</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="place" value="Place" checked>&nbsp;Place</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="day" value="Day" checked>&nbsp;Day</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="month" value="Month" checked>&nbsp;Month</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="year" value="year" checked>&nbsp;year</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="number" value="Number" checked>&nbsp;Number</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" >&nbsp;Observer</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="age_group" value="Age Group" >&nbsp;Age Group</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="abundance" value="Abundance" >&nbsp;Abundance</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="specimen_code" value="Specimen Code" >&nbsp;Specimen Code</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="collector_institution" value="Collector Institution" >&nbsp;Collector Institution</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="sex" value="Sex" >&nbsp;Sex</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="remark" value="Remark" type="checkbox">Remark</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="habitat" value="Habitat" type="checkbox"> Habitat</label></li>
 </ul>
 </div>
 <div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<!--<i class="fa fa-columns"></i>-->
Species&nbsp;&nbsp;<span class="caret custom-caret"></span></button>
<ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
<!--<li role="menuitem"><label class="" style="" >Species</li>-->
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="specienewid" value="Species Id" checked>&nbsp;Species Id</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="order" value="Order" checked >&nbsp;Order</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="family" value="Family" checked>&nbsp;Family</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="genus" value="Genus" checked>&nbsp;Genus</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="species_s" value="Species" checked>&nbsp;Species</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="species_auth" value="Species Author" checked>&nbsp;Species Author</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="sub_species" value="Sub-species" checked>&nbsp;Sub-species</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="sub_species_auth" value="Sub-species Author" >&nbsp;Sub-species Author</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="common_name" value="Common Name" >&nbsp;Common Name (English)</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="common_name_fr" value="Common Name (French)" >&nbsp;Common Name (French)</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="iucn_threat_code" value="IUCN Threat Code" >&nbsp;IUCN Threat Code</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="range" value="Range" >&nbsp;Range</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="growth" value="Growth Id" >&nbsp;Growth Id</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="forest_use" value="Forest Use" >&nbsp;Forest Use</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="water_use" value="Water Use" >&nbsp;Water Use</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="endemism" value="Endemism" >&nbsp;Endemism</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="migration_tbl_id" value="Migration" >&nbsp;Migration</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="national_threat_code_id" value="National Threat Code" >&nbsp;@lang('menu.national_threat_code', array(),Session::get('language_val')) </label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="breeding_id" value="Breeding" >&nbsp;Breeding</label></li>

      <!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox"> Observer</label></li>-->
 </ul>
 </div> 
<div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<!--<i class="fa fa-columns"></i>-->
Gazetteers&nbsp;&nbsp;<span class="caret custom-caret"></span></button>
<ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
<!--<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="gazeteer" value="Gazeteer" checked >&nbsp;Gazeteer</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="gazeteer" value="Gazeteer" checked >&nbsp;Gazeteer</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="country" value="Country" checked >&nbsp;Country</label></li>-->
<!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="place" value="Place" checked >&nbsp;Place</label></li>-->
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="details" value="Details" checked >&nbsp;Details</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="longitude" value="Longitude" checked>&nbsp;Longitude</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="latitude" value="Latitude" checked >&nbsp;Latitude</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="datum_dd" value="Datum" checked  >&nbsp;Datum (DD)</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="zone" value="Zone" checked  >&nbsp;Zone</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="eastings" value="Eastings" checked >&nbsp;Eastings</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="northings" value="Northings" checked >&nbsp;Northings</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="datum" value="Datum (UTM)" checked >&nbsp;Datum (UTM)</label></li>
<!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="habitat" value="Habitat"  >&nbsp;Habitat</label></li>-->
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="altitude" value="Altitude" >&nbsp;Altitude</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="slope" value="Slope" >&nbsp;Slope</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="aspect" value="Aspect" >&nbsp;Aspect</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="adminunit_id" value="Admin Unit">&nbsp;Admin Unit</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="protected_area_id" value="Protected Area">&nbsp;Protected Area</label></li>
<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="soil" value="soil">&nbsp;Soil</label></li>

      <!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox"> Observer</label></li>-->
 </ul>
 </div> 
 
       <div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<!--<i class="fa fa-columns"></i>-->
Observers&nbsp;&nbsp;<span class="caret custom-caret"></span></button>
<ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="title" value="Title" >&nbsp;Title</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="first_name" value="First Name" >&nbsp;First Name</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="last_name" value="Last Name" checked >&nbsp;Last Name</label></li>
<!--<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="address" value="Address">&nbsp;Address</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="work_tel_number" value="Work Tel. Number"  >&nbsp;Work Tel. Number</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="mobile" value="Mobile">&nbsp;Mobile</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="email" value="Email">&nbsp;Email</label></li>
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="website" value="Website">&nbsp;Website</label></li>-->
<li role="menuitem"><label class="label_value" ><input type="checkbox" class="toggle-vis" data-column="institution" value="Institution Name" checked >&nbsp;Institution Name</label></li>



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
<!--   <style>
       
       div.dataTables_scrollBody thead {           
    display: none;
}
   </style>-->

   
   
   
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
          

      
                <table id="example"  class="display dataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>@lang('menu.taxon', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.species', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.method', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.observation', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.place', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.day', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.month', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.year', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.number', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.observer', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.age_group', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.abundance_group', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.specimen_code', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.collector_institution', array(),Session::get('language_val'))</th>
                   <th>@lang('menu.sex', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.remarks', array(),Session::get('language_val'))</th>
                    <th>@lang('menu.habitat', array(),Session::get('language_val'))</th>
<th>Species Ids</th>
<th>Order</th>
<th>Family</th>
<th>Genus</th>
<th>Species Author</th>
<th>Sub-species</th>
<th>Sub-species Author</th>
<th>Common Name (English)</th>
<th>Common Name (French)</th>
<th>IUCN Threat Code</th>
<th>Range</th>
<th>Growth Id</th>
<th>Forest Use</th>
<th>Water Use</th>
<th>Endemism</th>
<th>Migration</th>
<th>National Threat Code</th>
<th>Breeding</th>
<th>details</th>

<th>Longitude</th>
<th>Latitude</th>
<th>Datum (DD)</th>
<th>Zone</th>
<th>Eastings</th>
<th>Northings</th>
<th>Datum (UTM)</th>
<th>Atitude</th>
<th>Slope</th>
<th>Aspect</th>
<th>Admin Unit</th>
<th>Protected Area</th>
<th>Soil</th>

<th>Title</th>
<th>First Name</th>
<th>Last Name</th>
<!--<th>Address</th>
<th>Work Tel. Number</th>
<th>Mobile</th>
<th>Email</th>
<th>Website</th>-->
<th>Institution Name</th>
                    
                </tr>
            </thead>
            <tbody></tbody>
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

 <script type="text/javascript" language="javascript" >
$(document).ready(function() {
    var token = window.Laravel.csrfToken;
    //alert(token);
    var table = $('#example').DataTable( {
       // "pageLength": 1000,
       "order": [[ 0, "desc" ]],
           "scrollY": 500,
         "scrollX": true,
         dom: 'Blfrtip',
         
         
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
                
                
                
                "columnDefs": [
           
           {
               "targets": [9,10,11,12,13,14,15,16,23,24,25,26,27,28,29,30,31,32,33,34,46,47,48,49,50,],
               "visible": false
           }
       ],
                
           "columns": [                                          
            { "name": "tax"},
            { "name": "species"},
            { "name": "method"},
            { "name": "observation"},
            { "name": "place"},
            { "name": "day"},
            { "name": "month"},
            { "name": "year"},
           { "name": "number"},
           { "name": "observer"},
           { "name": "age_group"},
           { "name": "abundance"},
            { "name": "specimen_code"},
            { "name": "collector_institution"},
            { "name": "sex"},
            { "name": "remark"},
            { "name": "habitat"},
            { "name": "specienewid"},
            { "name": "order"},
            { "name": "family"},
            { "name": "genus"},
            { "name": "species_auth"},
            { "name": "sub_species"},
            { "name": "sub_species_auth"},
            { "name": "common_name"},
            { "name": "common_name_fr"},
            { "name": "iucn_threat_code"},
            { "name": "range"},
            { "name": "growth"},
            { "name": "forest_use"},
            { "name": "water_use"},
            { "name": "endemism"},
            { "name": "migration_tbl_id"},
           { "name": "national_threat_code_id"},
           { "name": "breeding_id"},
            { "name": "details"},
            { "name": "longitude"},
            { "name": "latitude"},
             { "name": "datum_dd"},
             { "name": "zone"},
             { "name": "eastings"},
             { "name": "northings"},
             { "name": "datum"},
             { "name": "altitude"},
             
             { "name": "slope"},
            { "name": "aspect"},
            { "name": "adminunit_id"},
            { "name": "protected_area_id"},
            { "name": "soil"},
            { "name": "title"},
            { "name": "first_name"},
            { "name": "last_name"},
            { "name": "institution"},

            


            
           ],
                
                
         
                
     
    
                   
        oLanguage: {
        sProcessing: "<img  src='../dist/img/gvtc_loader.gif' style='z-index:9999 !important; position: absolute;'>"
        },
        processing : true, 
        "destroy":true,
        "serverSide": true,
        //"lengthMenu": [[50, 100, 500, 1000, -1], [50, 100, 500, 1000, "All"]],
        dom: 'lBfrtip',        
        "ajax":{
               // url :"/data.php", // json datasource
               url :"{{ route('report/getdata') }}", // json datasource
               //route('distribution/getdata'),
                //url :"passes/searchdata", // json datasource
                type: "POST",  // method  , by default get
                data:{'_token':token},
                error: function(){  // error handling
                        $(".employee-grid-error").html("");
                        $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="4">No data found in the server</th></tr></tbody>');
                        $("#employee-grid_processing").css("display","none");

                }
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
} );
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