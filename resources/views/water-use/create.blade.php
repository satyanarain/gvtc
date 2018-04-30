@extends('water-use.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.water_use', array(),Session::get('language_val'))</h3>
               <div class="pull-right">
<a href="{{ route('water.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            
            
            <form role="form" method="POST" action="{{ route('water.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('water_use') ? ' has-error' : '' }} col-md-6 required">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.water_use', array(),Session::get('language_val'))</label>
                  <input type="text" name="water_use" value="{{ old('water_use') }}" required  class="form-control" id="water_use" placeholder="Water Use">
                 @if ($errors->has('water_use'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('water_use') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('water_habitat_usage') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.water_wetland_habitat_usage', array(),Session::get('language_val'))</label>
                  
                  <input type="textarea" name="water_habitat_usage" value="{{ old('water_habitat_usage') }}" required  class="form-control" id="water_habitat_usage" placeholder="Water/Wetland Habitat Usage">
                 @if ($errors->has('water_habitat_usage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('water_habitat_usage') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                  <div class="form-row">
                  
               
                  
                  
                  <div class="form-group{{ $errors->has('water_habitat_usage_fr') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.water_wetland_habitat_usage', array(),Session::get('language_val'))</label>
              
                  <input type="textarea" name="water_habitat_usage_fr" value="{{ old('water_habitat_usage_fr') }}" required  class="form-control" id="water_habitat_usage_fr" placeholder="Water/Wetland Habitat Usage (French)">
                 @if ($errors->has('water_habitat_usage_fr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('water_habitat_usage_fr') }}</strong>
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
