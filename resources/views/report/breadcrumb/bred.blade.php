@extends('../layouts.app-template')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>@lang('menu.upload_reports', array(),Session::get('language_val'))</h1>
<div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
<a href="/home" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
<div class="btn btn-primary btn-success">
@lang('menu.report', array(),Session::get('language_val'))</div>
</div>
</section>
@yield('action-content')
<!-- /.content -->
</div>
@endsection



