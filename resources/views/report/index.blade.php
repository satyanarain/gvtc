@extends('report.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
        
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title ">Report Log</h3>
        </div>
        <div class="col-sm-4" >
   <div class="columns columns-right btn-group pull-right" >
 <button class="btn btn-default refresh_tbl" type="button" name="refresh" aria-label="refresh" title="Refresh">
 <i class="fa fa-refresh"></i></button>
 <div class="keep-open btn-group" title="Columns" >
 <button type="button" aria-label="columns" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
 <i class="fa fa-columns"></i> <span class="caret"></span></button>
 <ul class="dropdown-menu scrollable-menu" role="menu" style=" ">
     <li role="menuitem"><label class="" style="" >Distribution</li>
     <li role="menuitem"><label class="label_value" ><input checked type="checkbox" class="toggle-vis" data-column="tax" value="Taxon" >Taxon </label></li>
     <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="method" value="Method" checked >Method</label></li>
     <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observation" value="Observation" checked >Observation</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox"  class="toggle-vis" data-column="species" value="Species" checked >Species </label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="place" value="Place" checked>Place</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="day" value="Day" checked>Day</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis"  data-column="number" value="Number" checked>Number</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox">Observer</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="age_group" value="Observer" type="checkbox">Age Group</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="abundance" value="Abundance" type="checkbox">Abundance</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="specimen_code" value="Specimen Code" type="checkbox">Specimen Code</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="collector_institution" value="Collector Institution" type="checkbox">Collector Institution</label></li>
      <li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="sex" value="Sex" type="checkbox">Sex</label></li>
      <!--<li role="menuitem"><label class="label_value"><input type="checkbox" class="toggle-vis" data-column="observer" value="Observer" type="checkbox"> Observer</label></li>-->
 </ul>
 </div>
 <div class="export btn-group">
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
</ul></div>
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
                </tr>
               
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
        
        dom: 'B',
                 dom: 'Blfrtip',
		 buttons: [
           {
               extend: 'excelHtml5',
               exportOptions: {
                   columns: ':visible'
               }
           },
           {
               extend: 'pdfHtml5',
               title:'GVTC',
               orientation: 'landscape',
               pageSize: 'A4',
               customize: function (doc) { doc.defaultStyle.fontSize = 10;
                   //2,3,4,etc doc.styles.tableHeader.fontSize = 1; //2, 3, 4, etc 
               },
               exportOptions: {
                    columns: ':visible'
               }
               
           },{
               extend: 'copy',
               text: 'Copy to clipboard' },
           {
               extend: 'csvHtml5',
               exportOptions: {
                    columns: ':visible'
               }
           },
           
                   ],
        
        
        "columns": [                                          
            { "name": "tax"},
            { "name": "species"},
            { "name": "method"},
            { "name": "observation"},
            { "name": "place"},
            { "name": "number"},
            { "name": "day"},
            { "name": "observer"},
            { "name": "age_group"},
            { "name": "abundance"},
            { "name": "specimen_code"},
            { "name": "collector_institution"},
            { "name": "sex"}
       ],
       
       "columnDefs": [
           
           {
               "targets": [7,8,9,10,11,12],
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
    
    function refreshTable() {
  $('.dataTable').each(function() {
      dt = $(this).dataTable();
      dt.fnDraw();
  })
}
    
    
    </script>

@endpush