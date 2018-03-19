@extends('admin-units.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Admin Unit</h3>
               <div class="pull-right">
<a href="{{ route('admin-unit.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('admin-unit.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Admin Unit Name</label>
                  <input type="textarea" name="name" value="{{ old('name') }}" required  class="form-control" id="name" placeholder="Admin Unit Name">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>    
                    
                    
                    
                <div class="form-group col-md-6 required">
                    
                  {!! Form::label('Country','Country',['class'=>'control-label']) !!}
                  {!! Form::select('countrie_id',$countryrecodsql,null,['class'=>'form-control','placeholder'=>'Select Country','required'=>'required']) !!}  
                  </div>  
                  
                  
                  
                  
                </div> 
                  
                  
                   
                 <div class="form-row">
                  
                <div class="form-group{{ $errors->has('admincode') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Admin Unit Type</label>
                  <input type="textarea" name="admincode" value="{{ old('admincode') }}" required  class="form-control" id="admincode" placeholder="Admin Code">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admincode') }}</strong>
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
