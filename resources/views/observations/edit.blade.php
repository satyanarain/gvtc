@extends('methods.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">List of Method</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($methods, ['method' => 'PATCH','route' => ['method.update', $methods['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('method_code') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Method Code</label>
                  <input type="text" name="method_code" value="{{ $methods->method_code }}" required  class="form-control" id="method_code" placeholder="Method Code">
                 @if ($errors->has('method_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('method_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('code_description') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Code Description</label>
                  <input type="text" name="code_description" value="{{ $methods->code_description }}" required  class="form-control" id="water_habitat_usage" placeholder="Code Description">
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


