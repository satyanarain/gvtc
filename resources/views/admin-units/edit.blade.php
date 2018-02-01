@extends('admin-units.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">List of Water Use</h3>
                 <div class="pull-right">
<a href="{{ route('admin-unit.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($adminunits, ['method' => 'PATCH','route' => ['admin-unit.update', $adminunits['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
    <?php //print_r($endenisms);die; ?>        
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">Admin Unit Name</label>
                  <input type="text" name="name" value="{{ $adminunits->name }}"   class="form-control" id="status" placeholder="Name">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>   
                    
                    
                  
                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} col-md-6  required">
                  <label for="exampleInputEmail1"  class="control-label">Country</label>
                  <input type="text" name="country" value="{{ $adminunits->country }}"   class="form-control" id="country" placeholder="Country">
                 @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                 
                  
                </div> 
                  
                   
                   <div class="form-row">
                       
                      <div class="form-group{{ $errors->has('admincode') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">Admin Unit Type</label>
                  <input type="text" name="admincode" value="{{ $adminunits->admincode }}" required  class="form-control" id="status" placeholder="Admin Code">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admincode') }}</strong>
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


