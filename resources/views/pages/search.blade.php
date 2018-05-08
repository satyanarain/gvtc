@extends('layouts_frontend.masterlayout')
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
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">SarchResult</li>
            </ol>
        </div>
	</div>
	<!-- breadcrumb -->
@section('bg-light')
<div class="content-area bg-light">
<div class="container">
<!--<div id="txtHint" class="title-color" style="padding-top:0px; margin-top: 0px; text-align:center;" ><b>Species information will be listed here...</b></div>-->


<?php if (Auth::check()) {?>
<label>Download AS -</label>
<?php }else{ ?>
<a href="{{ url('login/')}}">Download assessment</a>
<?php
$searchurl = \Request::fullUrl();
Session::put('searchurl', $searchurl);
$searchurl;

?>
<?php } ?>
<table id="<?php if (Auth::check()) {echo 'example';}else{echo 'exampledemo';}?>" class="table table-bordered table-striped" style="width: 100%">
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









