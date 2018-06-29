@extends('report_category.base')
@section('action-content')
<section class="content">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<!-- general form elements -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) Report Category</h3>
        <div class="pull-right">
            <a href="{{ route('reportcategory.index') }}" class="btn btn-default">
                <span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
        </div>
    </div>
<!-- /.box-header -->
    <!-- form start -->
<form role="form" method="POST" action="{{ route('reportcategory.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
<div class="box-body">

<div class="form-row">

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} col-md-6 required">
         <span class="lang-sm" lang="en"></span>&nbsp;
        <label for="exampleInputEmail1"  class="control-label">@lang('menu.title', array(),Session::get('language_val'))</label>
        <input type="text" name="title" value="{{ old('title') }}" required  class="form-control" id="title" placeholder="Title">
        @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    </div>


    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-6 required">
         <span class="lang-sm" lang="en"></span>&nbsp;
        <label for="exampleInputEmail1" class="control-label">@lang('menu.description', array(),Session::get('language_val'))</label>
        <input type="textarea" name="description" value="{{ old('description') }}" required  class="form-control" id="description" placeholder="Description">
        @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
        @endif
    </div>

</div>
<div class="form-row">

    <div class="form-group{{ $errors->has('title_fr') ? ' has-error' : '' }} col-md-6 required">
         <span class="lang-sm" lang="fr"></span>&nbsp;
        <label for="exampleInputEmail1"  class="control-label">@lang('menu.title', array(),Session::get('language_val'))</label>
        <input type="text" name="title_fr" value="{{ old('title_fr') }}" required  class="form-control" id="title" placeholder="Title (French)">
        @if ($errors->has('title_fr'))
        <span class="help-block">
            <strong>{{ $errors->first('title_fr') }}</strong>
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
