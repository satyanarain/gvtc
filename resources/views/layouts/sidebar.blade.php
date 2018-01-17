<?php $user_pro_image = Auth::user()->profilepicture;?> 



{{Request::segment(0)}}

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
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
       <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
       <li class="{{ Request::segment(1) == 'user-management' ? 'active' : '' }}"><a href="{{ url('user-management/') }}"><span class="glyphicon glyphicon-user"></span> <span>Manage Users</span></a></li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Manage Masters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              
              
       <li class="{{ Request::segment(1) == 'taxons' ? 'active active-sub' : '' }}"><a href="{{ url('taxons/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Taxon</span></a></li>
       <li class="{{ Request::segment(1) == 'iucns' ? 'active active-sub' : '' }}"><a href="{{ url('iucns/') }}"><span class="glyphicon glyphicon-leaf"></span><span>IUCN</span></a></li>
       <li class="{{ Request::segment(1) == 'nationals' ? 'active active-sub' : '' }}"><a href="{{ url('nationals/') }}"><span class="glyphicon glyphicon-leaf"></span><span>National Threat</span></a></li>
       <li class="{{ Request::segment(1) == 'ranges' ? 'active active-sub' : '' }}"><a href="{{ url('ranges/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Range</span></a></li>
       <li class="{{ Request::segment(1) == 'growth' ? 'active active-sub' : '' }}"><a href="{{ url('growth/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Growth Form</span></a></li>
        <li class="{{ Request::segment(1) == 'protected-area' ? 'active active-sub' : '' }}"><a href="{{ url('protected-area/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Protected Areas</span></a></li>
        <li class="{{ Request::segment(1) == 'country' ? 'active active-sub' : '' }}"><a href="{{ url('country/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Country</span></a></li>
        <li class="{{ Request::segment(1) == 'forest' ? 'active active-sub' : '' }}"><a href="{{ url('forest/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Forest</span></a></li>
        <li class="{{ Request::segment(1) == 'forest' ? 'active active-sub' : '' }}"><a href="{{ url('water/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Water</span></a></li>
        <li class="{{ Request::segment(1) == 'endenism' ? 'active active-sub' : '' }}"><a href="{{ url('endenism/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Endenism</span></a></li>
        <li class="{{ Request::segment(1) == 'admin-unit' ? 'active active-sub' : '' }}"><a href="{{ url('admin-unit/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Admin Unit</span></a></li>
        <li class="{{ Request::segment(1) == 'migration' ? 'active active-sub' : '' }}"><a href="{{ url('migration/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Migration</span></a></li>
        <li class="{{ Request::segment(1) == 'method' ? 'active active-sub' : '' }}"><a href="{{ url('method/') }}"><span class="glyphicon glyphicon-leaf"></span><span>Method</span></a></li>
          </ul>
        </li>
       
       
       
       
       
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<style>
.nter_none_1{display:none !important ;}    
</style>

