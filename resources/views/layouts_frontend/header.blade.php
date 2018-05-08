<!-- Navigation -->
<?php
$contnamet=\Route::current()->getName();
$contname=explode('.',$contnamet);

?>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top  <?php if($contnamet!='index') echo "navBack"; ?>" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/front/img/gvtc_logo.png') }}" alt="" title="" class="custom-logo" /></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">About Us</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ url('reports') }}">Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Contact Us</a>
            </li>
            
            
            <?php
            
            if(Auth::guest())
            { ?>
            <li class="nav-item">
              <a class="nav-link loginBtn" href="{{ url('login/')}}"><i class="fa fa-lock"></i> Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link guestUserBtn" href=""><i class="fa fa-user"></i> Guest User Registration</a>
            </li>
            <?php }else{?>
            <li class="nav-item">    
              <a class="nav-link guestUserBtn" href="#"><i class="fa fa-user"></i> {{ ucfirst(Auth::user()->username) }}</a>
            </li>
            <li class="nav-item">  
             <a class="nav-link guestUserBtn" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link btn btn-default btn-flat">  
                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
             </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
           <?php } ?>
        
          </ul>
        </div>
      </div>
    </nav>