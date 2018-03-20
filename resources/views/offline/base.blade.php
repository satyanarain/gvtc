@extends('layouts.app-template')

@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Manage Offline Records</h1>
<div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
<a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
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
?> 
<a href="<?= $urls ?>" class="btn btn-success visible-lg-block visible-md-block ">
    {{ title_case(str_replace('offlinerecord','Manage Offline Record',(Request::segment($i)))) }}
</a> 
<?php } ?>
@else 
<?php 
    if(is_numeric(Request::segment($i))){ 
    
}else{
    ?>
<div class="btn btn-primary btn-success">

    
    {{ title_case(str_replace('offlinerecord','Manage Offline Record',(Request::segment($i)))) }}
    </div>
    
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



