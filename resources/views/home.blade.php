@extends('layouts.dashboardbase')
@section('action-content')
<?php
$species=DB::table('species')->get();
$species_record=count($species);
$gazetteer=DB::table('gazetteers')->get();
$gazetteer_record=count($gazetteer);
$observers=DB::table('observers')->get();
$observer_record=count($observers);     
$users=DB::table('users')->WHERE('status','1')->get();
$users_record=count($users); 
$roll=Auth::user()->role;
$users=DB::table('users')->WHERE('id','1')->get();
//$roll=="guest";

?>
@include('partials.message')
 <!-- Main content -->
<?php if($roll=="guest") { ?>

 <section class="content">
     
  
     <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Search Log</h3>
        </div>
         
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="javascript:DownloadAndRedirect()" data-placement="top" data-toggle="tooltip" data-original-title="Refresh"><span class="glyphicon glyphicon-refresh"></span>&nbsp;Refresh</a>
        </div>
         
    </div>
  </div> 
     
  
  
     
      <!-- Small boxes (Stat box) -->
    
 <div class="box-body">
<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">id</th> 
                  <th>Search Criteria</th>
                  <th>Search Date</th>
                  <th class="action">Action</th>
           </tr>
                </thead>
                <tbody>
                  <?php 
     $userid=Auth::user()->id;
    
    $searchrtsql= DB::table('searchresult')->where('uesrid', $userid)->where('status', 1)->get();
    
 
  //$sql = DB::table('species')->where('taxon_id', $taxon_id)->get();
 foreach($searchrtsql as $searchdata){    
   if($searchdata->serchurl){
    $datadate=explode(" ",$searchdata->created_at);
    $searchdatak=explode("=",$searchdata->serchurl);
    $exdate=explode('-',$datadate[0]);
    $currentdate= $exdate[2].'-'.$exdate[1].'-'.$exdate[0];
    //echo '<pre>';
    //print_r($exdate);
   
?>   
       
                
              
                  <tr>
                   <td style="display:none">{{ $searchdata->id }}</td>    
                  <td><?php echo rtrim($searchdatak[2],"%20"); ?></td>
                  <td><?php echo $currentdate; ?></td>
                  <?php if($searchdata->adminaprovel==1){ ?>
        <td><a href="<?php echo $searchdata->serchurl; ?>" class="btn btn-success" data-placement="top" data-toggle="tooltip"  target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Download</a>
                  </td>
                  <?php }else{ ?>
        <td><a href="#" style="padding-left:20px;padding-right:20px;" class="btn btn-danger"><i class="fa fa-ban glyphicon"></i> Pending</a></td>
                  <?php } ?>
                  </tr>
                
 <?php } } ?>           
              
              
                </tbody>
                
              </table>  
                    
                    





 
  </section>
      <!-- /.row -->
      
      <!-- Main row -->
     
      <!-- /.row (main row) -->

  
 <?php }else{
   
     
     ?>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$species_record}}</h3>

             <p style="font-weight:bold">@lang('menu.species', array(),Session::get('language_val'))</p>
            </div>
            <div class="icon">
             <i class="fa fa-paw"></i>
            </div>
            <a href="{{ url('species/') }}" class="small-box-footer">@lang('menu.click_here', array(),Session::get('language_val')) <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$gazetteer_record}}<sup style="font-size: 20px"></sup></h3>

              <p style="font-weight:bold">@lang('menu.gazetteer', array(),Session::get('language_val'))</p>
            </div>
            <div class="icon">
              <i class="fa fa-map"></i>
            </div>
            <a href="{{ url('gazetteer/') }}" class="small-box-footer">@lang('menu.click_here', array(),Session::get('language_val')) <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$users_record}}</h3>

            <p style="font-weight:bold">@lang('menu.active_users', array(),Session::get('language_val')) </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('user-management/') }}" class="small-box-footer">@lang('menu.click_here', array(),Session::get('language_val')) <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$observer_record}}</h3>

              <p style="font-weight:bold">@lang('menu.observers', array(),Session::get('language_val'))</p>
            </div>
            <div class="icon">
              <i class="fa fa-eye"></i>
            </div>
            <a href="{{ url('observer/') }}" class="small-box-footer">@lang('menu.click_here', array(),Session::get('language_val')) <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
       
         <!-- /.col -->
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.image_gallery', array(),Session::get('language_val'))</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                      <img src="{{ asset('images/slide2.jpg') }}" alt="First slide"/> 
                   

<!--                    <div class="carousel-caption">
                      First Slide
                    </div>-->
                  </div>
                  <div class="item">
                    <img src="{{ asset('images/slide1.jpg') }}" alt="Second slide">

<!--                    <div class="carousel-caption">
                      Second Slide
                    </div>-->
                  </div>
                  <div class="item">
                    <img src="{{ asset('images/slide3.jpg') }}" alt="Third slide">

<!--                    <div class="carousel-caption">
                      Third Slide
                    </div>-->
                  </div>
                     <div class="item">
                    <img src="{{ asset('images/slide4.jpg') }}" alt="Third slide">

<!--                    <div class="carousel-caption">
                      Four Slide
                    </div>-->
                  </div>
                    <div class="item">
                    <img src="{{ asset('images/slide.jpg') }}" alt="Third slide">

<!--                    <div class="carousel-caption">
                      Five Slide
                    </div>-->
                  </div>
                    
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
     
          
       <!-- </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">

          <!-- Map box -->
        
          <!-- /.box -->

          <!-- solid sales graph -->
          
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">@lang('menu.calendar', array(),Session::get('language_val'))</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
 <?php } ?>
    <!-- /.content -->
    <?php  $url='http://'.$_SERVER['HTTP_HOST'].'/'.'home';  ?>
    <script type="text/javascript">
function DownloadAndRedirect()
{

  var RedirectPauseSeconds = 0;
  location.href = "<?php echo $url; ?>";
  setTimeout("DoTheRedirect('"+RedirectURL+"')",parseInt(RedirectPauseSeconds*1000));
}
function DoTheRedirect(url) { window.location=url; }
</script>
@endsection