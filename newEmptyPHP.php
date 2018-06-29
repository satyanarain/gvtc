<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>DataTables example - Select columns</title>
	<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=6e5593ad4c5375eef5d919cfc10a0a54">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,b-1.0.3,b-colvis-1.0.3,b-flash-1.0.3,b-html5-1.0.3/datatables.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" src="/media/js/site.js?_=a25d93b0b2ef7712783f57407f987734"></script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=extensions%2Fbuttons%2Fexamples%2Fcolumn_visibility%2Fcolumns.html" async></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
	<script type="text/javascript" language="javascript" src="../../../../examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,b-1.0.3,b-colvis-1.0.3,b-flash-1.0.3,b-html5-1.0.3/datatables.min.js"></script>
	
	<script type="text/javascript">
$(document).ready(function() {
	var table = $('#example').DataTable( {
		dom: 'B',
                 dom: 'Blfrtip',
		"buttons": [
           {
              extend: 'colvis',
              postfixButtons: ['colvisRestore'],
              
              
           },
       {
           extend: 'csv',
           footer: false
          
       },{
           extend: 'excel',
           footer: false
       },{
           extend: 'pdf',
           footer: false
       }
		]  
    } );
    
  
        
        //alert('hi');
    
  //$("#p1").show();  
 
    
    
    
    
    
    
    
    
    
    
    
} );
</script>
</head>
<body>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
				<th>ttSalary</th>
            </tr>
        </thead>
 
        
 
        <tbody>
            
           
          
           
            <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012/09/26</td>
                <td>$217,500</td>
				<td>$217,500</td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td >Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011/09/03</td>
                <td>$345,000</td>
				<td>$217,500</td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td  >Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009/06/25</td>
                <td>$675,000</td>
				<td>$217,500</td>
            </tr>
         
           
  
 
       
        
        </tbody>
    </table>
</body>
	
	
	<style>
		.dt-button-collection a.buttons-columnVisibility:before,
.dt-button-collection a.buttons-columnVisibility.active span:before {
	display:block;
	position:absolute;
	top:1.2em;
    left:0;
	width:12px;
	height:12px;
	box-sizing:border-box;
}

.dt-button-collection a.buttons-columnVisibility:before {
	content:' ';
	margin-top:-6px;
	margin-left:10px;
	border:1px solid black;
	border-radius:3px;
}

.dt-button-collection a.buttons-columnVisibility.active span:before {
	content:'\2714';
	margin-top:-11px;
	margin-left:12px;
	text-align:center;
	text-shadow:1px 1px #DDD, -1px -1px #DDD, 1px -1px #DDD, -1px 1px #DDD;
}

.dt-button-collection a.buttons-columnVisibility span {
    margin-left:20px;    
}
	</style>