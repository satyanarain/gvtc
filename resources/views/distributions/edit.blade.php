
@extends('distributions.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.update', array(),Session::get('language_val')) @lang('menu.distribution_records', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('distribution.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
   
            <!-- /.box-header -->
            <!-- form start -->
<?php //print_r($specie);die; ?>
{!! Form::model($distribution, ['method' => 'PATCH','route' => ['distribution.update', $distribution['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
           <?php
//print_r($distribution);
//die;
?> 


   <div class="box-body">
                
                <div class="form-row">
                  
                <div class="form-group col-md-6 required">

                   <label for="exampleInputEmail1"  class="control-label">@lang('menu.taxon', array(),Session::get('language_val'))</label>
                  {!! Form::select('taxon_id',$taxonrecodsql,null,['class'=>'form-control','placeholder'=>'Select Taxon','required'=>'required','id' => 'taxon_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group col-md-4 required">
                   
                      <p style="font-weight:bold;">@lang('menu.selection_criteria', array(),Session::get('language_val'))</p>
              
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="radio"  class="geniusrecord" name="selectioncriteria" <?php if($distribution->selectioncriteria=='genus'){?> checked <?php } ?> id="genus" value="genus">
                        <label for="inlineCheckbox2"> Genus / Species / Sub-species </label>
                    </div>
                    <div class="checkbox checkbox-inline">
                        <input type="radio" name="selectioncriteria" class="geniusrecord" <?php if($distribution->selectioncriteria=='commonname'){?> checked <?php } ?> id="inlineCheckbox3" value="commonname">
                        <label for="inlineCheckbox3"> Common Name (English) </label>
                    </div>
                      <div class="checkbox checkbox-inline" style="margin-left: 0px;">
                        <input type="radio" name="selectioncriteria" class="geniusrecord" <?php if($distribution->selectioncriteria=='commonnamefr'){?> checked <?php } ?> id="inlineCheckbox3" value="commonnamefr">
                        <label for="inlineCheckbox3"> Common Name (French) </label>
                    </div>  
             
             
             
             
               </div>
                <div id="div_show">    
               <?php if($distribution->selectioncriteria=='genus'){?>  
                    <div class="form-group col-md-2 required">
                        <input type="text" class="form-control" name="specie_data" readonly=""  value="<?php echo $distribution->specie_data; ?>">
                        <input type="hidden" class="form-control" name="specie_id" readonly=""  value="<?php echo $distribution->specie_id; ?>">
                   </div>
                <?php } ?>
                    
                <?php if($distribution->selectioncriteria=='commonname'){?>  
                    <div class="form-group col-md-2 required">
                        <input type="text" class="form-control" name="specie_data" readonly=""  value="<?php echo $distribution->specie_data; ?>">
                        <input type="hidden" class="form-control" name="specie_id"   value="<?php echo $distribution->specie_id; ?>">
                   </div>
                <?php } ?>  
                    
                     <?php if($distribution->selectioncriteria=='commonnamefr'){?>  
                    <div class="form-group col-md-2 required">
                        <input type="text" class="form-control" name="specie_data" readonly=""  value="<?php echo $distribution->specie_data; ?>">
                        <input type="hidden" class="form-control" name="specie_id"   value="<?php echo $distribution->specie_id; ?>">
                   </div>
                <?php } ?>  
                    
                    
                    </div>   
                   <div class="form-group col-md-2 required" id="displ" style="display:none;">
                    <span id="speciessel"> </span>  
                   </div>
                    
                    
                    
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group col-md-6 required">
                    <label for="exampleInputEmail1"  class="control-label">@lang('menu.method', array(),Session::get('language_val'))</label>
<!--                  {!! Form::label('Method','Method',['class'=>'control-label']) !!}-->
                  {!! Form::select('method_id',$methodrecodsql,null,['class'=>'form-control','placeholder'=>'Select Method','required'=>'required','id' => 'method_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group  col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.observation', array(),Session::get('language_val'))</label>    
<!--                 {!! Form::label('Observation','Observation',['class'=>'control-label']) !!}-->
                  {!! Form::select('observation_id',$observationrecodsql,null,['class'=>'form-control','placeholder'=>'Select Observation','required'=>'required','id' => 'observation_id']) !!}
              
                      
                      
                      
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('gazetteer_id') ? ' has-error' : '' }} col-md-6 required">
                   <label for="exampleInputEmail1"  class="control-label">@lang('menu.place', array(),Session::get('language_val'))</label>
                  {!! Form::select('gazetteer_id',$gazetteerrecodsql,null,['class'=>'form-control','placeholder'=>'Select Place','required'=>'required','id' => 'gazetteer_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }} col-md-2 ">
                   {!! Form::label('day',Lang::get('menu.day', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  <select name='day' class="form-control">
                      <option value="">Select Day</option>
                    <?php for($i=1;$i<=31;$i++){ ?>  
                      <option value="<?php echo $i; ?>" <?php if($distribution->day==$i){?> selected <?php } ?> ><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                  </div>  
                  <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }} col-md-2">
                   {!! Form::label('Month',Lang::get('menu.month', array(),Session::get('language_val')),['class'=>'control-label']) !!}
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
                  {!! Form::label('Year',Lang::get('menu.year', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                 <select name='year' class="form-control" paceholder='sfdgfdg'>
                      <option value="">Select Year</option>
                    <?php for($i=1950;$i<=2050;$i++){ ?>  
                      <option value="<?php echo $i; ?>" <?php if($distribution->year==$i){?> selected <?php } ?>><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                  </div>    
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.number', array(),Session::get('language_val'))</label>
                  <input type="text" name="number" value="{{ $distribution->number }}"   class="form-control" id="taxon_code" placeholder="Number">
                 @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required ">
                      <label for="exampleInputEmail1"  class="control-label">@lang('menu.observer', array(),Session::get('language_val'))</label>
<!--                  {!! Form::label('Observer','Observer',['class'=>'control-label']) !!}-->
<!--                  {!! Form::select('observer_id',$observerrecodsql,null,['class'=>'form-control','placeholder'=>'Select Observer','required'=>'required','id' => 'observer_id']) !!}-->
                  <select class="form-control" required="required" id="observer_id" name="observer_id">
                      <option  value="">Select Observer</option>
                      <?php  
                      $sql=DB::table('observers')->get(); 
                      foreach($sql  as  $val){
                          //if($val->first_name!='' && $val->last_name!=''){
                         
                      ?>
                      <?php
                       echo $distribution->observer_id;
                          echo "f";
                      
                      ?>
                      <?php if($val->first_name!='' && $val->last_name!=''){ ?>
                      <option value="<?php echo $val->id; ?>" <?php if($val->id==$distribution->observer_id){echo 'selected="selected"';} ?>><?php if($val->first_name!=''){ echo $val->first_name; } ?> <?php  if($val->last_name!=''){  echo $val->last_name;}  ?></option>
                      <?php } ?>
                      <?php if($val->institution!=''){ ?>
                      <option value="<?php echo $val->id; ?>" <?php if($val->id==$distribution->observer_id){echo 'selected="selected"';} ?>><?php  echo $val->institution;  ?> </option>
                      <?php } ?>
                          <?php //}else{ ?>
                     
                          
                          
                          
                          
                         <?php  } ?>
                      </select>
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  <div class="form-group col-md-6 custom-range">
                 {!! Form::label('AgeGroup',Lang::get('menu.age_group', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('age_id',$agerecodsql,null,['class'=>'form-control','placeholder'=>'Select Age Group','id' => 'age_id']) !!}
                
                  
                  </div>  
                 
    
                  
                  <div class="form-group col-md-6 ">
                      <label for="exampleInputEmail1" class="control-label">@lang('menu.abundance', array(),Session::get('language_val'))</label>    
<!--                  {!! Form::label('AbundanceCode','Abundance',['class'=>'control-label']) !!}-->
                  {!! Form::select('abundance_id',$abundancerecodsql,null,['class'=>'form-control','placeholder'=>'Select Abundance','id' => 'abundance_id']) !!}
                 
                   </div>  
                  
                </div> 
       
       <?php if($distribution->specimendata==1){ ?>
                   <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <input type="checkbox" id="specimendata" <?php if($distribution->specimendata==1){?>checked readonly=""<?php } ?> >
                        <label for="inlineCheckbox1"> @lang('menu.specimen_code', array(),Session::get('language_val')) </label>
                    </div>    
                   </div> 
       
                 <div class="form-row div_specimen" >
                  
                <div class="form-group col-md-6 ">
<label for="exampleInputEmail1" class="control-label">@lang('menu.specimen_code', array(),Session::get('language_val'))</label>
                  <input type="text" name="specimencode" value="{{ $distribution->specimencode }}"   class="form-control" id="specimen" placeholder="Specimen Code">
                 @if ($errors->has('specimencode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('specimencode') }}</strong>
                                    </span>
                                @endif
                  
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('collectorinstitution') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.collector_institution', array(),Session::get('language_val'))</label>
                  <input type="text" name="collectorinstitution" value="{{ $distribution->collectorinstitution }}"   class="form-control" id="collectorinstitution" placeholder="Collector Institution">
                 @if ($errors->has('collectorinstitution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('collectorinstitution') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div>  
       <?php } ?>            
                  
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                 <label for="exampleInputEmail1" class="control-label">@lang('menu.sex', array(),Session::get('language_val'))</label>       
<!--                 {!! Form::label('Sex','Sex',['class'=>'control-label']) !!}-->
                  {!! Form::select('Sex',[
                    'Male' => 'Male',
                    'Female' => 'Female',
                    ],isset($distribution->Sex)? $distribution->Sex:null,['class'=>'form-control','placeholder'=>'Select Sex']) !!} 
                    
                  
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                      
                   <label for="exampleInputEmail1" class="control-label">@lang('menu.remarks', array(),Session::get('language_val'))</label>
                  <input type="text" name="remark" value="{{ $distribution->remark }}"   class="form-control" id="remark" placeholder="Remarks">
                 @if ($errors->has('remark'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remark') }}</strong>
                                    </span>
                                @endif
                      
                  
                  </div>  
                  
                </div> 
                  
                       
                  
                  
                  
                  
                
                 
                  
                
                 
                  
                 
                  
             
                  
              </div>    
              
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">@lang('menu.update', array(),Session::get('language_val'))</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


