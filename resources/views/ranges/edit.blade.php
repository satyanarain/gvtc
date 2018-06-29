@extends('ranges.base')
@section('action-content')
<section class="content">
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.range', array(),Session::get('language_val'))</h3>
               <div class="pull-right">
<a href="{{ route('ranges.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($range, ['method' => 'PATCH','route' => ['ranges.update', $range['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('range_code') ? ' has-error' : '' }} col-md-6 required">
                     <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.range', array(),Session::get('language_val'))</label>
                  <input type="text" name="range_code" value="{{ $range->range_code }}" required  class="form-control" id="taxon_code" placeholder="Range">
                 @if ($errors->has('range_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('range_within_the_albertine_rift') ? ' has-error' : '' }} col-md-6 required">
                       <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.range', array(),Session::get('language_val')) @lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="textarea" name="range_within_the_albertine_rift" value="{{ $range->range_within_the_albertine_rift }}" required  class="form-control" id="taxon_code_description" placeholder="Range Code Description">
                 @if ($errors->has('range_within_the_albertine_rift'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_within_the_albertine_rift') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                   
                 <div class="form-row">
               
                  
                  
                  <div class="form-group{{ $errors->has('range_within_the_albertine_rift_fr') ? ' has-error' : '' }} col-md-6 required">
                       <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.range', array(),Session::get('language_val')) @lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="textarea" name="range_within_the_albertine_rift_fr" value="{{ $range->range_within_the_albertine_rift_fr }}" required  class="form-control" id="range_within_the_albertine_rift_fr" placeholder="Range Code Description (French)">
                 @if ($errors->has('range_within_the_albertine_rift'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_within_the_albertine_rift_fr') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div>   
                   
                   
                  
                  
              </div>    
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">@lang('menu.update', array(),Session::get('language_val'))</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


