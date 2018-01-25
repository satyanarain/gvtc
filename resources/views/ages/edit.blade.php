@extends('ages.base')

@section('action-content')
<?php //print_r($ages); die; ?>

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Age Group</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($ages, ['method' => 'PATCH','route' => ['age.update', $ages['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('age_group') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Age Group</label>
                  <input type="text" name="age_group" value="{{ $ages->age_group }}" required  class="form-control" id="age_group" placeholder="Age Group">
                 @if ($errors->has('method_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age_group') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('code_description') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Code Description</label>
                  <input type="text" name="code_description" value="{{ $ages->code_description }}" required  class="form-control" id="water_habitat_usage" placeholder="Code Description">
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
                <button type="submit" class="btn btn-primary btn-sub">Update</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


