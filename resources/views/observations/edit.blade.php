@extends('observations.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Observation</h3>
              <div class="pull-right">
<a href="{{ route('observation.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php //print_r($observartion); die; ?>
{!! Form::model($observartion, ['method' => 'PATCH','route' => ['observation.update', $observartion['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('observation_code') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.observation_code', array(),Session::get('language_val'))</label>
                  <input type="text" name="observation_code" value="{{ $observartion->observation_code }}" required  class="form-control" id="observation_code" placeholder="Method Code">
                 @if ($errors->has('method_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observation_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('code_description') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="text" name="code_description" value="{{ $observartion->code_description }}" required  class="form-control" id="water_habitat_usage" placeholder="Code Description">
                 @if ($errors->has('code_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code_description') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
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


