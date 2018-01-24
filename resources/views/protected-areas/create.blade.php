@extends('protected-areas.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Protected Area</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('protected-area.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('designation_code') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Designation Code</label>
                  <input type="text" name="designation_code" value="{{ old('designation_code') }}" required  class="form-control" id="designation_code" placeholder="Designation Code">
                 @if ($errors->has('designation_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('code_description') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Code Description</label>
                  <input type="textarea" name="code_description" value="{{ old('code_description') }}" required  class="form-control" id="code_description" placeholder="Code Description">
                 @if ($errors->has('plants_growth_form'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code_description') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" value="{{ old('name') }}"   class="form-control" id="range" placeholder="Name">
                 @if ($errors->has('growth_form'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  
                  
                </div> 
                  
                  
                  
                  
                  
                  
                
                 
                  
                
                 
                  
                 
                  
             
                  
              </div>    
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">Save</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection
