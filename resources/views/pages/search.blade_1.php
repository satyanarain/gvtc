@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')
<section class="commonBanner coverBack">
  <div class="container">
    <h1>Search Result</h1>
  </div>
</section>
<?php

 


 print_r($taxoninfo);
 foreach($taxoninfo As $taxondata){
     
     $taxondata->taxon_id;
     $taxondata->total;
    
     
 }
 //die;
 foreach($genus_info As $genus){
     
     $genus->genus;
     $genus->total;
    
     
 }
 //die;
//$sqlgenus = DB::table('species')->select('genus')
//            ->groupBy('genus')
//            ->get();
//foreach($sqlgenus as $genus){
//    
//    //echo $genus->genus.'<br>';
//}
//
//$count = DB::table('species')
//        ->select('genus')
//    ->where('status', 1)
//    ->groupBy('genus')
//    ->get();
//
//var_dump(count($count));


?>
<!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
               <li class="breadcrumb-item active">Search Result</li>
            </ol>
        </div>
	</div>
	<!-- breadcrumb -->
<!--        <scetion class="body-outer">-->
<!--<section class="body-outer" oncontextmenu="return false;" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">-->
<!-- Include the plugin's CSS and JS: -->
<script src="{{ asset ("/front/js/bootstrap-multiselect.js") }}"></script>
<link rel="stylesheet" href="{{ asset('/front/css/bootstrap-multiselect.css')}}">          
<div class="container">
    

    
     <script type="text/javascript">
        $(function () {
            $('#lstFruits').multiselect({
                includeSelectAllOption: true
            });
             $('#2ndFruits').multiselect({
                includeSelectAllOption: true
            });
            
            $('#3rdFruits').multiselect({
                includeSelectAllOption: true
            });
            
            $('#4thFruits').multiselect({
                includeSelectAllOption: true
            });
            $('#5thFruits').multiselect({
                includeSelectAllOption: true
            });
            
            
//            $('#btnSelected').click(function () {
//                var selected = $("#lstFruits option:selected");
//                var message = "";
//                selected.each(function () {
//                    message += $(this).text() + " " + $(this).val() + "\n";
//                });
//                alert(message);
//            });
        });
    </script>

   
        
        
        
      <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingSeven">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" class="accordion-toggle collapsed">
                     <div class="panel-heading" style="color:#5dc082">Explore or refine your search below:</div>
                    </a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
            <div class="panel-body">
  
          <div class="container" style="max-width:600px;padding:40px 20px;background:#ebeff2">
    <form class="form-horizontal" role="form"  action="/advancedsearch" method="get" >
        <?php
        $adsearchurl = \Request::fullUrl();
        $adsearch=explode("=",$adsearchurl);
        ?>
        <input type="text" name="searchkey" value="<?php echo trim($adsearch[2]); ?>"/>
        {{ csrf_field() }}
	   <div class="form-group">
	      <label for="name" class ="control-label col-sm-3">Genus</label>
		<div class="col-sm-8">
	     
              
              <select id="lstFruits" name="genusval[]" class="form-control" multiple="multiple">
        <?php
        
    
        
    foreach($genus_info As $genus){

    ?>
        <option value="<?php echo  $genus->genus; ?>"><?php echo  $genus->genus; ?>(<?php echo $genus->total; ?>)</option>
    <?php } ?>
    </select>
              
		</div>
	    </div>
	   <div class="form-group">
	      <label for="address" class ="control-label col-sm-3">Common Name</label>
		<div class="col-sm-8">
	      <select id="2ndFruits" name="commonnameval[]" class="form-control" multiple="multiple">
        <?php
        
    
    foreach ($commoninfo As $comminfo){

    ?>
        <option value="<?php echo $comminfo->common_name;   ?>"><?php echo $comminfo->common_name;   ?>(<?php echo $comminfo->total; ?>)</option>
    <?php }  ?>
    </select>
		</div>
	    </div>
        
        
        <div class="form-group">
	      <label for="address" class ="control-label col-sm-3">Taxon</label>
		<div class="col-sm-8">
                    <select id="3rdFruits" class="form-control" name="taxonval[]" multiple="multiple">
        <?php foreach($taxoninfo As $taxondata){
           //print_r($taxid);
               $taxonname = DB::table('distributions')->select('*')
                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
                       ->where('distributions.taxon_id',$taxondata->taxon_id)->first();
            //echo $taxonname->taxon_code;
            ?>
           <option value="<?php echo  $taxondata->taxon_id; ?>"><?php echo $taxonname->taxon_code; ?>(<?php echo $taxondata->total; ?>)</option>       
        <?php } ?>
                    </select>
            </div>
	    </div>      
        
        
        
        
        
        <div class="form-group">
	      <label for="address" class ="control-label col-sm-3">Place</label>
		<div class="col-sm-8">
                    <select id="4thFruits" class="form-control" name="taxonval[]" multiple="multiple">
        <?php foreach($placeinfo as $placeid) {
           //print_r($taxid);
               $placename = DB::table('distributions')->select('*')
                        ->leftjoin('gazetteers', 'gazetteers.id', 'distributions.gazetteer_id')
                       ->where('distributions.gazetteer_id',$placeid->gazetteer_id)->first();
            //echo $placename->place;
            ?>
           <option value="<?php echo  $placeid->gazetteer_id; ?>"><?php  echo $placename->place; ?>(<?php echo $placeid->total; ?>)</option>       
        <?php } ?>
                    </select>
            </div>
	    </div>   
        
        
        
        
        <div class="form-group">
	      <label for="address" class ="control-label col-sm-3">Habitat</label>
		<div class="col-sm-8">
                    <select id="5thFruits" class="form-control" name="taxonval[]" multiple="multiple">
        <?php foreach($habitatinfo as $habitatdata) {
            if($habitatdata){
            ?>
           <option value="<?php echo  $habitatdata->habitat; ?>"><?php  echo $habitatdata->habitat; ?>(<?php echo $habitatdata->total; ?>)</option>       
        <?php }} ?>
                    </select>
            </div>
	    </div>
        
                  
