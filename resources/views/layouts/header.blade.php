<?php $session_lan= Session::get('language_val'); ?>
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      
      <span class="logo-mini"><img src="{{ asset('images/gvtclogo.jpg') }}"/></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{ asset('images/gvtcLogolong.jpg') }}"/></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="new_logo_holder"></div>
      <div class="navbar-custom-menu">
          
        <ul class="nav navbar-nav">
            
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <?php $user_pro_image = Auth::user()->profilepicture; ?>
        <!--laguage chanage-->
        
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset ("profilepicture/$user_pro_image") }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ ucfirst(Auth::user()->username) }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset ("profilepicture/$user_pro_image") }}" class="img-circle" alt="User Image">
                
                <p>
                    
                  {{ ucfirst(Auth::user()->username) }}
                
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo "/user-management/viewprofile/".Auth::user()->id; ?>" class="btn btn-default btn-flat">View @lang('menu.profile', array(),$session_lan)</a>
                </div>
                <div class="pull-right">
                
                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">  
                      
                     @lang('menu.sign_out', array(),$session_lan) </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            
          </li>
        </ul>
      </div>
    </nav>
  </header>
