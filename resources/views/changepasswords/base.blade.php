@extends('layouts.app-template')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>@lang('menu.manage_password', array(),Session::get('language_val'))</h1>
<div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
<a href="/home" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
<?php 
$link = route('home');
$count=0;
?>
@for($i = 1; $i <= count(Request::segments()); $i++) 
@if($i < count(Request::segments()) & $i > 0) <?php
$link .= "/" . Request::segment($i);
$arra = explode('/', $link);
$urls = $arra[0] . '//' . $arra[1] . $arra[2] . '/' . $arra[4];
 
if(is_numeric(Request::segment($i))){ 
    
}else{
     $title = str_replace('changepasswords','Change Password',(Request::segment($i)));
     $title = str_replace('create','Change Password',$title);
?> 
<a href="#" class="btn btn-success visible-lg-block visible-md-block ">
    
     {{ title_case($title) }}
</a> 
<?php } ?>
@else 
<?php 
    if(is_numeric(Request::segment($i))){ 
    
}else{
    $title = str_replace('changepasswords','Change Password',(Request::segment($i)));
     $title = str_replace('create','Change Password',$title);
?> 
    
<!--<div class="btn btn-primary btn-success">-->

    
<!--    {{ title_case($title) }}-->
<!--    </div>-->
    
   <?php
}

?>  

@endif 
<?php $count++; ?>
@endfor
</div>
</section>
@yield('action-content')
<!-- /.content -->
</div>
@endsection



