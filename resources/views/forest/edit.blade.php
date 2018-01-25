@extends('forest.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Forest Used</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($forests, ['method' => 'PATCH','route' => ['forest.update', $forests['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('forest_use') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Forest Used</label>
                  <input type="text" name="forest_use" value="{{ $forests->forest_use }}" required  class="form-control" id="forest_use" placeholder="Forest Used">
                 @if ($errors->has('forest_use'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('forest_use') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('forest_habitat_usage') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Forest Habitat Usage</label>
                  <input type="text" name="forest_habitat_usage" value="{{ $forests->forest_habitat_usage }}" required  class="form-control" id="forest_habitat_usage" placeholder="Forest Habitat Usage">
                 @if ($errors->has('forest_habitat_usage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('forest_habitat_usage') }}</strong>
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


