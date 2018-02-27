@extends('distributions.base')

@section('action-content')

    
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Distribution Record</h3>
              <div class="pull-right">
<a href="#" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                
                <div class="form-row">
                  
                <div class="form-group col-md-6 required">

                  {!! Form::label('Taxon','Taxon',['class'=>'control-label']) !!}
                  {!! Form::select('taxon_id',$taxonrecodsql,null,['class'=>'form-control','placeholder'=>'Select Taxon','required'=>'required','id' => 'taxon_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('speciesid') ? ' has-error' : '' }} col-md-4 required">
                   
                      <p style="font-weight:bold;">Selection Criteria</p>
              
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="radio"  class="geniusrecord" name="optradio"  id="genus" value="genus">
                        <label for="inlineCheckbox2"> Genus / Species / Sub-species </label>
                    </div>
                    <div class="checkbox checkbox-inline">
                        <input type="radio" name="optradio" class="geniusrecord" id="inlineCheckbox3" value="commonname">
                        <label for="inlineCheckbox3"> Common Name </label>
                    </div>
             
             
             
             
               </div>  
                   <div class="form-group col-md-2 required" id="displ" style="display:none;">
                    <span id="speciessel"> </span>  
                   </div>
                    
                    
                    
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group col-md-6 required">
                  {!! Form::label('MethodID','Method ID',['class'=>'control-label']) !!}
                  {!! Form::select('method_id',$methodrecodsql,null,['class'=>'form-control','placeholder'=>'Select Method ID','required'=>'required','id' => 'method_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group  col-md-6 ">
                 {!! Form::label('Observation ID','Observation ID',['class'=>'control-label']) !!}
                  {!! Form::select('observation_id',$observationrecodsql,null,['class'=>'form-control','placeholder'=>'Select Observation ID','required'=>'required','id' => 'observation_id']) !!}
              
                      
                      
                      
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }} col-md-6 required">
                   {!! Form::label('Place','Place',['class'=>'control-label']) !!}
                  {!! Form::select('gazetteer_id',$gazetteerrecodsql,null,['class'=>'form-control','placeholder'=>'Select Place','required'=>'required','id' => 'gazetteer_id']) !!}
                  </div>  
                  
                  
                 
                  
               
                  
                  
                  
                  
                  
                 
                  
                  
                  
                  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2 ">
                   {!! Form::label('day','Day',['class'=>'control-label']) !!}
                  <select name='day' class="form-control">
                      <option value="">Select Day</option>
                    <?php for($i=1;$i<=31;$i++){ ?>  
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                  </div>  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2">
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
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2 ">
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
                  
                <div class="form-group{{ $errors->has('common_name') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Number</label>
                  <input type="text" name="common_name" value="{{ old('common_name') }}"   class="form-control" id="taxon_code" placeholder="Number">
                 @if ($errors->has('common_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('common_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required ">
                      
                  {!! Form::label('Observer','Observer',['class'=>'control-label']) !!}
                  {!! Form::select('observer_id',$observerrecodsql,null,['class'=>'form-control','placeholder'=>'Select Observer','required'=>'required','id' => 'observer_id']) !!}
                  
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  <div class="form-group col-md-6 custom-range">
                 {!! Form::label('AgeGroup','Age Group',['class'=>'control-label']) !!}
                  {!! Form::select('gazetteer_id',$agerecodsql,null,['class'=>'form-control','placeholder'=>'Select Age Group','required'=>'required','id' => 'gazetteer_id']) !!}
                
                  
                  </div>  
                 
    
                  
                  <div class="form-group col-md-6 ">
                      
                  {!! Form::label('AbundanceCode','Abundance Code',['class'=>'control-label']) !!}
                  {!! Form::select('gazetteer_id',$abundancerecodsql,null,['class'=>'form-control','placeholder'=>'Select Abundance Code','required'=>'required','id' => 'gazetteer_id']) !!}
                 
                   </div>  
                  
                </div> 
                   <div class="form-row">
                    <div class="form-group col-md-12 ">
                    <input type="checkbox" id="specimendata" value="1">
                        <label for="inlineCheckbox1"> Specimen Data </label>
                    </div>    
                   </div>   
                 <div class="form-row div_specimen" style="display:none">
                  
                <div class="form-group col-md-6 ">
<label for="exampleInputEmail1" class="control-label">Specimen Code</label>
                  <input type="text" name="speciesid" value="{{ old('speciesid') }}" required  class="form-control" id="speciesid" placeholder="Specimen Code">
                 @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('speciesid') }}</strong>
                                    </span>
                                @endif
                  
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('speciesid') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">Collector Institution</label>
                  <input type="text" name="speciesid" value="{{ old('speciesid') }}" required  class="form-control" id="speciesid" placeholder="Collector Institution">
                 @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('speciesid') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div>  
                  
                  
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                    
                 {!! Form::label('Sex','Sex',['class'=>'control-label']) !!}
                  {!! Form::select('sex',[
                    'M' => 'Male',
                    'F' => 'Female',
                    ],null,['class'=>'form-control','placeholder'=>'Select Sex']) !!} 
                    
                  
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                      
                   <label for="exampleInputEmail1" class="control-label">Remarks</label>
                  <input type="text" name="speciesid" value="{{ old('speciesid') }}" required  class="form-control" id="speciesid" placeholder="Remarks">
                 @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('speciesid') }}</strong>
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

