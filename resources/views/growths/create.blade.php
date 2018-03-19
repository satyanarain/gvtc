@extends('growths.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Growth Form</h3>
              <div class="pull-right">
<a href="{{ route('growth.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('growth.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('growth_form') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Growth Form </label>
                  <input type="text" name="growth_form" value="{{ old('growth_form') }}" required  class="form-control" id="range" placeholder="Growth Form">
                 @if ($errors->has('growth_form'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('growth_form') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('range_within_the_albertine_rift') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Plants Growth Form</label>
                  <input type="textarea" name="plants_growth_form" value="{{ old('plants_growth_form') }}" required  class="form-control" id="range_within_the_albertine_rift" placeholder="Plants Growth Form">
                 @if ($errors->has('plants_growth_form'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plants_growth_form') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                  
            <div class="form-group col-md-6">
            <input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
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
