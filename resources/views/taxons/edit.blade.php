@extends('taxons.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Taxon</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($taxon, ['method' => 'PATCH','route' => ['taxons.update', $taxon['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Taxon Code</label>
                  <input type="text" name="taxon_code" value="{{ $taxon->taxon_code }}" required  class="form-control" id="taxon_code" placeholder="Taxon Code">
                 @if ($errors->has('taxon_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('taxon_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Taxon Code Description</label>
                  <input type="textarea" name="taxon_code_description" value="{{ $taxon->taxon_code_description }}" required  class="form-control" id="taxon_code_description" placeholder="Taxon Code Description">
                 @if ($errors->has('taxon_code_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('taxon_code_description') }}</strong>
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


