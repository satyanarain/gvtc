@extends('layouts_frontend.masterlayout')
@section('bg-light')
<header class="masthead">
<div class="container">
<div class="intro-text">
<form action="/search" method="GET" autocomplete="off" class="form-horizontal customForm" accept-charset="utf-8" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control custom-search" required="" name="q"
                    placeholder="Enter search term(s)..." title="Enter a search term (Genus or Species or Common name)"  autocomplete="off"> <span class="input-group-btn">
                   <button class="btn btn-primary text-uppercase" type="submit" style="padding:12px;border-top-left-radius:0px; border-bottom-left-radius:0px;">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </span>
            </div>
        </form>        
</div>
     
</div>
</header>
<section class="bg-light" id="portfolio">
<div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">GVTC | Wildlife Conversation Society</h2>
            <h3 class="section-subheading text-muted"> Associated Websites</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" target="_blank" href="http://www.iucnredlist.org/">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('/front/img/associated_websites/1.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>The IUCN Red List of Threatened Species(tm)</h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" target="_blank" href="https://uganda.wcs.org/">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('/front/img/associated_websites/2.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>WCS Uganda</h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" target="_blank" href="http://www.greatervirunga.org/">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('/front/img/associated_websites/3.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Greater Virunga Transboundary Collaboration</h4>
            </div>
          </div>
          
          
          
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
@endsection









