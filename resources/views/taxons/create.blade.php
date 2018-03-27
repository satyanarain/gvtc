@extends('taxons.base')
@section('action-content')
<section class="content">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<!-- general form elements -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.taxon', array(),Session::get('language_val'))</h3>
        <div class="pull-right">
            <a href="{{ route('taxons.index') }}" class="btn btn-default">
                <span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
        </div>
    </div>
<!-- /.box-header -->
    <!-- form start -->
<form role="form" method="POST" action="{{ route('taxons.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
<div class="box-body">

<div class="form-row">

    <div class="form-group{{ $errors->has('taxon_code') ? ' has-error' : '' }} col-md-6 required">
        <label for="exampleInputEmail1"  class="control-label">@lang('menu.taxon_code', array(),Session::get('language_val'))</label>
        <input type="text" name="taxon_code" value="{{ old('taxon_code') }}" required  class="form-control" id="taxon_code" placeholder="Taxon Code">
        @if ($errors->has('taxon_code'))
        <span class="help-block">
            <strong>{{ $errors->first('taxon_code') }}</strong>
        </span>
        @endif
    </div>


    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 required">
        <label for="exampleInputEmail1" class="control-label">@lang('menu.taxon_code_description', array(),Session::get('language_val'))</label>
        <input type="textarea" name="taxon_code_description" value="{{ old('taxon_code_description') }}" required  class="form-control" id="taxon_code_description" placeholder="Taxon Code Description">
        @if ($errors->has('taxon_code_description'))
        <span class="help-block">
            <strong>{{ $errors->first('taxon_code_description') }}</strong>
        </span>
        @endif
    </div>

</div>
<div class="form-group col-md-6">
    <input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
</div></div>
<!-- /.box-body -->

<div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">@lang('menu.save', array(),Session::get('language_val'))</button>
            </div>
        </form>
    </div>


</div>

</div>
<!-- /.row -->
</section>



@endsection
