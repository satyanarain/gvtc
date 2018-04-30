@extends('ranges.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.range', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('ranges.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('ranges.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('range') ? ' has-error' : '' }} col-md-6 required">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.range', array(),Session::get('language_val'))</label>
                  <input type="text" name="range_code" value="{{ old('range') }}" required  class="form-control" id="range" placeholder="Range">
                 @if ($errors->has('range'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('range_within_the_albertine_rift') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.range', array(),Session::get('language_val')) @lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="textarea" name="range_within_the_albertine_rift" value="{{ old('range_within_the_albertine_rift') }}" required  class="form-control" id="range_within_the_albertine_rift" placeholder="Range Code Description">
                 @if ($errors->has('range_within_the_albertine_rift'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_within_the_albertine_rift') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  
               
                  
                  
                  <div class="form-group{{ $errors->has('range_within_the_albertine_rift_fr') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.range', array(),Session::get('language_val')) @lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="textarea" name="range_within_the_albertine_rift_fr" value="{{ old('range_within_the_albertine_rift_fr') }}" required  class="form-control" id="range_within_the_albertine_rift_fr" placeholder="Range Code Description (French)">
                 @if ($errors->has('range_within_the_albertine_rift_fr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_within_the_albertine_rift_fr') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                  
                  
             <div class="form-group col-md-6">
            <input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
</div> </div>    
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
