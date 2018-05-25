@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')
<section class="commonBanner coverBack">
  <div class="container">
    <h1>Search Result</h1>
  </div>
</section>
<?php


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

          <?php
$query=preg_replace("/[^a-zA-Z0-9]/", "", $_REQUEST['q']);

        // Perform the query using Query Builder
        $results = DB::table('species')
            ->select(DB::raw("*"))
             ->leftjoin('taxons','species.taxon_id','taxons.id')
            ->where('common_name','LIKE', '%'.$query.'%')
            ->orWhere ('genus', 'LIKE', '%' . $query . '%' )  
            ->orWhere ('species', 'LIKE', '%' . $query . '%' )  
            ->get();
         $n=count($results);
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
                                <th>Genus</th>
                                <th>Common Name </th>
                                <th>Species Name </th>
                                <th>Order</th>
                                <th>Family</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                    @if(isset($results))

@foreach($results as $result)        
                            
                             <tr> 
		                        <td>{{$result->genus}}</td>
		                        <td>{{$result->common_name}}</td>
		                        <td>{{$result->species}}</td>
		                        <td>{{$result->order}}</td>
		                        <td>{{$result->family}}</td>
                                           
		             </tr> 
               
@endforeach
@else
echo "not found";
@endif               
      

 
                        </tbody>
                    </table>  
            
            
            
	</div>

</section>
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









