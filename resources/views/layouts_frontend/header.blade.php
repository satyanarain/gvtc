<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="{{ asset('/front/img/gvtc_logo.png') }}" alt="" title="" class="custom-logo" /></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">About Us</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="">Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link loginBtn" href="{{ url('login/')}}"><i class="fa fa-lock"></i> Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link guestUserBtn" href=""><i class="fa fa-user"></i> Guest User Registration</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>