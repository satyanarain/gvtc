@extends('iucns.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update IUCN Threat</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($iucn, ['method' => 'PATCH','route' => ['iucns.update', $iucn['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('iucn_threat_code') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">IUCN Threat Code</label>
                  <input type="text" name="iucn_threat_code" value="{{ $iucn->iucn_threat_code }}" required  class="form-control" id="taxon_code" placeholder="IUCN Threat Code">
                 @if ($errors->has('taxon_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iucn_threat_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('iucn_code_description') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">IUCN Code Description</label>
                  <input type="textarea" name="iucn_code_description" value="{{ $iucn->iucn_code_description }}" required  class="form-control" id="taxon_code_description" placeholder="IUCN Code Description">
                 @if ($errors->has('taxon_code_description'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('iucn_code_description') }}</strong>
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


