@extends('nationals.base')

@section('action-content')

<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.national_threat_code', array(),Session::get('language_val'))</h3>
                <div class="pull-right">
                    <a href="{{ route('nationals.index') }}" class="btn btn-default">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span>
                        &nbsp; Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




            <form role="form" method="POST" action="{{ route('nationals.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-row">

                        <div class="form-group{{ $errors->has('national_threat_code') ? ' has-error' : '' }} col-md-6 required">
                            <span class="lang-sm" lang="en"></span>
                            <label for="exampleInputEmail1"  class="control-label">@lang('menu.national_threat_code', array(),Session::get('language_val')) </label>
                            <input type="text" name="national_threat_code" value="{{ old('national_threat_code') }}" required  class="form-control" id="national_threat_code" placeholder="National Threat Code">
                            @if ($errors->has('iucn_threat_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('national_threat_code') }}</strong>
                            </span>
                            @endif
                        </div>  


                        <div class="form-group{{ $errors->has('national_threat_code_description') ? ' has-error' : '' }} col-md-6 required">
                            <span class="lang-sm" lang="en"></span>
                            <label for="exampleInputEmail1"  class="control-label">@lang('menu.national_threat_code', array(),Session::get('language_val')) @lang('menu.description', array(),Session::get('language_val')) </label>
                            <input type="textarea" name="national_threat_code_description" value="{{ old('national_threat_code_description') }}" required  class="form-control" id="national_threat_code_description" placeholder="National Threat Code Description">
                            @if ($errors->has('national_threat_code_description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('national_threat_code_description') }}</strong>
                            </span>
                            @endif
                        </div>  

                    </div> 
                    
                    <div class="form-row">
                    <div class="form-group{{ $errors->has('national_threat_code_description_fr') ? ' has-error' : '' }} col-md-6 required">
                        <span class="lang-sm" lang="fr"></span>
                            <label for="exampleInputEmail1"  class="control-label">@lang('menu.national_threat_code', array(),Session::get('language_val')) @lang('menu.description', array(),Session::get('language_val')) </label>
                            <input type="textarea" name="national_threat_code_description_fr" value="{{ old('national_threat_code_description_fr') }}" required  class="form-control" id="national_threat_code_description" placeholder="National Threat Code Description (French)">
                            @if ($errors->has('national_threat_code_description_fr'))
                            <span class="help-block">
                                <strong>{{ $errors->first('national_threat_code_description_fr') }}</strong>
                            </span>
                            @endif
                        </div>  

                    </div>
                    <div class="form-group col-md-6">
                        <input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
                    </div>   
                </div>    
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
