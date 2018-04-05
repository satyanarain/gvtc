@extends('species.base')

@section('action-content')

 
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.species', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('species.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
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
            <form role="form" method="POST" action="{{ route('species.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                <input type="hidden" name="specienewid" value="{{'GVTCSP'.$last_speciesid}}" required  class="form-control" id="order" placeholder="species">   
                <div class="form-row">
                <div class="form-group col-md-6 required">
                <label for="exampleInputEmail1" class="control-label">@lang('menu.taxon', array(),Session::get('language_val'))</label>
                  {!! Form::select('taxon_id',$taxonrecodsql,null,['class'=>'form-control','placeholder'=>'Select Taxon','required'=>'required','id' => 'taxon_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.order', array(),Session::get('language_val'))</label>
                  <input type="text" name="order" value="{{ old('order') }}" required  class="form-control" id="order" placeholder="Order">
                 @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('order') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.family', array(),Session::get('language_val'))</label>
                  <input type="text" name="family" value="{{ old('family') }}" required  class="form-control" id="family" placeholder="Family">
                 @if ($errors->has('family'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('genus') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.genus', array(),Session::get('language_val'))</label>
                  <input type="text" name="genus" value="{{ old('genus') }}" required  class="form-control" id="genus" placeholder="Genus">
                 @if ($errors->has('genus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('genus') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.species', array(),Session::get('language_val'))</label>
                  <input type="text" name="species" value="{{ old('species') }}" required  class="form-control" id="species" placeholder="Species">
                 @if ($errors->has('species'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('species') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('species_author') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.species_author', array(),Session::get('language_val'))</label>
                  <input type="text" name="species_author" value="{{ old('species_author') }}"   class="form-control" id="species_author" placeholder="Species Author">
                 @if ($errors->has('species_author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('species_author') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('subspecies') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.sub_species', array(),Session::get('language_val'))</label>
                  <input type="text" name="subspecies" value="{{ old('subspecies') }}"   class="form-control" id="subspecies" placeholder="Subspecies">
                 @if ($errors->has('subspecies'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subspecies') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.sub_species_author', array(),Session::get('language_val'))</label>
                  <input type="text" name="subspecies_author" value="{{ old('subspecies_author') }}"   class="form-control" id="subspecies_author" placeholder="Subspecies Author">
                 @if ($errors->has('subspecies_author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subspecies_author') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('common_name') ? ' has-error' : '' }} col-md-3 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.common_name_english', array(),Session::get('language_val'))</label>
                  <input type="text" name="common_name" value="{{ old('common_name') }}"   class="form-control" id="common_name" placeholder="Common Name">
                 @if ($errors->has('common_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('common_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                 <div class="form-group{{ $errors->has('common_name_fr') ? ' has-error' : '' }} col-md-3 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.common_name_french', array(),Session::get('language_val'))</label>
                  <input type="text" name="common_name_fr" value="{{ old('common_name_fr') }}"   class="form-control" id="common_name" placeholder="Common Name">
                 @if ($errors->has('common_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('common_name_fr') }}</strong>
                                    </span>
                                @endif
                  </div>  
                       
                  
                  
                  <div class="form-group col-md-6 ">
                      
                  {!! Form::label('iucn_threat_id',Lang::get('menu.IUCN_threat_code',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('iucn_threat_id',$iucnrecodsql,null,['class'=>'form-control','placeholder'=>'Select IUCN Threat Code']) !!}   
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                
   
                <div class="form-group col-md-6 custom-range">
                  {!! Form::label('Range',Lang::get('menu.range',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('range_id[]',$rangerecordsql,null,['class'=>'form-control','id'=>"lstFruits",'multiple'=>"multiple"]) !!} 
                  
                  </div>  
                 
    
                  
                  <div class="form-group col-md-6 " id="growth_id_div" style='display:none;'>
                      
                  {!! Form::label('Growth Form',Lang::get('menu.growth_form',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('growth_id',$growthrecordsql,null,['class'=>'form-control','placeholder'=>'Select Growth Form','id' => 'growth_id']) !!}     
                   </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                    
                  {!! Form::label('ForestUse',Lang::get('menu.forest_use',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('forestuse_id',$forestusesql,null,['class'=>'form-control','placeholder'=>'Select Forest Use']) !!}    
                  
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                      
                   {!! Form::label('WaterUse',Lang::get('menu.water_use',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('wateruse_id',$waterusesql,null,['class'=>'form-control','placeholder'=>'Select Water Use']) !!}     
                  
                  </div>  
                  
                </div> 
                  
                       <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                    
                   {!! Form::label('Endemism',Lang::get('menu.endemism',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('endenisms_id',$endemismsql,null,['class'=>'form-control','placeholder'=>'Select Endemism']) !!}    
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                    {!! Form::label('Migration',Lang::get('menu.migration',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('migration_tbl_id',$migrationsql,null,['class'=>'form-control','placeholder'=>'Select Migration']) !!}    
                      
                      
                      
                  
                  </div>  
                  
                </div> 
                  
                  
                  
                
                 <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                    
                   {!! Form::label('National Threat Code',Lang::get('menu.national_threat_code',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('national_threat_code_id',$nationalusesql,null,['class'=>'form-control','placeholder'=>'Select National Threat Code']) !!}    
                 
                  </div>  
                  
                  <div class="form-group col-md-6 " id="breeding_div" style='display:none;'>
                    {!! Form::label('Breeding',Lang::get('menu.breeding',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('breeding_id',$breedingusesql,null,['class'=>'form-control','placeholder'=>'Select Breeding']) !!}    
                      
                      
                      
                  
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

