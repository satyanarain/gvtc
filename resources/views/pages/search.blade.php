@extends('layouts_frontend.masterlayout')
@section('bg-light')
<header class="masthead">
<div class="container">
    <h1>Reports</h1>
<div class="intro-text">
<!--<form action="/search" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>  -->
    
    
    
<!--<form action="" autocomplete="off" class="form-horizontal customForm" method="post" accept-charset="utf-8">
<div class="input-group">
<input name="searchtext"  name="search_text" title="Enter a search term (taxonomic name to species level or common name)"  autocomplete="off" id="search" class="form-control" placeholder="Enter search term(s)...">
<span class="input-group-btn">
<button class="btn btn-primary text-uppercase" type="submit">
Advanced Search
</button>
</span>
</div>
</form>-->
</div>
     
</div>
</header>

<!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
               <li class="breadcrumb-item active">SearchResult</li>
            </ol>
        </div>
	</div>
<div class="content-area bg-light" id="disable-part">
<div class="container">
<!--<div id="txtHint" class="title-color" style="padding-top:0px; margin-top: 0px; text-align:center;" ><b>Species information will be listed here...</b></div>-->
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
<a href="{{ url('login/')}}" style="margin-left: 15px;margin-bottom:10px; float:right"  class="btn btn-small btn-success pull" data-placement="top" data-toggle="tooltip"  target="_blank"><span class="glyphicon glyphicon-download-alt">&nbsp;Download assessment</span></a>
<?php }else{ ?>
<?php } ?>
<?php if (Auth::check()) {?>
<label>Download as -</label>
<?php } ?>

<?php
$searchurl = \Request::fullUrl();
Session::put('searchurl', $searchurl);
$searchurl;
?>

   
<?php


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
    </div>
@endsection









