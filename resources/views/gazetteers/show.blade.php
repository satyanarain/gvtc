@extends('gazetteers.base')
@section('action-content')
<?php //print_r($gazetteers); die; ?>
<section class="content">
<div class="row">
        <!-- left column -->
<div class="col-md-12">
<!-- general form elements -->
<div class="box box-success">
<div class="box-header with-border">
<h3 class="box-title">View Gazetteer</h3>
<div class="pull-right">
<a href="{{ route('gazetteer.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
</div>
    <!-- /.box-header -->
<!-- form start -->
<div class="box-body">
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.country', array(),$session_lan= Session::get('language_val'))</label>
<input type="text" readonly  value="{{ $gazetteers->range_code}}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.place', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->place }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.details', array(),$session_lan= Session::get('language_val')) </label>
<input type="text" readonly  value="{{ $gazetteers->details }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.eastings', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->eastings }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.northings', array(),$session_lan= Session::get('language_val'))</label>
<input type="text" readonly  value="{{ $gazetteers->northings }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.zone', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->zone }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Datum</label>
<input type="text" readonly  value="{{ $gazetteers->datum }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.longitude', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->longitude }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.latitude', array(),$session_lan= Session::get('language_val'))</label>
<input type="text" readonly  value="{{ $gazetteers->latitude }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.day', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->day }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.month', array(),$session_lan= Session::get('language_val'))</label>
<input type="text" readonly  value="{{ $gazetteers->month }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.year', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->year }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.habitat', array(),$session_lan= Session::get('language_val'))</label>
<input type="text" readonly  value="{{ $gazetteers->habitat }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.altitude', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->altitude }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.slope', array(),$session_lan= Session::get('language_val')) </label>
<input type="text" readonly  value="{{ $gazetteers->slope }}"  class="form-control" >
 </div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.aspect', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->aspect }}" readonly=""  class="form-control">
</div>  
</div>
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.soil', array(),$session_lan= Session::get('language_val')) </label>
<input type="text" readonly  value="{{ $gazetteers->soil }}"  class="form-control" >
 </div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.protected_area', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->protected_area_name}}" readonly=""  class="form-control">
</div>  
</div>
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">@lang('menu.admin_unit', array(),$session_lan= Session::get('language_val'))</label>
<input type="text" readonly  value="{{ $gazetteers->admincode }}"  class="form-control" >
 </div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">@lang('menu.remarks', array(),$session_lan= Session::get('language_val'))</label>
<input  value="{{ $gazetteers->remarks }}" readonly=""  class="form-control">
</div>  
</div>    
</div>    
<!-- /.box-body -->
</div>
</div>
 </div>
<!-- /.row -->
</section>
@endsection


