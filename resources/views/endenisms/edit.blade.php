@extends('endenisms.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Endenism</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($endenisms, ['method' => 'PATCH','route' => ['endenism.update', $endenisms['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
    <?php //print_r($endenisms);die; ?>        
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('endenism') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Endemism</label>
                  <input type="text" name="endenism" value="{{ $endenisms->endenism }}" required  class="form-control" id="endemism" placeholder="Endemism">
                 @if ($errors->has('endemism'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endenism') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Status</label>
                  <input type="text" name="status" value="{{ $endenisms->status }}" required  class="form-control" id="status" placeholder="Status">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
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


