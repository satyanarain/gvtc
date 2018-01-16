@extends('layouts.app-template')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Manage Growth Forms</h1>
<!-- <ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
<li class="active">User Mangement</li>
</ol>-->
<!--     <ul class="page-breadcrumb"> <li> <i class="fa fa-home"></i> <a href="{{route('home')}}">Home</a>
<i class="fa fa-angle-right"></i>
  </li> <?php $link = route('home'); ?> @for($i = 1; $i <= count(Request::segments()); $i++) <li>
     @if($i < count(Request::segments()) & $i > 0) <?php
        $link .= "/" . Request::segment($i);
        $arra = explode('/', $link);
        $url = $arra[0] . '//' . $arra[1] . $arra[2] . '/' . $arra[4];
        ?> 
     <a href="<?= $url ?>">{{Request::segment($i)}}</a> 
     {!!'<i class="fa fa-angle-right"></i>'!!} @else {{Request::segment($i)}} @endif 
    </li>
  @endfor </ul> -->
<div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
<a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
<?php $link = route('home'); ?>
@for($i = 1; $i <= count(Request::segments()); $i++) 
@if($i < count(Request::segments()) & $i > 0) <?php
$link .= "/" . Request::segment($i);
$arra = explode('/', $link);
$urls = $arra[0] . '//' . $arra[1] . $arra[2] . '/' . $arra[4];
?> 
<!-- <a href="#" class="btn btn-success visible-lg-block visible-md-block">Snippets</a>
<a href="#" class="btn btn-success visible-lg-block visible-md-block">Breadcrumbs text</a>
 <a href="#" class="btn btn-success visible-lg-block visible-md-block">Section</a>
                        <a href="#" class="btn btn-success visible-lg-block visible-md-block">Category</a>
                        <div class="btn btn-default visible-xs-block hidden-xs visible-sm-block ">...</div>
                        <div class="btn btn-primary"><b>Item Actual</b></div>-->
<a href="<?= $urls ?>" class="btn btn-success visible-lg-block visible-md-block">{{ucfirst(Request::segment($i))}}</a> 
@else <div class="btn btn-success">{{ucfirst(Request::segment($i))}}</div>
@endif 
@endfor
</div>


        <!--        <div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
                   <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
                    <a href="#" class="btn btn-success visible-lg-block visible-md-block">Snippets</a>
                    <a href="#" class="btn btn-success visible-lg-block visible-md-block">Breadcrumbs text</a>
                    <a href="#" class="btn btn-success visible-lg-block visible-md-block">Section</a>
                    <a href="#" class="btn btn-success visible-lg-block visible-md-block">Category</a>
                    <div class="btn btn-default visible-xs-block hidden-xs visible-sm-block ">...</div>
                    <div class="btn btn-primary"><b>Item Actual</b></div>     
                
                  </div>-->
</section>
@yield('action-content')
<!-- /.content -->
</div>
@endsection



