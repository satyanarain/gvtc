@extends('nationals.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">National Threat Code Mangement</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('nationals.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('national_threat_code') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">National Threat Code </label>
                  <input type="text" name="national_threat_code" value="{{ old('national_threat_code') }}" required  class="form-control" id="national_threat_code" placeholder="National Threat Code">
                 @if ($errors->has('iucn_threat_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('national_threat_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('national_threat_code_description') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">National Threat Code Description</label>
                  <input type="textarea" name="national_threat_code_description" value="{{ old('national_threat_code_description') }}" required  class="form-control" id="national_threat_code_description" placeholder="National Threat Code Description">
                 @if ($errors->has('national_threat_code_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('national_threat_code_description') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                  
                  
                  
                  
                
                 
                  
                
                 
                  
                 
                  
             
                  
              </div>    
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">Create</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection
