<!DOCTYPE html>
<html lang="en"> 
<head>
 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>GVTC Admin Panel</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>
<div class="container">
<div class="info">
<!--<h1 style="color:#324b30;">GVTC LOGIN</h1>-->
<!--<span>Made with <i class="fa fa-heart"></i> by <a href="http://andytran.me">Andy Tran</a></span>-->
</div>
</div>
<div class="form">
<div class="thumbnail"><img src="{{ asset('images/logo.jpg') }}"/></div>
@if(Session::has('success'))
<div class="alert alert-success" style='color:#a94442'>{{Session::get('success')}}</div>
@elseif(Session::has('fail'))
<div class="alert alert-danger"style='color:#a94442'>{{Session::get('fail')}}</div>
@endif
<form class="login-form"  method="POST" action="{{ url('/login')}}">
{{ csrf_field() }}   
<!--    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
@if ($errors->has('email'))
<span class="help-block" style="color:#a94442">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
<div class="col-md-6">
<input id="email" type="email" class="form-control" placeholder="E-Mail Address"  name="email" value="{{ old('email') }}" required autofocus>
</div>
</div>-->

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
@if ($errors->has('username'))
<span class="help-block" style="color:#a94442">
<strong>{{ $errors->first('username') }}</strong>
</span>
@endif
<div class="col-md-6">
<input id="username" type="text" autocomplete="off" class="form-control  user-icon" placeholder="User Name"  name="username" value="{{ old('username') }}" required autofocus>
</div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<div class="col-md-6">
<input id="password" type="password" autocomplete="off" placeholder="Password" class="form-control password-icon" name="password" required>
@if ($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4" style="color:#ffffff;text-align:right; ">
<div class="checkbox">
    <p style="float:left;" class="user_guest"><a href="<?php echo $url='http://'.$_SERVER['HTTP_HOST'].'/'.'guest_register'; ?>" style="color:#ffffff;text-decoration:none;">Guest User Registration</a></p> 
<!--<input type="checkbox" class="customInput" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me-->

<select id="lanuage" name="lanuage" class="form-control" style="margin:5px 0px 10px 0px;">
<option value="en">English</option>
<option value="fr">French</option>
</select> 
</div>
</div>
</div>
<div class="form-group">
<div class="col-md-8 col-md-offset-4">
<button type="submit" class="btn btn-primary">Login</button>
<a class="btn btn-link" style="color:#ffffff; float: left;width: 100%;text-align: center;" href="{{ route('password.request') }}">Forgot Your Password?</a>
</div>
</div> 
<!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
<!--       <select name='language'required >
   <option value='' >Plaese Select</option>
   <option value='en'>English</option>
   <option value='fr'>French</option>
</select>-->
<div class="col-md-6 col-md-offset-4" style="text-align: center;">
<div class="col-sm-6 col-md-4">

</div>
<?php
$rt=Config::get('app.locales');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>   
<script>
$(document).ready(function(){
  $("#lanuage").change(function(){
   // location.href = login.jQuery(this).val();
   var thisval = $(this).val(); 
   
    //var thisval = $(this).val();    
    //$("#selectedval").val(thisval);
     //$("html").attr("lang", thisval);
    // alert(thisval);
     //var html = document.getElementsByTagName("html")[0].getAttribute("lang");
     //alert(html);
  });
});

</script>
<style>
.user_guest:hover{text-decoration:underline}    
</style>
</div>             
</form>
</div>
</body>
</html>

