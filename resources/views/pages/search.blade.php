@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')
<section class="commonBanner coverBack">
  <div class="container">
    <h1>Search Result</h1>
  </div>
</section>

<!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
               <li class="breadcrumb-item active">SearchResult</li>
            </ol>
        </div>
	</div>
	<!-- breadcrumb -->

<section class="body-outer" oncontextmenu="return false;" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">

	<div class="container">
   	
          <?php
$query=$_REQUEST['q'];

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
<?php if($n>0 && !Auth::check()) { ?>
<a href="{{ url('login/')}}" style="margin-left: 15px; float:right;"  class="btn btn-small btn-success pull" data-placement="top" data-toggle="tooltip"  target="_blank"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;Download assessment</a>
<?php }else{ ?>
<?php } ?>
<?php if (Auth::check()&& Auth::user()->role=="guest") {?>
<label>Download as -</label>
</br>
<label><a style="color:#1b6b36" href="{{ url('/')}}">Back to Home</a></label>
<?php } ?>

<?php
$searchurl = \Request::fullUrl();
Session::put('searchurl', $searchurl);
$searchurl;
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

@endsection









