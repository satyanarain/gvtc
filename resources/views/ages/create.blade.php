@extends('ages.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.age_group', array(),Session::get('language_val'))</h3>
                 <div class="pull-right">
<a href="{{ route('age.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('age.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('age_group') ? ' has-error' : '' }} col-md-6 required">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.age_group', array(),Session::get('language_val'))</label>
                  <input type="text" name="age_group" value="{{ old('age_group') }}" required  class="form-control" id="water_use" placeholder="Age Group">
                 @if ($errors->has('age_group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age_group') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('code_description') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="text" name="code_description" value="{{ old('code_description') }}" required  class="form-control" id="code_description" placeholder="Code Description">
                 @if ($errors->has('code_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code_description') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                
                  
                  
                  <div class="form-group{{ $errors->has('code_description_fr') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="text" name="code_description_fr" value="{{ old('code_description_fr') }}" required  class="form-control" id="code_description_fr" placeholder="Code Description (french)">
                 @if ($errors->has('code_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code_description_fr') }}</strong>
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
