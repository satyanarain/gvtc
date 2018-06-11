@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')




<section class="commonBanner coverBack">
  <div class="container">
		<h1>About Us</h1>
  </div>
</section>

<!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
               <li class="breadcrumb-item active">About Us</li>
            </ol>
        </div>
	</div>
	<!-- breadcrumb -->
    
<section class="white-container">
	<div class="container">
		<div class="row">
        	<div class="col-lg-12 text-center">
            	<h2 class="section-head head-center">About <strong>GVTC</strong></h2>
          	</div>  
            
         	<div class="col-lg-12 text-center">
         		<p class="p-text">The Greater Virunga Transboundary Collaboration (GVTC) is a transboundary Collaboration framework of Programs Plans and activities to conserve a network of Protected Areas in Greater Virunga Landscape constituted under a treaty signed by three state parties of DRC, Rwanda and Uganda in October 2015. The evolution of GVTC took 25 years (see figure), over which period, GVTC has a big trail of lessons learned and best practices in transboundary initiation and collaboration.</p>
			</div>  
        </div>
    </div>
</section>

<section class="gray-container">
	<div class="container">
		<div class="row">            
         	<div class="col-lg-12 text-center">
         		<img src="{{ asset('/front/img/about_infoghrapic.png') }}" alt="" class="img-responsive" style="display:inline;" />
			</div>  
        </div>
    </div>
</section>

<section class="white-container">
	<div class="container">
		<div class="row">         
         	<div class="col-lg-12 text-center">
         		 <p class="p-text">Greater Virunga Transboundary Collaboration Executive Secretariat (GVTC-ES) with the financial support generously provided by the Kingdom of Netherlands, through Embassy of Kingdom of Netherlands (EKN) in Kigali under a project entitled: Conserving of Greater Virunga (CGV) contracted the National Biodiversity Data Bank (NBDB), Makerere University and Wildlife Conservation Society (WCS) to develop a Greater Virunga Landscape (GVL) species database. This species database provides a centralized source of up to date information and distribution of the species data within the region.  The species database constitutes an integral part of the GVTC Center of Excellence and is available to the stakeholders for adaptive management and improved conservation of the Greater Virunga Landscape (GVL).</p>
            
<p class="p-text">Data collection and data use is governed by Data Access and Release Policy (Download PDF), Data Access and Release Policy covers commercial use of data, Intellectual Property. Data Request Form (Fill in Guest User Registration), is available for guest who needs to access data and Data Deposit Form (Download Word) is available for contributor willing to upload data to the portal.</p>
			</div>  
        </div>
    </div>
</section>












@endsection