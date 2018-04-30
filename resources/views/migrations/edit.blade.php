@extends('migrations.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Migration</h3>
              <div class="pull-right">
<a href="{{ route('migration.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($migrations, ['method' => 'PATCH','route' => ['migration.update', $migrations['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
    <?php //print_r($migrations);die; ?>        
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('migration_title') ? ' has-error' : '' }} col-md-6 required">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">Migration</label>
                  <input type="text" name="migration_title" value="{{ $migrations->migration_title }}" required  class="form-control" id="country" placeholder="Migration">
                 @if ($errors->has('migration_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('migration_title') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('birds_migrating_population') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">Birds Migrating Populations</label>
                  <input type="text" name="birds_migrating_population" value="{{ $migrations->birds_migrating_population }}" required  class="form-control" id="birds_migrating_population" placeholder="Birds Migrating Populations">
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
                  <label for="exampleInputEmail1" class="control-label">Birds Migrating Populations</label>
                  <input type="text" name="birds_migrating_population_fr" value="{{ $migrations->birds_migrating_population_fr }}" required  class="form-control" id="birds_migrating_population_fr" placeholder="Birds Migrating Populations">
                 @if ($errors->has('birds_migrating_population_fr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birds_migrating_population_fr') }}</strong>
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


