<?php
$user_pro_image = Auth::user()->profilepicture; 
$role=Auth::user()->role; 
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="border-bottom: 1px solid #1b6b36 ;">
        <div class="pull-left image">
          <img src="{{ asset ("profilepicture/$user_pro_image") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ ucfirst(Auth::user()->username) }}</p>
          
          <?php
          //$userid = DB::table('users')->select('*')->where('id','=',$id)->first();
        // echo  $userpassword = $userid->role;
          ?>
          <i class="fa fa-user text-success"></i>
          Login as : {{ ucfirst(Auth::user()->role) }}
          
<!--          <a href="#"><i class="fa fa-circle text-success"></i> @lang('menu.online', array(),$session_lan)</a>-->
        </div>
      </div>
     @php
           $arra=array('taxons','iucns','nationals','ranges','growth','protected-area','country','forest','water','endenism','admin-unit','age','method','observation','abundance','migration','admin-unit','breeding');
        @endphp
      <ul class="sidebar-menu" data-widget="tree">
       <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/home"><i class="glyphicon glyphicon-dashboard"></i><span>@lang('menu.dashboard', array(),$session_lan)</span></a></li>   
          
        <?php if($role!='guest'){?>  
        <li class="{{ Request::segment(1) == 'distribution' ? 'active' : '' }}"><a href="{{ url('distribution/')}}"><i class="glyphicon glyphicon-record"></i><span>@lang('menu.distribution_records', array(),Session::get('language_val'))</span></a></li>  
        
       <li class="{{ Request::segment(1) == 'offlinerecord' ? 'active' : '' }}"><a href="{{ url('offlinerecord/')}}"><i class="glyphicon glyphicon-upload"></i><span>@lang('menu.manage_offline_records', array(),Session::get('language_val'))</span></a></li>  
       <?php } ?>
       
       
 
       <?php if($role!='guest'){?>
       
        <li class="treeview" >
          <a href="#">
            <i class="fa fa-bar-chart"></i>
            <span>@lang('menu.manage_reports', array(),Session::get('language_val'))</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           @php
           $arrareport=array('report','reportcategory');
           //print_r($arra);
          @endphp
<?php  
$segment1 =  Request::segment(1);
$segment2 =  Request::segment(2);
?>
        <ul class="treeview-menu" style="<?php if(in_array(Request::segment(1),$arrareport)){ echo "display: block";} ?>">
    <li class="{{ Request::segment(1) == 'reportcategory' ? 'active' : '' }}"><a href="{{ url('reportcategory/') }}"> <i class="fa fa-bar-chart"></i> <span>@lang('menu.reportcategory', array(),Session::get('language_val'))</span></a>  </li> 
    <li class="<?php if($segment1=='report' && $segment2=='uploadreport'){ echo "active"; } ?>"><a href="{{ url('report/uploadreport/') }}"> <i class="fa fa-bar-chart"></i> <span>@lang('menu.upload_reports', array(),Session::get('language_val'))</span></a>  </li> 
       <li class="<?php if($segment1=='report' && $segment2==''){ echo "active"; } ?>"><a href="{{ url('report/') }}"> <i class="fa fa-bar-chart"></i> <span>@lang('menu.manage_reports', array(),Session::get('language_val'))</span></a>  </li> 
      </ul>
    </li>
       
       <?php } ?> 
       

       
       
       
       
       
       
       
       
       
       
       
       <?php if($role!='guest'){?>
       <li class="treeview" >
          <a href="#">
            <i class="glyphicon glyphicon-th"></i>
            <span>@lang('menu.manage_tables', array(),$session_lan)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        <ul class="treeview-menu" style="<?php if(in_array(Request::segment(1),$arra)){ echo "display: block";} ?>">
        <li class="{{ Request::segment(1) == 'taxons' ? 'active active-sub' : '' }}"><a href="{{ url('taxons/') }}"><span class="glyphicon glyphicon-text-height"></span><span>@lang('menu.taxon', array(),$session_lan)</span></a></li>
       <li class="{{ Request::segment(1) == 'iucns' ? 'active active-sub' : '' }}"><a href="{{ url('iucns/') }}"><span class="glyphicon glyphicon-italic"></span><span>@lang('menu.IUCN_threat_code', array(),$session_lan)</span></a></li>
       <li class="{{ Request::segment(1) == 'nationals' ? 'active active-sub' : '' }}"><a href="{{ url('nationals/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.national_threat_code', array(),$session_lan)</span></a></li>
       <li class="{{ Request::segment(1) == 'ranges' ? 'active active-sub' : '' }}"><a href="{{ url('ranges/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.range', array(),$session_lan)</span></a></li>
       <li class="{{ Request::segment(1) == 'growth' ? 'active active-sub' : '' }}"><a href="{{ url('growth/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.growth_form', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'protected-area' ? 'active active-sub' : '' }}"><a href="{{ url('protected-area/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.protected_area', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'country' ? 'active active-sub' : '' }}"><a href="{{ url('country/') }}"><span class="glyphicon glyphicon-flag"></span><span>@lang('menu.country', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'forest' ? 'active active-sub' : '' }}"><a href="{{ url('forest/') }}"><span class="glyphicon glyphicon-grain"></span><span>@lang('menu.forest_use', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'water' ? 'active active-sub' : '' }}"><a href="{{ url('water/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.water_use', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'endenism' ? 'active active-sub' : '' }}"><a href="{{ url('endenism/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.endenism', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'admin-unit' ? 'active active-sub' : '' }}"><a href="{{ url('admin-unit/') }}"><span class="glyphicon glyphicon-font"></span><span>@lang('menu.admin_unit', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'migration' ? 'active active-sub' : '' }}"><a href="{{ url('migration/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.migration', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'method' ? 'active active-sub' : '' }}"><a href="{{ url('method/') }}"><span class="glyphicon glyphicon-leaf"></span><span>@lang('menu.method', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'observation' ? 'active active-sub' : '' }}"><a href="{{ url('observation/') }}"><span class="glyphicon glyphicon-eye-open"></span><span>@lang('menu.observation', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'age' ? 'active active-sub' : '' }}"><a href="{{ url('age/') }}"><span class="glyphicon glyphicon-font"></span><span>@lang('menu.age_group', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'abundance' ? 'active active-sub' : '' }}"><a href="{{ url('abundance/') }}"><span class="glyphicon glyphicon-font"></span><span>@lang('menu.abundance', array(),$session_lan)</span></a></li>
        <li class="{{ Request::segment(1) == 'breeding' ? 'active active-sub' : '' }}"><a href="{{ url('breeding/') }}"><span class="glyphicon glyphicon-bold"></span><span>@lang('menu.breeding', array(),$session_lan)</span></a></li>
          </ul>
        </li>
       <?php } ?>
           <?php if($role!='guest'){?>
         <li class="treeview" >
          <a href="#">
            <i class="glyphicon glyphicon-wrench"></i>
            <span>@lang('menu.manage_masters', array(),$session_lan)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           @php
           $arra1=array('observer','species','gazetteer');
           //print_r($arra);
          @endphp

        <ul class="treeview-menu" style="<?php if(in_array(Request::segment(1),$arra1)){ echo "display: block";} ?>">
      <li class="{{ Request::segment(1) == 'species'? 'active' : '' }}"><a href="{{ url('species/') }}"><span class="glyphicon glyphicon-globe"></span>  <span>@lang('menu.species', array(),Session::get('language_val'))</span></a></li> 
      <li class="{{ Request::segment(1) == 'gazetteer'? 'active' : '' }}"><a href="{{ url('gazetteer/') }}"><span class="glyphicon glyphicon-fire"></span>  <span> @lang('menu.gazetteer', array(),$session_lan)</span></a></li>  
      <li class="{{ Request::segment(1) == 'observer'? 'active' : '' }}"><a href="{{ url('observer/') }}"><span class="glyphicon glyphicon-eye-open"></span> <span>@lang('menu.observer', array(),$session_lan)</span></a></li>  
          </ul>
        </li>
  
      <li class="{{ Request::segment(1) == 'user-management' ? 'active' : '' }}"><a href="{{ url('user-management/') }}"><i class="fa fa-users"></i> <span>@lang('menu.manage_users', array(),$session_lan)</span></a></li> 
  <?php } ?> 
       
      <li class="{{ Request::segment(1) == 'changepasswords' ? 'active' : '' }}"><a href="{{ url('changepasswords/create') }}"><span class="glyphicon glyphicon-lock"></span>  <span> @lang('menu.change_password', array(),$session_lan)</span></a></li> 
       <?php if($role!='guest'){?>
      <li class="{{ Request::segment(1) == 'searchresult' ? 'active' : '' }}"><a href="{{ url('searchresult') }}"><span class="glyphicon glyphicon-search"></span>  <span> @lang('menu.searchresult', array(),$session_lan)</span></a></li> 
       <?php } ?>
      <li class=""><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>  <span>@lang('menu.sign_out', array(),$session_lan) </span></a></li> 
      
   
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


