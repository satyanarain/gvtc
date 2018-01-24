@extends('admin-units.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Admin Unit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('admin-unit.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Country</label>
                  <input type="text" name="country" value="{{ old('country') }}"   class="form-control" id="country" placeholder="Country">
                 @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('admincode') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Admin Code</label>
                  <input type="textarea" name="admincode" value="{{ old('admincode') }}" required  class="form-control" id="admincode" placeholder="Admin Code">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admincode') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                   
                 <div class="form-row">
                  
                <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Designation</label>
                  <input type="text" name="designation" value="{{ old('designation') }}"   class="form-control" id="designation" placeholder="Designation">
                 @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="textarea" name="name" value="{{ old('name') }}"   class="form-control" id="name" placeholder="Name">
                 @if ($errors->has('name'))
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
