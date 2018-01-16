@extends('countries.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Country Management</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('country.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('range') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Range</label>
                  <input type="text" name="range" value="{{ old('range') }}" required  class="form-control" id="range" placeholder="Range">
                 @if ($errors->has('range'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('range_within_albertine_rift') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Range within the Albertine Rift</label>
                  <input type="textarea" name="range_within_albertine_rift" value="{{ old('range_within_albertine_rift') }}" required  class="form-control" id="range_within_albertine_rift" placeholder="Range within the Albertine Rift">
                 @if ($errors->has('range_within_albertine_rift'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_within_albertine_rift') }}</strong>
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
