@extends('layouts.app-template')
<?php $session_lan= Session::get('language_val'); ?>  
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>404 Error Page</h1>



</section>
@yield('action-content')
<!-- /.content -->
</div>
@endsection



