@extends('water-use.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Water Management</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('water.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('water_use') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Water Use</label>
                  <input type="text" name="water_use" value="{{ old('water_use') }}" required  class="form-control" id="water_use" placeholder="Water Use">
                 @if ($errors->has('water_use'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('water_use') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('water_habitat_usage') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Water/wetland habitat usage</label>
                  <input type="textarea" name="water_habitat_usage" value="{{ old('water_habitat_usage') }}" required  class="form-control" id="water_habitat_usage" placeholder="Water/wetland habitat usage">
                 @if ($errors->has('water_habitat_usage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('water_habitat_usage') }}</strong>
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
