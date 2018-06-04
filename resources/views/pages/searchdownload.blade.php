@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')
<section class="commonBanner coverBack">
  <div class="container">
    <h1>Download Search Result</h1>
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

<div style="padding-bottom: 10px;">
Downlaod as:
</div>   
<table id="example" class="table table-bordered table-striped" style="width: 100%">    

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

                            
<?php 

if(isset($results))
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

@endsection









