
<nav class="navbar navbar-inverse navbar-fixed-top custom-navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>    
      <a  href="{{ url('/') }}"><img src="{{ asset('/front/img/gvtc_logo.png') }}" alt="" title="" class="img-responsive custom-logo" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right custom-nav">
        <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
        <li class="{{ Request::segment(1) == 'about-us' ? 'active' : '' }}"><a href="{{ url('/about-us') }}">About Us</a></li>
        <?php //echo Request::segment(1); die;?>
        <li class="{{ Request::segment(1) == 'reports' ? 'active' : '' }}"><a href="{{ url('reports') }}">Reports</a></li>
        <li class="{{ Request::segment(1) == 'contact-us' ? 'active' : '' }}"><a href="{{ url('contact-us') }}">Contact Us</a></li>
         <?php
            
            if(Auth::guest())
            { ?>
            <li class="nav-item">
              <a class="nav-link loginBtn" href="{{ url('login/')}}"><i class="fa fa-lock"></i>&nbsp;Login</a>
            </li>
            <li class="guestUserBtn"><a href="{{ url('login/#create')}}"><i class="fa fa-user"></i> Guest User Registration</a></li> 
            <?php }else { ?>
            
            


            
            
            
        <li class="dropdown loginBtn"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ ucfirst(Auth::user()->username) }} <span class="caret"></span></a>
          <ul class="dropdown-menu  hidden-xs">
            <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-dashboard"></i>&nbsp;Dashboard</a></li>
    <li role="presentation" class="divider"></li>
    <li><a href="{{ url('changepasswords/create') }}"><i class="glyphicon glyphicon-lock"></i>&nbsp;Change Password</a></li>
    <li role="presentation" class="divider"></li>
    <li><a href="<?php echo "/user-management/viewprofile/".Auth::user()->id; ?>"><i class="glyphicon glyphicon-user"></i>&nbsp;View Profile</a></li>
     <li role="presentation" class="divider"></li>
     <li><a  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a></li>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                                      </form>
          </ul>
        </li>
        
        
        
            <?php } ?>
<!--        <div id="langgg">
    <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
</div>-->
      </ul>
    </div>
  </div>
</nav>
