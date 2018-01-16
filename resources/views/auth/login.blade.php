<!DOCTYPE html>
<html lang="{{ app()->getLocale('') }}" >

<head>
    
    
  
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GVTC Admin Panel</title>
  
  

      <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
                                <input id="username" type="text" class="form-control" placeholder="User Name"  name="username" value="{{ old('username') }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
      
      
       <!--<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>-->
      
      
   <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <span>&nbsp;</span>
                                <a class="btn btn-link" style="color:#324b30" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div> 
       <!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
<!--       <select name='language'required >
           <option value='' >Plaese Select</option>
           <option value='en'>English</option>
           <option value='fr'>French</option>
       </select>-->
  </form>
</div>






</body>

</html>