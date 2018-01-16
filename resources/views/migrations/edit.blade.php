@extends('migrations.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">List of Water Use</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($migrations, ['method' => 'PATCH','route' => ['migration.update', $migrations['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
    <?php //print_r($migrations);die; ?>        
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('migration_title') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Migration</label>
                  <input type="text" name="migration_title" value="{{ $migrations->migration_title }}" required  class="form-control" id="country" placeholder="Migration">
                 @if ($errors->has('migration_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('migration_title') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('birds_migrating_population') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Birds Migrating Populations</label>
                  <input type="text" name="birds_migrating_population" value="{{ $migrations->birds_migrating_population }}" required  class="form-control" id="birds_migrating_population" placeholder="Birds Migrating Populations">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birds_migrating_population') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   
                  
                  
                  
                  
                  
                 
                  
                </div> 
                   
                   
                  
              </div>    
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">Update</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