<!--	   <div class="form-group">
	      <label for="email" class ="control-label col-sm-3">Email</label>
		<div class="col-sm-8">
	      <input type="email" class="form-control" id="email" placeholder="Enter email">
		</div>
	    </div>
	   <div class="form-group">
	      <label for="pwd" class ="control-label col-sm-3">Password</label>
		<div class="col-sm-8">
	      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
		</div>
	    </div>-->
	   <div class="col-sm-offset-2 col-sm-8">
	     <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search </button>
	   </div>
	</form>
</div>         
                   
                     
                </div>
            </div>
        </div>                    
        
        
        
        
        
        
        
   
    
  
  
    
<!--    <input type="button" id="btnSelected" value="Get Selected" />-->



    
<!--     <h1 style="color:#5dc082">Explore or refine your search below:</h1>-->
<!--     <div class="row" style="margin-top:30px; margin-bottom:30px;">
  <div class="col-sm-4">
      
      
    <div class="container">
	<strong>Select Language:</strong>
    <select id="multiple-checkboxes" multiple="multiple">
        <option value="php">PHP</option>
        <option value="javascript">JavaScript</option>
        <option value="java">Java</option>
        <option value="sql">SQL</option>
        <option value="jquery">Jquery</option>
        <option value=".net">.Net</option>
    </select>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect();
    });
</script>
      
     
  <dl class="dropdown"> 
  
    <dt>
    <a href="#">
      <span class="hida">Select Common Name</span>    
      <p class="multiSel"></p>  
    </a>
    </dt>
  
    <dd>
        <div class="mutliSelect">
            <ul>
                <li>
                    <input type="checkbox" value="Apple" />Apple</li>
                <li>
                    <input type="checkbox" value="Blackberry" />Blackberry</li>
                <li>
                    <input type="checkbox" value="HTC" />HTC</li>
                <li>
                    <input type="checkbox" value="Sony Ericson" />Sony Ericson</li>
                <li>
                    <input type="checkbox" value="Motorola" />Motorola</li>
                <li>
                    <input type="checkbox" value="Nokia" />Nokia</li>
            </ul>
        </div>
    </dd>
  <button>Filter</button>
