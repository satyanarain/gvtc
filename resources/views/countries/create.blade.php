    @extends('countries.base')

    @section('action-content')

    <section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Add Country</h3>
           <div class="pull-right">
    <a href="{{ route('country.index') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back</a>
    </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->




        <form role="form" method="POST" action="{{ route('country.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="box-body">

            <div class="form-row">

            <div class="form-group{{ $errors->has('range_code') ? ' has-error' : '' }} col-md-6 required">
              <label for="exampleInputEmail1"  class="control-label">Country Code</label>
              <input type="text" name="range_code" value="{{ old('range_code') }}" required  class="form-control" id="range_code" placeholder="Country Code">
             @if ($errors->has('range_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('range_code') }}</strong>
                                </span>
                            @endif
              </div>


              <div class="form-group{{ $errors->has('range_within_albertine_rift') ? ' has-error' : '' }} col-md-6 required">
              <label for="exampleInputEmail1"  class="control-label">Country Code Description</label>
              <input type="textarea" name="range_within_albertine_rift" value="{{ old('range_within_albertine_rift') }}" required  class="form-control" id="range_within_albertine_rift" placeholder="Country Code Description">
             @if ($errors->has('range_within_albertine_rift'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('range_within_albertine_rift') }}</strong>
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
