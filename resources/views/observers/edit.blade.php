@extends('observers.base')

@section('action-content')
<?php //print_r($observers);die; ?>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Observer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($observers, ['method' => 'PATCH','route' => ['observer.update', $observers['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('observer_id') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Observer ID</label>
                  <input type="text" name="observer_id" readonly="" value="{{ $observers->observer_id }}" required  class="form-control" id="observer_id" placeholder="Taxon Code">
                 @if ($errors->has('taxon_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observer_id') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('tittle') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Title</label>
                  <input type="textarea" name="tittle" value="{{ $observers->tittle }}" required  class="form-control" id="taxon_code_description" placeholder="Title">
                 @if ($errors->has('tittle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tittle') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                   
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">First Name</label>
                  <input type="text" name="first_name" value="{{ $observers->first_name}}" required  class="form-control" id="taxon_code" placeholder="First Name">
                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Last Name</label>
                  <input type="textarea" name="last_name" value="{{  $observers->first_name }}" required  class="form-control" id="last_name" placeholder="Last Name">
                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div>    
                   
                  <div class="form-row">
                  
                <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Institution</label>
                  <input type="text" name="institution" value="{{  $observers->institution }}" required  class="form-control" id="institution" placeholder="Institution">
                 @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Address</label>
                  <input type="textarea" name="address" value="{{  $observers->address }}" required  class="form-control" id="address" placeholder="Address">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div>   
                   
                
                     <div class="form-row">
                  
                <div class="form-group{{ $errors->has('work_tel_number') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Work Tel. Number</label>
                  <input type="text" name="work_tel_number" value="{{  $observers->first_name }}" required  class="form-control" id="work_tel_number" placeholder="Work Tel. Number">
                 @if ($errors->has('work_tel_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('work_tel_number') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Mobile</label>
                  <input type="textarea" name="mobile" value="{{  $observers->mobile }}" required  class="form-control" id="taxon_code_description" placeholder="Mobile">
                 @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                   
                   
                   
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Email</label>
                  <input type="text" name="email" value="{{  $observers->email }}" required  class="form-control" id="taxon_code" placeholder="Email">
                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Website</label>
                  <input type="text" name="website" value="{{  $observers->website }}" required  class="form-control" id="taxon_code_description" placeholder="Website">
                 @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
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


