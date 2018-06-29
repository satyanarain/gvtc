@extends('breeding.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Breeding</h3>
              <div class="pull-right">
<a href="{{ route('breeding.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('breeding.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('breeding_code') ? ' has-error' : '' }} col-md-6 required">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.breeding', array(),Session::get('language_val')) @lang('menu.code', array(),Session::get('language_val'))</label>
                  <input type="text" name="breeding_code" value="{{ old('breeding_code') }}" required  class="form-control" id="breeding_code" placeholder="Bredding Code">
                 @if ($errors->has('breeding_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('breeding_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('breeding_description') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.breeding', array(),Session::get('language_val')) @lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="textarea" name="breeding_description" value="{{ old('breeding_description') }}" required  class="form-control" id="breeding_description" placeholder="Breeding Code Description">
                 @if ($errors->has('breeding_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('breeding_description') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div>
                  
                   <div class="form-row">
               
                  
                  
                  <div class="form-group{{ $errors->has('breeding_description_fr') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.breeding', array(),Session::get('language_val')) @lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="textarea" name="breeding_description_fr" value="{{ old('breeding_description_fr') }}" required  class="form-control" id="breeding_description_fr" placeholder="Breeding Code Description (French)">
                 @if ($errors->has('breeding_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('breeding_description_fr') }}</strong>
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
