@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')

<section class="commonBanner coverBack">
  <div class="container">
		<h1>Report</h1>
  </div>
</section>

<!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
               <li class="breadcrumb-item active">Report</li>
            </ol>
        </div>
	</div>

<section class="body-outer">
      <div class="container">
      	
        <div class="panel-group" id="accordion">  
          <?php
$sql = DB::table('report_categories')->orderBy('order')->where('status',1)->get();
$ids='';
foreach ($sql as $v) {
    
 $ids= $v->id; 
$categoty_count=DB::table('report')->select('*')->where('report_categories_id',$v->id)->count();
if($categoty_count>0){
    ?>  
      
 <div class="panel panel-default">
<div class="panel-heading" role="tab" id="tex<?php echo $v->id; ?>">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $v->id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $v->id; ?>">
         <?php echo $v->title; ?> 
        </a>
      </h4>
    </div>
     
<?php

$reporter =DB::table('report')->select('*')->orderBy('order')->where('report_categories_id',$v->id)->where('status',1)->get();
//echo '<pre>';
//print_r($reporter);
//exit();


?>
<div id="collapse<?php echo $v->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tex<?php echo $v->id; ?>">
<?php foreach($reporter  as $val123){ ?> 
<div class="panel-body">
      <?php echo $val123->report_title; ?>
      <span style="float:right">
         <a href="{{ asset("report_document/$val123->uploded_report") }}" style="margin-left: 15px;" target="_blank" class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" onclick="openTab(this)" target="_blank"><i class="glyphicon glyphicon-download-alt">&nbsp;Download</i></a>
          
          
          
          
          </span>
      </div>
        <?php } ?>    
    </div>
</div>     
<?php } } ?> 
 </div>      
</div>
</section>

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
<script type="text/javascript">
$(document).ready(function(){    
$('.collapse').on('show.bs.collapse', function (e) {
    $('.collapse').not(e.target).removeClass('in');
});
});

</script>




@endsection