</dl>
  
  </div>
  <div class="col-sm-4">.col-sm-4</div>
  <div class="col-sm-4">.col-sm-4</div>
</div> -->

          <?php
$query=preg_replace("/[^a-zA-Z0-9]/", "", $_REQUEST['q']);

        // Perform the query using Query Builder
        $resultss =  DB::table('species')
            ->select(DB::raw("*"))
             ->leftjoin('taxons','species.taxon_id','taxons.id')
            ->where('species.common_name','LIKE', '%'.$query.'%')
            ->orWhere ('species.genus', 'LIKE', '%' . $query . '%' )  
            ->orWhere ('species.species', 'LIKE', '%' . $query . '%' ) 
                ->orWhere ('species.taxon_id', '=', 'taxons.id' ) 
            ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )  
                ->groupby('species.id')
            ->get();
         $n=count($resultss);
?>
<!-----Guset USer Already Login after that downlaod ---->
  <?php

 $searchurl = \Request::fullUrl();
 if(Auth::check() && $n>0) { ?>

 <form role="form" method="POST" action="{{ route('search.store') }}" enctype="multipart/form-data">
 {{ csrf_field() }}
 <input type="hidden" name="downloaddata" value="{{$searchurl}}">
 <input type="hidden" name="uesrid" value="{{Auth::user()->id}}">
 <input type="hidden" name="username" value="{{Auth::user()->username}}">
  <button type="submit" style="margin-left: 15px; float:right;" class="btn btn-small btn-success pull"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;Download Assessment</button>
 </form>              

<?php } ?>
<?php if($n>0 && !Auth::check()) { ?>
<a href="{{ url('login/')}}" style="margin-left: 15px; float:right;"  class="btn btn-small btn-success pull" data-placement="top" data-toggle="tooltip"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;Download Assessment</a>
<?php }else{ ?>
<?php } ?>
<!--Admin approval-->
<?php
//$userid=Auth::user()->id;
//$cureenturl = \Request::fullUrl();
//$searchrtsql= DB::table('searchresult')->where('uesrid', $userid)->where([['status', 1],['serchurl', $cureenturl]])->where('adminaprovel', 1)->get(); 
//$reord=count($searchrtsql);
?>
<?php if (Auth::check()&& Auth::user()->role=="guest") {
 $userid=Auth::user()->id;
$cureenturl = \Request::fullUrl();
$searchrtsql= DB::table('searchresult')->where('uesrid', $userid)->where([['status', 1],['serchurl', $cureenturl]])->where('adminaprovel', 1)->get(); 
 $reord=count($searchrtsql);   
    
    
    
    ?>
<!--<label><a style="color:#1b6b36" href="{{ url('/')}}">Back to Home</a></label>-->

<label>Download As -</label>
<?php } ?>

<?php
$searchurluniversaldata=Session::put('searchurluniversaldata', str_replace('+','',$searchurl));
?>
<?php if (Auth::check()) {
$userid=Auth::user()->id;
$cureenturl = \Request::fullUrl();
$searchrtsql= DB::table('searchresult')->where('uesrid', $userid)->where([['status', 1],['serchurl', $cureenturl]])->where('adminaprovel', 1)->get(); 
$reord=count($searchrtsql); 
?>
<table id="<?php if (Auth::check()&& $reord > 0) {echo 'example';}else{echo 'exampledemo';}?>" class="table table-bordered table-striped" style="width: 100%">
<?php }else{
$cureenturl = \Request::fullUrl();
$searchrtsql= DB::table('searchresult')->where([['status', 1],['serchurl', $cureenturl]])->where('adminaprovel', 1)->get(); 
$reord=count($searchrtsql);    
    
    ?>
    
<table id="<?php if (Auth::check()) {echo 'example';}else{echo 'exampledemo';}?>" class="table table-bordered table-striped" style="width: 100%">    
<?php } ?>
    <thead>
                            <tr>
                                <th>Taxon</th>
                                <th>Common Name </th>
                                <th>Species Name </th>
                                <th>Place</th>
                                <th>Genus</th>
                                <th>Order</th>
                                <th>Family</th>
                                
                            </tr>
                        </thead>
                        <tbody>
 <?php

 //$taxonname =  DB::table('species')->select('*')->leftjoin('taxons', 'taxons.id', 'species.taxon_id')->get();
