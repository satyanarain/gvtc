@extends('ranges.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Range</h3>
               <div class="pull-right">
<a href="{{ route('ranges.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($range, ['method' => 'PATCH','route' => ['ranges.update', $range['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('range_code') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Range</label>
                  <input type="text" name="range_code" value="{{ $range->range_code }}" required  class="form-control" id="taxon_code" placeholder="Range">
                 @if ($errors->has('range_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('range_within_the_albertine_rift') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Range Code Description</label>
                  <input type="textarea" name="range_within_the_albertine_rift" value="{{ $range->range_within_the_albertine_rift }}" required  class="form-control" id="taxon_code_description" placeholder="Range Code Description">
                 @if ($errors->has('range_within_the_albertine_rift'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('range_within_the_albertine_rift') }}</strong>
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


