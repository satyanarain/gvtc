@extends('growths.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.update', array(),Session::get('language_val')) @lang('menu.growth_form', array(),Session::get('language_val'))</h3>
               <div class="pull-right">
<a href="{{ route('growth.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($growth, ['method' => 'PATCH','route' => ['growth.update', $growth['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('range') ? ' has-error' : '' }} col-md-6 required">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.growth_form_field', array(),Session::get('language_val'))</label>
                  <input type="text" name="growth_form" value="{{ $growth->growth_form }}" required  class="form-control" id="growth_form" placeholder="Range">
                 @if ($errors->has('range'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('growth_form') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('range_within_the_albertine_rift') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">Plants Growth Form</label>
                  <input type="textarea" name="plants_growth_form" value="{{ $growth->plants_growth_form }}" required  class="form-control" id="plants_growth_form" placeholder="Plants Growth Form">
                 @if ($errors->has('plants_growth_form'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plants_growth_form') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                   
                 <div class="form-row">
                  
                 
                  
                  
                  <div class="form-group{{ $errors->has('plants_growth_form_fr') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1" class="control-label">Plants Growth Form</label>
                  <input type="textarea" name="plants_growth_form_fr" value="{{ $growth->plants_growth_form_fr }}" required  class="form-control" id="plants_growth_form_fr" placeholder="Plants Growth Form (French)">
                 @if ($errors->has('plants_growth_form_fr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plants_growth_form_fr') }}</strong>
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


