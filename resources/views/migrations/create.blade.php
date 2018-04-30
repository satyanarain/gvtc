@extends('migrations.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.migration', array(),Session::get('language_val'))</h3>
               <div class="pull-right">
<a href="{{ route('migration.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.add', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('migration.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('migration_title') ? ' has-error' : '' }} col-md-6 required">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.migration', array(),Session::get('language_val'))</label>
                  <input type="text" name="migration_title" value="{{ old('migration_title') }}" required  class="form-control" id="migration_title" placeholder="Migration">
                 @if ($errors->has('migration_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('migration_title') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('birds_migrating_population') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.birds_migrating_populations', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="birds_migrating_population" value="{{ old('birds_migrating_population') }}" required  class="form-control" id="birds_migrating_population" placeholder="Birds Migrating Populations">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birds_migrating_population') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  
           
                  
                  <div class="form-group{{ $errors->has('birds_migrating_population_fr') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.birds_migrating_populations', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="birds_migrating_population_fr" value="{{ old('birds_migrating_population_fr') }}" required  class="form-control" id="birds_migrating_population_fr" placeholder="Birds Migrating Populations (French)">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birds_migrating_population') }}</strong>
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
