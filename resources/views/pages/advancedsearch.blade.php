@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')
<section class="commonBanner coverBack">
  <div class="container">
    <h1>Advanced Search Result</h1>
  </div>
</section>

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
 <scetion class="body-outer">
<!--<section class="body-outer" oncontextmenu="return false;" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">-->
<!-- Include the plugin's CSS and JS: -->
<!--<script src="{{ asset ("/front/js/bootstrap-multiselect.js") }}"></script>
<link rel="stylesheet" href="{{ asset('/front/css/bootstrap-multiselect.css')}}">          -->
<div class="container">



<!--<label>Download As -</label>-->

<div style="padding-bottom: 10px; margin-top: 5px;">
<a  style="margin-left: 0px; float:left;" class="btn btn-small btn-success pull" href="<?php echo $previous = "javascript:history.go(-1)"; ?>"><i class="fa fa-pencil"></i>&nbsp;Edit Search</a>   
<?php if (Auth::check()) { 
$searchurl = Session::get('searchurluniversaldata') ;  
$advsearchdata=Session::get('advsearchdata'); 
 ?> 
 <form role="form" method="POST" action="{{ route('search.store') }}" enctype="multipart/form-data">
 {{ csrf_field() }}
 <input type="hidden" name="downloaddata" value="{{$searchurl}}">
 <input type="hidden" name="uesrid" value="{{Auth::user()->id}}">
 <input type="hidden" name="username" value="{{Auth::user()->username}}">
 <input type="hidden" name="advancedsearch" value="advancedsearch">
  <button  style="margin-left: 15px; float:right;" class="btn btn-small btn-success pull"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;Download Assessment</button>
 </form>      
<?php }else{ ?>
<a href="{{ url('login/')}}" style="margin-left: 15px; float:right;"  class="btn btn-small btn-success pull" data-placement="top" data-toggle="tooltip"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;Download Assessment</a> 
<?php } ?>
</div>
 <div style="margin-bottom: 10px;">&nbsp;</div>    
<table id="exampledemo" class="table table-bordered table-striped" style="width: 100%">    

    <thead>
                            <tr>
                                <th>Taxon</th>
                                <th>Genus</th>
                               <th>Common Name </th>
                                <th>place</th>
                                <th>Species Name </th>
                                <th>Order</th>
                                <th>Family</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            
<?php if(isset($results))
foreach($results as $result) {   
$taxon_id=$result->taxon_id;    
$taxonname = DB::table('distributions')->select('*')
                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
                       ->where('distributions.taxon_id',$taxon_id)->first();

?>
                             <tr> 
                                       <td><?php echo $taxonname->taxon_code;; ?></td>
		                        <td>{{$result->genus}}</td>
                                        <td>{{$result->common_name}}</td>
		                        <td>{{$result->place}}</td>
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

@endsection









