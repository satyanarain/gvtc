@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')
<section class="commonBanner coverBack">
  <div class="container">
    <h1>Advanced Search Result</h1>
  </div>
</section>
<?php

 
// foreach($genus_info As $genus){
//     
//     $genus->genus;
//     $genus->total;
//    
//     
// }
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
               <li class="breadcrumb-item active">Advanced Search Result</li>
            </ol>
        </div>
	</div>
	<!-- breadcrumb -->
<!--        <scetion class="body-outer">-->
<!--<section class="body-outer" oncontextmenu="return false;" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">-->
<!-- Include the plugin's CSS and JS: -->
<!--<script src="{{ asset ("/front/js/bootstrap-multiselect.js") }}"></script>
<link rel="stylesheet" href="{{ asset('/front/css/bootstrap-multiselect.css')}}">          -->
<div class="container">




    
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


<!-----Guset USer Already Login after that downlaod ---->


<!--<label><a style="color:#1b6b36" href="{{ url('/')}}">Back to Home</a></label>-->

<label>Download As -</label>




    
<table id="example" class="table table-bordered table-striped" style="width: 100%">    

    <thead>
                            <tr>
                                <th>Taxon</th>
                                <th>Genus</th>
                                <th>Common Name </th>
                                <th>Species Name </th>
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

 ?>
                            
<?php if(isset($results))
 
foreach($results as $result) {   
$taxon_id=$result->taxon_id;    
$taxonname = DB::table('species')->select('*')
                        ->leftjoin('taxons', 'taxons.id', 'species.taxon_id')
                       ->where('species.taxon_id',$taxon_id)->first();

?>
                             <tr> 
                                       <td><?php echo $taxonname->taxon_code;; ?></td>
		                        <td>{{$result->genus}}</td>
		                        <td>{{$result->common_name}}</td>
		                        <td>{{$result->species}}</td>
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
<div style="margin-top: 20px;">
    
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









