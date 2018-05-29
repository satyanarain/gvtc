@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')
<section class="homeBanner coverBack">
  <div class="container">
     <div class="searchBox">
         <form action="/search" method="GET"  autocomplete="off" onsubmit="return check()" class="form-horizontal customForm"  accept-charset="utf-8">
               {{ csrf_field() }}
            <div class="input-group">
                <input name="q" id="serachtext" value="" class="form-control customTextfield" required="" type="text"  placeholder="Enter search term(s)..." title="Enter a search term (Genus or Species or Common name)"  autocomplete="off">
                <span class="input-group-btn">
                   <button class="btn btn-success text-uppercase customSearchBtn" type="submit" title="Advanced Search">
                       <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </span>
            </div>
    		</form>
        </div>
  </div>
</section>

<section class="home-body">
	<div class="container">
       <!--home page-->
		<div class="row">
        
         <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">GVTC | Wildlife Conversation Society</h2>
            <h3 class="section-subheading text-muted"> Associated Websites</h3>
          </div>
        </div>
        
        <div class="row">
        	<div class="col-md-4 col-sm-4">
            	<div class="associatDiv">
            	  <img class="img-fluid associat-img" src="{{ asset('/front/img/associated_websites/1.jpg') }}" alt="">
                  <a target="_blank" href="http://www.iucnredlist.org/">
                    <div class="overlay">
                      <div class="associat-icon"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                  </a>
                </div>
                <div class="associat-caption">
              		<h4>The IUCN Red List of Threatened Species(tm)</h4>
            	</div>
            </div> 
            
            <div class="col-md-4 col-sm-4">
            	<div class="associatDiv">
            	  <img class="img-fluid associat-img" src="{{ asset('/front/img/associated_websites/2.jpg') }}" alt="">
                  <a target="_blank" href="https://uganda.wcs.org/">
                    <div class="overlay">
                      <div class="associat-icon"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                  </a>
                </div>
                <div class="associat-caption">
              		<h4>WCS Uganda</h4>
            	</div>
            </div>
            
            <div class="col-md-4 col-sm-4">
            	<div class="associatDiv">
            	  <img class="img-fluid associat-img" src="{{ asset('/front/img/associated_websites/3.jpg') }}" alt="">
                  <a target="_blank"  href="http://www.greatervirunga.org/">
                    <div class="overlay">
                      <div class="associat-icon"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                  </a>
                </div>
                <div class="associat-caption">
              		<h4>Greater Virunga Transboundary Collaboration</h4>
            	</div>
            </div>
            
        </div>
       
       <!--home page-->
        	
    </div>
</section>


<script>
$(document).ready(function(){
   $("#search").keyup(function(){
       //alert('hi');
       var str=  $("#search").val();
       if(str == "") {
               $( "#txtHint" ).html("<b>Search Result will be listed here...</b>"); 
       }else {
               $.get( "{{ url('/livesearch?id=') }}"+str, function( data ) {
                   $( "#txtHint" ).html( data );  
            });
       }
   });  
}); 
</script>
<script type="text/javascript">
function check(){
    var serachtext = $("#serachtext").val();
    if(serachtext.trim() == "")
        {
            alert("empty");
            return false;
        }else{
            return true;
        }
                
    
    
    }
//    alert(serachdata);
//    return false;

</script>
@endsection