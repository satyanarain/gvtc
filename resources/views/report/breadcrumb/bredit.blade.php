@extends('../layouts.app-template')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Manage Reports</h1>
<div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
<a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
<a href="{{ url('report/uploadreport/') }}" class="btn btn-success visible-lg-block visible-md-block ">Report</a> 
<div class="btn btn-primary btn-success">Edit</div>
</div>
</section>
@yield('action-content')
<!-- /.content -->
</div>
@endsection



