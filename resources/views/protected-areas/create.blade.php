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
              <div class="pull-right">
<a href="{{ route('protected-area.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('protected-area.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                
                 
                    
                   <div class="form-group{{ $errors->has('protected_area_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Protected Area Name</label>
                  <input type="text" name="protected_area_name" value="{{ old('protected_area_name') }}" required   class="form-control" id="range" placeholder="Protected Area Name">
                 @if ($errors->has('protected_area_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protected_area_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                    
                    
                  
                  <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Country</label>
                  <input type="textarea" name="country" value="{{ old('country') }}" required  class="form-control" id="country" placeholder="Country">
                 @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                   <div class="form-row">
                  
                 
                  <div class="form-group{{ $errors->has('protected_area_code') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Protected Area Code</label>
                  <input type="text" name="protected_area_code" value="{{ old('protected_area_code') }}" required  class="form-control" id="protected_area_code" placeholder="Protected Area Code">
                 @if ($errors->has('protected_area_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protected_area_code') }}</strong>
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
