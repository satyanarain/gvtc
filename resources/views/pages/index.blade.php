@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')



<section class="homeBanner">
	 <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

    <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="{{ asset('/front/img/slider/1.jpg') }}" alt="" class="slider-img">
          </div>
    
          <div class="item">
            <img src="{{ asset('/front/img/slider/2.jpg') }}" alt="" class="slider-img">
          </div>
        
          <div class="item">
            <img src="{{ asset('/front/img/slider/3.jpg') }}" alt="" class="slider-img">
          </div>
        </div>
     </div>
    
      <div class="container">
         <div class="searchBox">
<!--              <form action="" autocomplete="off" class="form-horizontal customForm" method="post" accept-charset="utf-8">
                <div class="input-group">
                    <input name="searchtext" value="" class="form-control customTextfield" type="text" placeholder="Search">
                    <span class="input-group-btn">
                       <button class="btn btn-success text-uppercase customSearchBtn" type="submit" title="Advanced Search">
                           <i class="fa fa-search" aria-hidden="true"></i>
                       </button>
                    </span>
                </div>
                </form>-->
             
             
             
             
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


<section class="about-container">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h2 class="section-head">Welcome to GVL <strong>Portal</strong></h2></div>
        </div>
        <div class="row">
        	<div class="col-md-7">
                <p class="about-text">The Greater Virunga Landscape (GVL), known as the Central Albertine Rift, with its network of Protected Areas are widely spread over a long stretch of space with a rugged terrain. The poor road network combined with the remoteness and insecurity poses limitations in overall communication among stakeholders and hinders awareness of what is taking place within the GVL.<br />GVL is recorded among the world most diverse fragile ecoregions and home for surviving rare and endangered fauna and flora including the Mountain Gorillas and Elephants. The 7 National Parks are contiguous and in all constitute one ecosystem with varying habitats (see map).</p>
            </div>
            <div class="col-md-5 text-center"><img src="{{ asset('/front/img/about-img.jpg') }}" alt="" class="img-responsive img-thumbnail" /></div>
        </div>
        	
    </div>
</section>


<section class="associate-container">
	<div class="container">
		<div class="row">
         <div class="col-lg-12 text-center">
            <h2 class="section-head head-center"><strong>GVTC</strong> | Wildlife Conversation Society</h2>
            <h3 class="section-subhead"> Associated Websites</h3>
          </div>  
        </div>
        
       <div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="3000">
           <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="associatDiv">
                          <img class="img-fluid associat-img" src="{{ asset('/front/img/associated_websites/1.jpg') }}" alt="">
                          <a target="_blank" href="http://www.iucnredlist.org/">
                            <div class="overlay">
                              <div class="associat-icon"><i class="fa fa-paper-plane fa-3x"></i></div>
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
                              <div class="associat-icon"><i class="fa fa-paper-plane fa-3x"></i></div>
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
                              <div class="associat-icon"><i class="fa fa-paper-plane fa-3x"></i></div>
                            </div>
                          </a>
                        </div>
                        <div class="associat-caption">
                            <h4>Greater Virunga Transboundary Collaboration</h4>
                        </div>
                    </div>  
                </div>
              </div>
        
              <div class="item">
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
              </div>
            </div>
    
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel1" data-slide="next">
              <span class="fa fa-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
  		</div> 
      	
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