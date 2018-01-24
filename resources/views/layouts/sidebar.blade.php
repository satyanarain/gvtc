<?php
$user_pro_image = Auth::user()->profilepicture; 
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset ("profilepicture/$user_pro_image") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ ucfirst(Auth::user()->name) }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> @lang('menu.online', array(),$session_lan)</a>
        </div>
      </div>
      <!-- search form -->
     <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      
      <ul class="sidebar-menu" data-widget="tree">
       <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/"><i class="fa fa-link"></i><span>@lang('menu.dashboard', array(),$session_lan)</span></a></li>   
          
          
        <li class=""><a href="#"><span class="glyphicon glyphicon-record"></span><span>Record Distribution</span></a></li>  
          
       
       
       <li class="treeview" >
          <a href="#">
            <i class="glyphicon glyphicon-wrench"></i>
            <span>@lang('menu.manage_tables', array(),$session_lan)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           @php
           $arra=array('taxons','iucns','nationals','ranges','growth','protected-area','country','forest','water','endenism','admin-unit','age','method','observation','abundance','migration','admin-unit');
           //print_r($arra);
          @endphp
        <ul class="treeview-menu" style="<?php if(in_array(Request::segment(1),$arra)){ echo "display: block";} ?>">
        <li class="{{ Request::segment(1) == 'taxons' ? 'active active-sub' : '' }}"><a href="{{ url('taxons/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.taxon', array(),$session_lan)</span></a></li>
       <li class="{{ Request::segment(1) == 'iucns' ? 'active active-sub' : '' }}"><a href="{{ url('iucns/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.iucn', array(),$session_lan)</span></a></li>
       <li class="{{ Request::segment(1) == 'nationals' ? 'active active-sub' : '' }}"><a href="{{ url('nationals/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.national_threat', array(),$session_lan)</span></a></li>
       <li class="{{ Request::segment(1) == 'ranges' ? 'active active-sub' : '' }}"><a href="{{ url('ranges/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.range', array(),$session_lan)</span></a></li>
       <li class="{{ Request::segment(1) == 'growth' ? 'active active-sub' : '' }}"><a href="{{ url('growth/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.growth_form', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'protected-area' ? 'active active-sub' : '' }}"><a href="{{ url('protected-area/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Protected Areas</span></a></li>
        <li class="{{ Request::segment(1) == 'country' ? 'active active-sub' : '' }}"><a href="{{ url('country/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Country</span></a></li>
        <li class="{{ Request::segment(1) == 'forest' ? 'active active-sub' : '' }}"><a href="{{ url('forest/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Forest</span></a></li>
        <li class="{{ Request::segment(1) == 'water' ? 'active active-sub' : '' }}"><a href="{{ url('water/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Water</span></a></li>
        <li class="{{ Request::segment(1) == 'endenism' ? 'active active-sub' : '' }}"><a href="{{ url('endenism/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Endenism</span></a></li>
        <li class="{{ Request::segment(1) == 'admin-unit' ? 'active active-sub' : '' }}"><a href="{{ url('admin-unit/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Admin Unit</span></a></li>
        <li class="{{ Request::segment(1) == 'migration' ? 'active active-sub' : '' }}"><a href="{{ url('migration/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Migration</span></a></li>
        <li class="{{ Request::segment(1) == 'method' ? 'active active-sub' : '' }}"><a href="{{ url('method/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Method</span></a></li>
        <li class="{{ Request::segment(1) == 'observation' ? 'active active-sub' : '' }}"><a href="{{ url('observation/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Observation</span></a></li>
        <li class="{{ Request::segment(1) == 'age' ? 'active active-sub' : '' }}"><a href="{{ url('age/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Age</span></a></li>
        <li class="{{ Request::segment(1) == 'abundance' ? 'active active-sub' : '' }}"><a href="{{ url('abundance/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Abundance</span></a></li>
          </ul>
        </li>
        
        
        
        
         <li class="treeview" >
          <a href="#">
            <i class="glyphicon glyphicon-wrench"></i>
            <span>@lang('menu.manage_masters', array(),$session_lan)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           @php
           $arra1=array('observer','species');
           //print_r($arra);
          @endphp
        <ul class="treeview-menu" style="<?php if(in_array(Request::segment(1),$arra1)){ echo "display: block";} ?>">
      <li class="{{ Request::segment(1) == 'species'? 'active' : '' }}"><a href="{{ url('species/') }}"><span class="glyphicon glyphicon-eye-open"></span>  <span>Species</span></a></li> 
      <li class="{{ Request::segment(1) == ''? 'active' : '' }}"><a href="{{ url('#') }}"><span class="glyphicon glyphicon-eye-open"></span>  <span>Gazetteer</span></a></li>  
      <li class="{{ Request::segment(1) == 'observer'? 'active' : '' }}"><a href="{{ url('observer/') }}"><span class="glyphicon glyphicon-eye-open"></span> <span>Observer</span></a></li>  
          </ul>
        </li>
      <li class="{{ Request::segment(1) == 'user-management' ? 'active' : '' }}"><a href="{{ url('user-management/') }}"><span class="glyphicon glyphicon-user"></span> <span>@lang('menu.manage_users', array(),$session_lan)</span></a></li> 
      <li class="{{ Request::segment(1) == ''? 'active' : '' }}"><a href="{{ url('#') }}"><span class="glyphicon glyphicon-eye-open"></span> <span>Reporting</span></a></li>   
       
       
     <li class="treeview" >
          <a href="#">
            <i class="glyphicon glyphicon-wrench"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           @php
           $arra1=array('observer','species');
           //print_r($arra);
          @endphp
        <ul class="treeview-menu" style="">
      <li class=""><a href="{{ url('#') }}"><span class="glyphicon glyphicon-eye-open"></span>  <span>Change Password</span></a></li> 
      
          </ul>
        </li>
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


