@extends('layouts.app-template')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Dashboard</h1>
<div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
<a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
<?php $link = route('home'); ?>
@for($i = 1; $i <= count(Request::segments()); $i++) 
@if($i < count(Request::segments()) & $i > 0) <?php
$link .= "/" . Request::segment($i);
$arra = explode('/', $link);
$urls = $arra[0] . '//' . $arra[1] . $arra[2] . '/' . $arra[4];
?> 
<a href="<?= $urls ?>" class="btn btn-success visible-lg-block visible-md-block">{{ucfirst(Request::segment($i))}}</a> 
@else 
@endif 
@endfor
</div>
</section>
@yield('action-content')
<!-- /.content -->
</div>
@endsection



