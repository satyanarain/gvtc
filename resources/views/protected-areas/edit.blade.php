@extends('protected-areas.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.update', array(),Session::get('language_val')) @lang('menu.protected_area', array(),Session::get('language_val'))</h3>
                <div class="pull-right">
<a href="{{ route('protected-area.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($protectedarea, ['method' => 'PATCH','route' => ['protected-area.update', $protectedarea['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                 
                    
                    <div class="form-group{{ $errors->has('protected_area_name') ? ' has-error' : '' }} col-md-6 required">
                        <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.protected_area_name', array(),Session::get('language_val'))</label>
                  <input type="text" name="protected_area_name" value="{{ $protectedarea->protected_area_name }}"   class="form-control" id="protected_area_name" placeholder="Protected Area Name">
                 @if ($errors->has('protected_area_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protected_area_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                    
                    
                 
                  
                  
                  <div class="form-group col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                   {!! Form::label('Country',Lang::get('menu.country',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('country',$countryrecodsql,isset($protectedarea->country) ? $protectedarea->country : selected,['class'=>'form-control','placeholder'=>'Select Country','required'=>'required']) !!}  
                  </div>  
                  
                </div> 
                  
                   
                  
                  <div class="form-group{{ $errors->has('protected_area_code') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.protected_area_code', array(),Session::get('language_val'))</label>
                  <input type="text" name="protected_area_code" value="{{ $protectedarea->protected_area_code }}" required  class="form-control" id="protected_area_code" placeholder="Protected Area Code">
                 @if ($errors->has('range'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protected_area_code') }}</strong>
                                    </span>
                                @endif
                  </div> 
                   
                   
                       <div class="form-group{{ $errors->has('protected_area_name_fr') ? ' has-error' : '' }} col-md-6 required">
                           <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.protected_area_name', array(),Session::get('language_val'))</label>
                  <input type="text" name="protected_area_name_fr" value="{{ $protectedarea->protected_area_name_fr }}"   class="form-control" id="protected_area_name_fr" placeholder="Protected Area Name (French)">
                 @if ($errors->has('protected_area_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protected_area_name_fr') }}</strong>
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


