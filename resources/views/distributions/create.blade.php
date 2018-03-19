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
<a href="{{ route('distribution.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form role="form" method="POST"  action="{{ route('distribution.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                
                <div class="form-row">
                  
                <div class="form-group col-md-6 required">

                  {!! Form::label('Taxon','Taxon',['class'=>'control-label']) !!}
                  {!! Form::select('taxon_id',$taxonrecodsql,null,['class'=>'form-control','placeholder'=>'Select Taxon','required'=>'required','id' => 'taxon_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group col-md-4 required">
                   
                      <p style="font-weight:bold;">Selection Criteria</p>
              
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="radio"  class="geniusrecord" name="selectioncriteria"  id="genus" value="genus">
                        <label for="inlineCheckbox2"> Genus / Species / Sub-species </label>
                    </div>
                    <div class="checkbox checkbox-inline">
                        <input type="radio" name="selectioncriteria" class="geniusrecord" id="inlineCheckbox3" value="commonname">
                        <label for="inlineCheckbox3"> Common Name (English)</label>
                    </div>
             <div class="checkbox checkbox-inline">
                        <input type="radio" name="selectioncriteria" class="geniusrecord" id="common_name_fr" value="commonnamefr">
                        <label for="inlineCheckbox3"> Common Name (French) </label>
                    </div>
             
             
             
               </div>  
                   <div class="form-group col-md-2 required" id="displ" style="display:none;">
                    <span id="speciessel"> </span>  
                   </div>
                    
                    
                    
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group col-md-6 required">
                  {!! Form::label('Method','Method',['class'=>'control-label']) !!}
                  {!! Form::select('method_id',$methodrecodsql,null,['class'=>'form-control','placeholder'=>'Select Method','required'=>'required','id' => 'method_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group  col-md-6 required">
                 {!! Form::label('Observation','Observation',['class'=>'control-label']) !!}
                  {!! Form::select('observation_id',$observationrecodsql,null,['class'=>'form-control','placeholder'=>'Select Observation','required'=>'required','id' => 'observation_id']) !!}
              
                      
                      
                      
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('gazetteer_id') ? ' has-error' : '' }} col-md-6 required">
                   {!! Form::label('Place','Place',['class'=>'control-label']) !!}
                  {!! Form::select('gazetteer_id',$gazetteerrecodsql,null,['class'=>'form-control','placeholder'=>'Select Place','required'=>'required','id' => 'gazetteer_id']) !!}
                  </div>  
                <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }} col-md-2 ">
                   {!! Form::label('day','Day',['class'=>'control-label']) !!}
                  <select name='day' class="form-control">
                      <option value="">Select Day</option>
                    <?php for($i=1;$i<=31;$i++){ ?>  
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                  </div>  
                  <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }} col-md-2">
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
                  <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }} col-md-2 ">
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
                  
                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Number</label>
                  <input type="text" name="number" value="{{ old('number') }}"   class="form-control" id="taxon_code" placeholder="Number">
                 @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required ">
                      
                  {!! Form::label('Observer','Observer',['class'=>'control-label']) !!}
<!--                  {!! Form::select('observer_id',$observerrecodsql,null,['class'=>'form-control','placeholder'=>'Select Observer','required'=>'required','id' => 'observer_id']) !!}-->
                  <select class="form-control" required="required" id="observer_id" name="observer_id">
                      <option selected="selected" value="">Select Observer</option>
                      <?php  
                      $sql=DB::table('observers')->get(); 
                      foreach($sql  as  $val){
                          //if($val->first_name!='' && $val->last_name!=''){
                      ?>
                      <?php if($val->first_name!='' && $val->last_name!=''){ ?>
                      <option value="<?php echo $val->id; ?>"><?php if($val->first_name!=''){ echo $val->first_name; } ?> <?php  if($val->last_name!=''){  echo $val->last_name;}  ?></option>
                      <?php } ?>
                      <?php if($val->institution!=''){ ?>
                      <option value="<?php echo $val->id; ?>"><?php  echo $val->institution;  ?> </option>
                      <?php } ?>
                          <?php //}else{ ?>
                     
                          
                          
                          
                          
                         <?php  } ?>
                      </select>
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  <div class="form-group col-md-6 custom-range">
                 {!! Form::label('AgeGroup','Age Group',['class'=>'control-label']) !!}
                  {!! Form::select('age_id',$agerecodsql,null,['class'=>'form-control','placeholder'=>'Select Age Group','id' => 'age_id']) !!}
                
                  
                  </div>  
                 
    
                  
                  <div class="form-group col-md-6 ">
                      
                  {!! Form::label('AbundanceCode','Abundance',['class'=>'control-label']) !!}
                  {!! Form::select('abundance_id',$abundancerecodsql,null,['class'=>'form-control','placeholder'=>'Select Abundance','id' => 'abundance_id']) !!}
                 
                   </div>  
                  
                </div> 
                   <div class="form-row">
                    <div class="form-group col-md-12 ">
                    <input type="checkbox" id="specimendata" name="specimendata" value="1">
                        <label for="inlineCheckbox1"> Specimen Data </label>
                    </div>    
                   </div>   
                 <div class="form-row div_specimen" style="display:none">
                  
                <div class="form-group col-md-6 ">
<label for="exampleInputEmail1" class="control-label">Specimen Code</label>
                  <input type="text" name="specimencode" value="{{ old('specimencode') }}"   class="form-control" id="specimen" placeholder="Specimen Code">
                 @if ($errors->has('specimencode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('specimencode') }}</strong>
                                    </span>
                                @endif
                  
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('collectorinstitution') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">Collector Institution</label>
                  <input type="text" name="collectorinstitution" value="{{ old('collectorinstitution') }}"   class="form-control" id="collectorinstitution" placeholder="Collector Institution">
                 @if ($errors->has('collectorinstitution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('collectorinstitution') }}</strong>
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
                  <input type="text" name="remark" value="{{ old('remark') }}"   class="form-control" id="remark" placeholder="Remarks">
                 @if ($errors->has('remark'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remark') }}</strong>
                                    </span>
                                @endif
                      
                  
                  </div>  
                  <div class="form-group col-md-6">
<input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
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

