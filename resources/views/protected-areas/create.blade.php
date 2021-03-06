@extends('protected-areas.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.protected_area', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('protected-area.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('protected-area.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                
                 
                    
                   <div class="form-group{{ $errors->has('protected_area_name') ? ' has-error' : '' }} col-md-6 required">
                     <span class="lang-sm" lang="en"></span>  
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.protected_area_name', array(),Session::get('language_val'))</label>
                  <input type="text" name="protected_area_name" value="{{ old('protected_area_name') }}" required   class="form-control" id="range" placeholder="Protected Area Name">
                 @if ($errors->has('protected_area_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protected_area_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                    
                    
                  
                  <div class="form-group col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  {!! Form::label('Country',Lang::get('menu.country',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('country',$countryrecodsql,null,['class'=>'form-control','placeholder'=>'Select Country','required'=>'required']) !!} 
                  </div>  
                  
                </div> 
                  
                  
                   <div class="form-row">
                 <div class="form-group{{ $errors->has('protected_area_code') ? ' has-error' : '' }} col-md-6 required">
                  <span class="lang-sm" lang="en"></span>
                     <label for="exampleInputEmail1" class="control-label">@lang('menu.protected_area_code', array(),Session::get('language_val'))</label>
                  <input type="text" name="protected_area_code" value="{{ old('protected_area_code') }}" required  class="form-control" id="protected_area_code" placeholder="Protected Area Code">
                 @if ($errors->has('protected_area_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protected_area_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  <div class="form-group{{ $errors->has('protected_area_name_fr') ? ' has-error' : '' }} col-md-6 required">
                     <span class="lang-sm" lang="fr"></span>  
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.protected_area_name', array(),Session::get('language_val'))</label>
                  <input type="text" name="protected_area_name_fr" value="{{ old('protected_area_name_fr') }}" required   class="form-control" id="protected_area_name_fr" placeholder="Protected Area Name (Freanch)">
                 @if ($errors->has('protected_area_name_fr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protected_area_name_fr') }}</strong>
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
