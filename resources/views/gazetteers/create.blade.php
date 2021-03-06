@extends('gazetteers.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.add_gazetteer', array(),$session_lan= Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('gazetteer.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
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

                  {!! Form::label('Country',Lang::get('menu.country',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  <?php if(Session::get('language_val')=='en'){ ?>
                  {!! Form::select('country_id',$countryrecodsql,null,['class'=>'form-control','placeholder'=>Lang::get('menu.select_country',array(),Session::get('language_val')),'id' => 'country_id']) !!}
                  <?php }else{ ?>
                  {!! Form::select('country_id',$countryrecodsql_fr,null,['class'=>'form-control','placeholder'=>Lang::get('menu.select_country',array(),Session::get('language_val')),'id' => 'country_id']) !!}
                  <?php } ?>
                </div>  
                  
                  
                  <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.place', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="place" value="{{ old('place') }}" required   class="form-control" id="place" placeholder={{ Lang::get('menu.place',array(),Session::get('language_val'))}} >
                 @if ($errors->has('place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.details', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="details" value="{{ old('details') }}"   class="form-control" id="details" placeholder="Details">
                 @if ($errors->has('details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                       
              <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }} col-md-2 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.longitude', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="longitude" value="{{ old('longitude') }}" required onkeypress="return isNumberKey(event)" class="form-control" id="longitude" placeholder="Longitude">
                 @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                  </div>   
                       
                       
                  
                  
                </div> 
                  
                   <div class="form-row">
                  
             <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }} col-md-2 required">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.latitude', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="latitude" value="{{ old('latitude') }}" required  class="form-control" onkeypress="return isNumberKey(event)" id="latitude" placeholder="Latitude">
                 @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                  </div> 
                       <div class="form-group{{ $errors->has('datum_dd') ? ' has-error' : '' }} col-md-2 required">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.datum', array(),$session_lan= Session::get('language_val')) (DD)</label>
                  <input type="text" name="datum_dd" value="Arc 1960" required  class="form-control"  id="datum_dd" placeholder="Datum (DD)">
                 @if ($errors->has('datum_dd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datum_dd') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('zone') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.zone', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="zone" value="{{ old('zone') }}"   class="form-control" id="zone" placeholder="Zone">
                 @if ($errors->has('zone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zone') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                 
                  <div class="form-group{{ $errors->has('eastings') ? ' has-error' : '' }} col-md-2 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.eastings', array(),$session_lan= Session::get('language_val'))</label>
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
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.northings', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="northings" value="{{ old('northings') }}"   class="form-control" id="species" placeholder="Northings">
                 @if ($errors->has('species'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('northings') }}</strong>
                                    </span>
                                @endif
                  </div> 
                       
                       
                  <div class="form-group{{ $errors->has('datum') ? ' has-error' : '' }} col-md-2 required">
                  <label for="exampleInputEmail1"  class="control-label">Datum (UTM)</label>
                  <input type="text" name="datum" value="WGS 84" required  class="form-control" id="datum" placeholder="Datum (UTM)">
                 @if ($errors->has('datum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datum') }}</strong>
                                    </span>
                                @endif
                  </div>    
                       
                       
                  
                
                  
                  
                  
               
                </div> 
                  
                  <div class="form-row">
                  
                
          
                  
                  
                  
                </div> 
                  
                  <div class="form-row">
                  
                  
                 
                       <div class="form-group{{ $errors->has('habitat') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.habitat', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="habitat" value="{{ old('habitat') }}"   class="form-control" id="habitat" placeholder="Habitat">
                 @if ($errors->has('habitat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('habitat') }}</strong>
                                    </span>
                                @endif
                  </div> 
                   
                      
                      
                      <div class="form-group{{ $errors->has('altitude') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.altitude', array(),$session_lan= Session::get('language_val'))</label>
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
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.slope', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="slope" value="{{ old('slope') }}"   class="form-control" id="slope" placeholder="@lang('menu.slope', array(),$session_lan= Session::get('language_val'))">
                 @if ($errors->has('slope'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slope') }}</strong>
                                    </span>
                                @endif
                  </div> 
                      
                  
                  
                <div class="form-group{{ $errors->has('aspect') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.aspect', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="aspect" value="{{ old('aspect') }}"   class="form-control" id="aspect" placeholder="Aspect">
                 @if ($errors->has('aspect'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aspect') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                    <div class="form-row">
                  
                      
<!--                {!! Form::label('AdminUnit','Admin Unit',['class'=>'control-label']) !!}
                  {!! Form::select('adminunit_id',$adminunitrecodsql,null,['class'=>'form-control','placeholder'=>'Select Admin Unit']) !!}-->
                  

                  <div class="form-group col-md-6" id="adminunit_default">
                <label for="AdminUnit" class="control-label">@lang('menu.admin_unit', array(),$session_lan= Session::get('language_val'))</label>
                  <select class="form-control" name="adminunit_id">
                  <option selected="selected" value=""> @lang('menu.select_admin_unit', array(),$session_lan= Session::get('language_val')) </option>
                  </select>
                  </div>
                  
                <div id="adminunit_select"></div>
                            
                    <div class="form-group col-md-6 " id="protected_area_deafult">
<!--                {!! Form::label('ProtectedArea','Protected Area',['class'=>'control-label']) !!}
                  {!! Form::select('protected_area_id',$protectedrecodsql,null,['class'=>'form-control','placeholder'=>'Select Protected Area']) !!}-->
                 
                            
                   <label for="ProtectedArea" class="control-label">@lang('menu.protected_area', array(),$session_lan= Session::get('language_val'))</label>
        <select class="form-control" name="protected_area_id" >
       <option selected="selected" value="">@lang('menu.select_protected_area', array(),$session_lan= Session::get('language_val'))</option>  
        </select>                  
              </div>                        
                            
                        <div id="protected_area_select"></div>   
                </div> 
                  
                  
                   <div class="form-row">
                  
               <div class="form-group{{ $errors->has('soil') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.soil', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="soil" value="{{ old('soil') }}"   class="form-control" id="soil" placeholder="@lang('menu.soil', array(),$session_lan= Session::get('language_val'))">
                 @if ($errors->has('soil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('soil') }}</strong>
                                    </span>
                                @endif
                  </div>  
                      
                  
                  
                <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.remarks', array(),$session_lan= Session::get('language_val'))</label>
                  <input type="text" name="remarks" value="{{ old('remarks') }}"   class="form-control" id="remarks" placeholder="Remarks">
                 @if ($errors->has('aspect'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remarks') }}</strong>
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
                <button type="submit" class="btn btn-primary btn-sub">@lang('menu.save', array(),Session::get('language_val'))</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection
