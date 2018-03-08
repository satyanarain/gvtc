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
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back</a>
</div>
</div>
    <!-- /.box-header -->
<!-- form start -->
<div class="box-body">
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Country</label>
<input type="text" readonly  value="{{ $gazetteers->range_code}}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Place</label>
<input  value="{{ $gazetteers->place }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Details </label>
<input type="text" readonly  value="{{ $gazetteers->details }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Eastings</label>
<input  value="{{ $gazetteers->eastings }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Northings</label>
<input type="text" readonly  value="{{ $gazetteers->northings }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Zone</label>
<input  value="{{ $gazetteers->zone }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Datum</label>
<input type="text" readonly  value="{{ $gazetteers->datum }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Longitude</label>
<input  value="{{ $gazetteers->longitude }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Latitude</label>
<input type="text" readonly  value="{{ $gazetteers->latitude }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Day</label>
<input  value="{{ $gazetteers->day }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Month</label>
<input type="text" readonly  value="{{ $gazetteers->month }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Year</label>
<input  value="{{ $gazetteers->year }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Habitat</label>
<input type="text" readonly  value="{{ $gazetteers->habitat }}"  class="form-control" >
</div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Altitude</label>
<input  value="{{ $gazetteers->altitude }}" readonly=""  class="form-control">
</div>  
</div> 
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Slope </label>
<input type="text" readonly  value="{{ $gazetteers->slope }}"  class="form-control" >
 </div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Aspect</label>
<input  value="{{ $gazetteers->aspect }}" readonly=""  class="form-control">
</div>  
</div>
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Soil </label>
<input type="text" readonly  value="{{ $gazetteers->soil }}"  class="form-control" >
 </div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Protected Area</label>
<input  value="{{ $gazetteers->protected_area_name}}" readonly=""  class="form-control">
</div>  
</div>
<div class="form-row">
<div class=" col-md-6">
<label for="exampleInputEmail1">Admin Unit</label>
<input type="text" readonly  value="{{ $gazetteers->admincode }}"  class="form-control" >
 </div>  
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Remarks</label>
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