// echo '<pre>';
//print_r($taxonname);
//echo $taxonname->taxon_code;
//die;
//print_r($results);
 ?>
                            
<?php if(isset($results))
 
foreach($results as $result) {   
$taxon_id=$result->taxon_id;    
$taxonname = DB::table('distributions')->select('*')
                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
                       ->where('distributions.taxon_id',$taxon_id)->first();
$gazetteer_id=$result->gazetteer_id;  
$gazetteername = DB::table('distributions')->select('*')
                        ->leftjoin('gazetteers', 'gazetteers.id', 'distributions.gazetteer_id')
                       ->where('distributions.gazetteer_id',$gazetteer_id)->first();


?>
                             <tr> 
                                       <td><?php echo $taxonname->taxon_code; ?></td>
                                       <td>{{$result->common_name}}</td>
                                         <td>{{$result->species}}</td>
                                         <td><?php echo $gazetteername->place; ?></td>
		                        <td>{{$result->genus}}</td>
		                        <td>{{$result->order}}</td>
		                        <td>{{$result->family}}</td>
                                           
		             </tr> 
               
<?php }else{ ?>
<?php echo "not found"; ?>
<?php } ?>               
      

 
                        </tbody>
                    </table>  
            
            
            
	</div>

</section>
<div>
    
</div>
<script>
 /*
	Dropdown with Multiple checkbox select with jQuery - May 27, 2013
	(c) 2013 @ElmahdiMahmoud
	license: https://www.opensource.org/licenses/mit-license.php
*/

$(".dropdown dt a").on('click', function() {
  $(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function() {
  $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown dt a').append(ret);

  }
});   
</script> 
<!--<style>
.dropdown {
  position: absolute;
  top:50%;
  transform: translateY(-50%);
}

a {
  color: #fff;
}

.dropdown dd,
.dropdown dt {
  margin: 0px;
  padding: 0px;
}

.dropdown ul {
  margin: -1px 0 0 0;
}

.dropdown dd {
  position: relative;
}

.dropdown a,
.dropdown a:visited {
  color: #fff;
  text-decoration: none;
  outline: none;
  font-size: 12px;
}

.dropdown dt a {
  background-color: #4F6877;
  display: block;
  padding: 8px 20px 5px 10px;
  min-height: 25px;
  line-height: 24px;
  overflow: hidden;
  border: 0;
  width: 272px;
}

.dropdown dt a span,
.multiSel span {
  cursor: pointer;
  display: inline-block;
  padding: 0 3px 2px 0;
}

.dropdown dd ul {
  background-color: #4F6877;
  border: 0;
  color: #fff;
  display: none;
  left: 0px;
  padding: 2px 15px 2px 5px;
  position: absolute;
  top: 2px;
  width: 280px;
  list-style: none;
  height: 100px;
  overflow: auto;
}

.dropdown span.value {
  display: none;
}

.dropdown dd ul li a {
  padding: 5px;
  display: block;
}

.dropdown dd ul li a:hover {
  background-color: #fff;
}

button {
  background-color: #6BBE92;
  width: 302px;
  border: 0;
  padding: 10px 0;
  margin: 5px 0;
  text-align: center;
  color: #fff;
  font-weight: bold;
}
.dropdown {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 99999;
}   
   
</style>-->
@endsection
