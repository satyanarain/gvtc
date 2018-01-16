@extends('countries.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">List of Country</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($countries, ['method' => 'PATCH','route' => ['country.update', $countries['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('range') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Range</label>
                  <input type="text" name="range" value="{{ $countries->range }}" required  class="form-control" id="range" placeholder="Range">
                 @if ($errors->has('range'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('range_within_albertine_rift') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Range within the Albertine Rift</label>
                  <input type="text" name="range_within_albertine_rift" value="{{ $countries->range_within_albertine_rift }}" required  class="form-control" id="range_within_albertine_rift" placeholder="IUCN Code Description">
                 @if ($errors->has('range_within_albertine_rift'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_within_albertine_rift') }}</strong>
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


