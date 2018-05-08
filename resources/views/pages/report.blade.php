@extends('layouts_frontend.masterlayout')

<!------ Include the above in your HEAD tag ---------->
<!-- Header -->
    <header class="insidehead slideImg1">
      <div class="container">
          <h1>Reports</h1>
      </div>
    </header>
    
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Reports</li>
            </ol>
        </div>
	</div>
	<!-- breadcrumb -->
@section('bg-light')





<!-- Latest compiled and minified Bootstrap CSS -->


 <!-- Wildlife Conversation Society -->
 <div class="content-area bg-light">
      <div class="container">
      	
          
          <?php
$sql = DB::table('report_categories')->orderBy('order')->get();
$ids='';
foreach ($sql as $v) {
    
 $ids= $v->id; 
$categoty_count=DB::table('report')->select('*')->where('report_categories_id',$v->id)->count();
if($categoty_count>0){
    ?>  
      
 <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $v->id; ?>">
         <?php echo $v->title; ?> 
        </a>
      </h4>
    </div>
     
<?php

$reporter =DB::table('report')->select('*')->where('report_categories_id',$v->id)->get();
//echo '<pre>';
//print_r($reporter);
//exit();


?>
 
 
    <div id="collapse<?php echo $v->id; ?>" class="panel-collapse collapse">
        <?php foreach($reporter  as $val123){ 
            ?> 
        
      <div class="panel-body">
      <?php echo $val123->report_title; ?>
      <span style="float:right"><a href="{{ asset("report_document/$val123->uploded_report") }}" target="_blank">Download</a></span>
      </div>
        <?php } ?>    
    </div>
 
     
  </div>     
<?php } } ?> 
          
    
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
      </div>
    </div>

 <!-- end container -->





<style>
  .panel-heading .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
    float: right;        /* adjust as needed */
    color: grey;         /* adjust as needed */
}
.panel-heading .accordion-toggle.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
}
  
    
</style>





@endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
