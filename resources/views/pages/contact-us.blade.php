@extends('layouts_frontend.masterlayout')
@section('homeBanner coverBack')




<section class="commonBanner coverBack">
  <div class="container">
		<h1>Contact Us</h1>
  </div>
</section>

<!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
               <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </div>
	</div>
	<!-- breadcrumb -->
    
        <section class="white-container" style="padding-top:10px !important;padding-bottom: 5px !important">
	<div class="container">
		<div class="row">
        	<div class="col-lg-12 text-center">
            	<h2 class="section-head head-center">Get in Touch <strong>with us</strong></h2>
          	</div>  
            
 
        </div>
    </div>
</section>

<section class="gray-container">
	<div class="container">
		<div class="row">            
         	<div class="col-lg-12 text-center">
         		<section id="contact">
  <div class="container">

	
	<div class="row">
	  <div class="col-md-7">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7974.859244782067!2d30.104377000000003!3d-1.9827290000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6b11abd5222fc7e1!2sGreater+virunga+Transboundary+Collaboration+-+GVTC!5e0!3m2!1sen!2sin!4v1528707408246" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        
      </div>

      <div class="col-md-5">
          <p id="myElem" class="alert alert-success" style="display:none;">Thank you for contacting GVTC. We'll get back to you as soon as possible.</p>
         <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
          <div class="alert alert-success print-success-msg" style="display:none">
        <ul></ul>
    </div>
          <form method="POST" action=""  id="contacform" name="contacform" >
               {{ csrf_field() }}
   
          <div class="form-group required">
              <label for="name">Name</label>
              <input type="text"  class="form-control"  value=""  id="user_name" name="user_name" >
          </div>
          <div class="form-group required">
               <label for="name">Email</label>
              <input type="email"  class="form-control" id="user_email" name="user_email"  >
          </div>
          <div class="form-group">
               <label for="name">Subject</label>
            <input type="text" class="form-control user_subject" name="Subject" id="user_subject" >
          </div>
          <div class="form-group">
               <label for="name">Message</label>
            <textarea class="form-control" id="user_message" name="user_message" rows="3" ></textarea>
          </div>
               <!-- <input type="submit" name="submit" id="Login" value="Login" class="login-button">-->
         <button class="btn btn-lg btn-success" id="submitbtn" type="button" name="button">
              <i class="fa fa-paper-plane-o "  aria-hidden="true"></i> Submit
          </button>
        </form>
          
          
          

          
      </div>
      <div class="col-lg-12 text-center">
       <p class="p-text">
           <span style="font-weight:bold;">Address:</span> KG 6 AV. #18, plot #954
          Gasabo District, Kimihurura, Rugando P.O.Box 6626 Kigali Rwanda</br>
<span style="font-weight:bold;">Telephone:</span> +250 252-580-429</br> 
<span style="font-weight:bold;">Mobile:</span>  +250 788-573-965</br> 
<span style="font-weight:bold;">E-mail:</span> centerofexcellence@greatervirunga.org<p>
    </div>       
    </div>
  </div>
</section>
			</div>  
        </div>
    </div>
</section>

@endsection
