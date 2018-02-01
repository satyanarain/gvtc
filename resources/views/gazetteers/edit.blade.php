@extends('gazetteers.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Gazetteers</h3>
              <div class="pull-right">
<a href="{{ route('gazetteer.index') }}" class="btn btn-default"> 
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php //print_r($gazetteers);
//echo $gazetteers->id;
//die; ?>
{!! Form::model($gazetteers, ['method' => 'PATCH','route' => ['gazetteer.update', $gazetteers->id],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 

<div class="box-body">
              

                <div class="form-row">
                  
                <div class="form-group col-md-6">

                  {!! Form::label('Country','Country',['class'=>'control-label']) !!}
                  {!! Form::select('country_id',$countryrecodsql,isset($gazetteers->country_id) ? $gazetteers->country_id:'selected',['class'=>'form-control','placeholder'=>'Select Country']) !!}
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Place</label>
                  <input type="text" name="place" value="{{$gazetteers->place}}" required   class="form-control" id="place" placeholder="Place">
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
                  <input type="text" name="details" value="{{$gazetteers->details}}"   class="form-control" id="details" placeholder="Details">
                 @if ($errors->has('details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('eastings') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">Eastings</label>
                  <input type="text" name="eastings" value="{{$gazetteers->eastings}}"   class="form-control" id="eastings" placeholder="Eastings">
                 @if ($errors->has('eastings'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('eastings') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('northings') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Northings</label>
                  <input type="text" name="northings" value="{{$gazetteers->northings}}"   class="form-control" id="species" placeholder="Northings">
                 @if ($errors->has('species'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('northings') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('zone') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">Zone</label>
                  <input type="text" name="zone" value="{{$gazetteers->zone}}"   class="form-control" id="zone" placeholder="Zone">
                 @if ($errors->has('zone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zone') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('datum') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">Datum</label>
                  <input type="text" name="datum" value="{{$gazetteers->datum}}" required  class="form-control" id="datum" placeholder="Datum">
                 @if ($errors->has('datum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datum') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Longitude</label>
                  <input type="text" name="longitude" value="{{$gazetteers->longitude}}" required  class="form-control" id="longitude" placeholder="Longitude">
                 @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">Latitude</label>
                  <input type="text" name="latitude" value="{{$gazetteers->latitude}}" required  class="form-control" id="latitude" placeholder="Latitude">
                 @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group col-md-2 ">
                      
                  {!! Form::label('day','Day',['class'=>'control-label']) !!}
                  <select name='day' class="form-control">
                      <option value="">Select Day</option>
                    <?php for($i=1;$i<=31;$i++){ ?>  
                      <option value="<?php echo $i; ?>" <?php if($i==$gazetteers->day){ echo 'selected'; }?>><?php echo $i; ?></option>
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
                 <select name='year' class="form-control">
                      <option value="">select Year</option>
                    <?php for($i=1950;$i<=2050;$i++){?>  
                      <option value="<?php echo $i;  ?>" <?php if($i==$gazetteers->year){ echo 'selected'; }?>>
                             <?php echo $i;  ?>
                 </option>
                    <?php } ?>
                  </select>
                     
                   </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  
                  
                 
                       <div class="form-group{{ $errors->has('habitat') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Habitat</label>
                  <input type="text" name="habitat" value="{{$gazetteers->habitat}}"   class="form-control" id="habitat" placeholder="Habitat">
                 @if ($errors->has('habitat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('habitat') }}</strong>
                                    </span>
                                @endif
                  </div> 
                   
                      
                      
                      <div class="form-group{{ $errors->has('altitude') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Altitude</label>
                  <input type="text" name="altitude" value="{{$gazetteers->altitude}}"   class="form-control" id="altitude" placeholder="Altitude">
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
                  <input type="text" name="slope" value="{{$gazetteers->slope}}"   class="form-control" id="slope" placeholder="Slope">
                 @if ($errors->has('slope'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slope') }}</strong>
                                    </span>
                                @endif
                  </div> 
                      
                  
                  
                <div class="form-group{{ $errors->has('aspect') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Aspect</label>
                  <input type="text" name="aspect" value="{{$gazetteers->aspect}}"   class="form-control" id="aspect" placeholder="Aspect">
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
                  <input type="text" name="soil" value="{{$gazetteers->soil}}"   class="form-control" id="soil" placeholder="Soil">
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
                  <input type="text" name="remarks" value="{{$gazetteers->remarks}}"   class="form-control" id="remarks" placeholder="Remarks">
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
                <button type="submit" class="btn btn-primary btn-sub">Update</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


