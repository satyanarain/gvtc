@extends('gazetteers.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Create Gazetteer</h3>
              <div class="pull-right">
<a href="{{ route('gazetteer.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           @if (Session::has('success'))
            <div class="alert alert-warning fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                {!! Session::get('success') !!}
            </div>
               @endif
            <form role="form" method="POST" action="{{ route('gazetteer.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
              
<input type="hidden" name="gazeteer_id" readonly="" value="{{ 'GVTCGZ0'.$last_gazeteerid }}" required  class="form-control" id="observer_id" placeholder="Observer ID">                  
                <div class="form-row">
                  
                <div class="form-group col-md-6">

                  {!! Form::label('Country','Country',['class'=>'control-label']) !!}
                  {!! Form::select('country_id',$countryrecodsql,null,['class'=>'form-control','placeholder'=>'Select Country']) !!}
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Place</label>
                  <input type="text" name="place" value="{{ old('place') }}" required   class="form-control" id="place" placeholder="Place">
                 @if ($errors->has('place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Details</label>
                  <input type="text" name="details" value="{{ old('details') }}"   class="form-control" id="details" placeholder="Details">
                 @if ($errors->has('details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('eastings') ? ' has-error' : '' }} col-md-2 ">
                  <label for="exampleInputEmail1" class="control-label">Eastings</label>
                  <input type="text" name="eastings" value="{{ old('eastings') }}"   class="form-control" id="eastings" placeholder="Eastings">
                 @if ($errors->has('eastings'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('eastings') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('northings') ? ' has-error' : '' }} col-md-2 ">
                  <label for="exampleInputEmail1"  class="control-label">Northings</label>
                  <input type="text" name="northings" value="{{ old('northings') }}"   class="form-control" id="species" placeholder="Northings">
                 @if ($errors->has('species'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('northings') }}</strong>
                                    </span>
                                @endif
                  </div> 
                       
                       
                  <div class="form-group{{ $errors->has('datum') ? ' has-error' : '' }} col-md-2 ">
                  <label for="exampleInputEmail1"  class="control-label">Datum (UTM)</label>
                  <input type="text" name="datum" value="{{ old('datum') }}" required  class="form-control" id="datum" placeholder="Datum (UTM)">
                 @if ($errors->has('datum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datum') }}</strong>
                                    </span>
                                @endif
                  </div>      
                  
                  
                  <div class="form-group{{ $errors->has('zone') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">Zone</label>
                  <input type="text" name="zone" value="{{ old('zone') }}"   class="form-control" id="zone" placeholder="Zone">
                 @if ($errors->has('zone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zone') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                 
                  
                  
                  <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }} col-md-2 required">
                  <label for="exampleInputEmail1" class="control-label">Longitude</label>
                  <input type="text" name="longitude" value="{{ old('longitude') }}" required  class="form-control" id="longitude" placeholder="Longitude">
                 @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }} col-md-2 required">
                  <label for="exampleInputEmail1"  class="control-label">Latitude</label>
                  <input type="text" name="latitude" value="{{ old('latitude') }}" required  class="form-control" id="latitude" placeholder="Latitude">
                 @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                  </div> 
                       <div class="form-group{{ $errors->has('datum_dd') ? ' has-error' : '' }} col-md-2">
                  <label for="exampleInputEmail1"  class="control-label">Datum (DD)</label>
                  <input type="text" name="datum_dd" value="{{ old('datum_dd') }}" required  class="form-control" id="datum_dd" placeholder="Datum (DD)">
                 @if ($errors->has('datum_dd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datum_dd') }}</strong>
                                    </span>
                                @endif
                  </div>
                  
                  
                  <div class="form-group col-md-2 ">
                      
                  {!! Form::label('day','Day',['class'=>'control-label']) !!}
                  <select name='day' class="form-control">
                      <option value="">Select Day</option>
                    <?php for($i=1;$i<=31;$i++){ ?>  
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                  </div>  
               
                </div> 
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-2 ">
                  {!! Form::label('Month','Month',['class'=>'control-label']) !!}
                  {!! Form::select('month',[
                    'January' => 'January',
                    'February' => 'February',
                    'March' => 'March',
                    'April' => 'April',
                    'May' => 'May',
                    'June' => 'June',
                    'July' => 'July',
                    'August' => 'August',
                    'September' => 'September',
                    'October' => 'October',
                    'November' => 'November',
                    'December' => 'December',
                    ],null,['class'=>'form-control','placeholder'=>'Select Month']) !!} 
                </div>  
          
                  
                  <div class="form-group col-md-2 ">
                      
                  {!! Form::label('Year','Year',['class'=>'control-label']) !!}
                 <select name='year' class="form-control" paceholder='sfdgfdg'>
                      <option value="">Select Year</option>
                    <?php for($i=1950;$i<=2050;$i++){ ?>  
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                      
                   </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  
                  
                 
                       <div class="form-group{{ $errors->has('habitat') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Habitat</label>
                  <input type="text" name="habitat" value="{{ old('habitat') }}"   class="form-control" id="habitat" placeholder="Habitat">
                 @if ($errors->has('habitat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('habitat') }}</strong>
                                    </span>
                                @endif
                  </div> 
                   
                      
                      
                      <div class="form-group{{ $errors->has('altitude') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Altitude</label>
                  <input type="text" name="altitude" value="{{ old('altitude') }}"   class="form-control" id="altitude" placeholder="Altitude">
                 @if ($errors->has('altitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('altitude') }}</strong>
                                    </span>
                                @endif
                  </div> 
                      
                  
                  
                  
                </div> 
                  
                       <div class="form-row">
                  
                <div class="form-group{{ $errors->has('slope') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Slope</label>
                  <input type="text" name="slope" value="{{ old('slope') }}"   class="form-control" id="slope" placeholder="Slope">
                 @if ($errors->has('slope'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slope') }}</strong>
                                    </span>
                                @endif
                  </div> 
                      
                  
                  
                <div class="form-group{{ $errors->has('aspect') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Aspect</label>
                  <input type="text" name="aspect" value="{{ old('aspect') }}"   class="form-control" id="aspect" placeholder="Aspect">
                 @if ($errors->has('aspect'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aspect') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                        <div class="form-row">
                  
                
                      
                  
                  
                <div class="form-group{{ $errors->has('soil') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Soil</label>
                  <input type="text" name="soil" value="{{ old('soil') }}"   class="form-control" id="soil" placeholder="Soil">
                 @if ($errors->has('soil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('soil') }}</strong>
                                    </span>
                                @endif
                  </div> 
                            
                    <div class="form-group col-md-6 ">
                {!! Form::label('ProtectedArea','Protected Area',['class'=>'control-label']) !!}
                  {!! Form::select('protected_area_id',$protectedrecodsql,null,['class'=>'form-control','placeholder'=>'Select Protected Area']) !!}
                  </div>         
                            
                            
                  
                </div> 
                  
                  
                   <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                {!! Form::label('AdminUnit','Admin Unit',['class'=>'control-label']) !!}
                  {!! Form::select('adminunit_id',$adminunitrecodsql,null,['class'=>'form-control','placeholder'=>'Select Admin Unit']) !!}
                  </div> 
                      
                  
                  
                <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Remarks</label>
                  <input type="text" name="remarks" value="{{ old('remarks') }}"   class="form-control" id="remarks" placeholder="Remarks">
                 @if ($errors->has('aspect'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remarks') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
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
