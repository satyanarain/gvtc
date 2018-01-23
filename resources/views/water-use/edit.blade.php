@extends('water-use.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Water</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($waters, ['method' => 'PATCH','route' => ['water.update', $waters['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('water_use') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Forest Use</label>
                  <input type="text" name="water_use" value="{{ $waters->water_use }}" required  class="form-control" id="water_use" placeholder="Water Use">
                 @if ($errors->has('water_use'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('water_use') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('water_habitat_usage') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Forest Habitat Usage</label>
                  <input type="text" name="water_habitat_usage" value="{{ $waters->water_habitat_usage }}" required  class="form-control" id="water_habitat_usage" placeholder="Water/wetland habitat usage">
                 @if ($errors->has('water_habitat_usage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('water_habitat_usage') }}</strong>
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


