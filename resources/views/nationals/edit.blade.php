@extends('nationals.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">IUCN Threat Codes</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($national, ['method' => 'PATCH','route' => ['nationals.update', $national['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('national_threat_code') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Taxon Code</label>
                  <input type="text" name="national_threat_code" value="{{ $national->national_threat_code }}" required  class="form-control" id="taxon_code" placeholder="IUCN Threat Code">
                 @if ($errors->has('national_threat_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('national_threat_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('national_threat_code_description') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Taxon Code Description</label>
                  <input type="textarea" name="national_threat_code_description" value="{{ $national->national_threat_code_description }}" required  class="form-control" id="taxon_code_description" placeholder="IUCN Code Description">
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
                <button type="submit" class="btn btn-primary btn-sub">Update</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


