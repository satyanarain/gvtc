@extends('distributions.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">View Distribution Record</h3>
             <div class="pull-right">
<a href="{{ route('distribution.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

 <div class="box-body">
                
                <div class="form-row">
                  
                <div class="form-group col-md-6 required">

                  {!! Form::label('Taxon','Taxon',['class'=>'control-label']) !!}
                   <input type="text" readonly  value="{{ $distribution->taxon_id }}"  class="form-control" >
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required">
                   
                      <p style="font-weight:bold;">@lang('menu.selection_criteria', array(),Session::get('language_val'))</p>
              
                    <input type="text" readonly  value="{{ $distribution->selectioncriteria }}"  class="form-control" >
             
             
             
             
               </div>  
                   <div class="form-group col-md-2 required" id="displ" style="display:none;">
                    <span id="speciessel"> </span>  
                   </div>
                    
                    
                    
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group col-md-6 required">
                  {!! Form::label('Method','Method',['class'=>'control-label']) !!}
                 <input type="text" readonly  value="{{ $distribution->method_id }}"  class="form-control" >

                  </div>  
                  
                  
                  <div class="form-group  col-md-6 ">
                 {!! Form::label('Observation','Observation',['class'=>'control-label']) !!}
               <input type="text" readonly  value="{{ $distribution->observation_id }}"  class="form-control" >

              
                      
                      
                      
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }} col-md-6 required">
                   {!! Form::label('Place','Place',['class'=>'control-label']) !!}
                  <input type="text" readonly  value="{{ $distribution->gazetteer_id }}"  class="form-control" >
                  </div>  
                  
                  
                 
                  
               
                  
                  
                  
                  
                  
                 
                  
                  
                  
                  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2 ">
                   {!! Form::label('day','Day',['class'=>'control-label']) !!}
                  <input type="text" readonly  value="{{ $distribution->day }}"  class="form-control" >
                  </div>  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2">
                      {!! Form::label('Month','Month',['class'=>'control-label']) !!}
                   <input type="text" readonly  value="{{ $distribution->month }}"  class="form-control" >
                  </div>  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2 ">
                      {!! Form::label('Year','Year',['class'=>'control-label']) !!}
                  <input type="text" readonly  value="{{ $distribution->year }}"  class="form-control" >
                  </div>    
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Number</label>
                  <input type="text" readonly  value="{{ $distribution->number }}"  class="form-control" >
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required ">
                      
                  {!! Form::label('Observer','Observer',['class'=>'control-label']) !!}
                  <input type="text" readonly  value="{{ $distribution->observer_id }}"  class="form-control" >
                  
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  <div class="form-group col-md-6 custom-range">
                 {!! Form::label('AgeGroup','Age Group',['class'=>'control-label']) !!}
                 <input type="text" readonly  value="{{ $distribution->age_id }}"  class="form-control" >
                
                  
                  </div>  
                 
    
                  
                  <div class="form-group col-md-6 ">
                      
                  {!! Form::label('AbundanceCode','Abundance Code',['class'=>'control-label']) !!}
                  <input type="text" readonly  value="{{ $distribution->abundance_id }}"  class="form-control" >
                 
                   </div>  
                  
                </div> 
                   <div class="form-row">
                    <div class="form-group col-md-12 ">
                    <input type="checkbox" id="specimendata" value="1">
                        <label for="inlineCheckbox1"> Specimen Data </label>
                    </div>    
                   </div>   
                 <div class="form-row div_specimen">
                  
                <div class="form-group col-md-6 ">
<label for="exampleInputEmail1" class="control-label">Specimen Code</label>
                   <input type="text" readonly  value="{{ $distribution->specimencode }}"  class="form-control" >
                  
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('collectorinstitution') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">Collector Institution</label>
                   <input type="text" readonly  value="{{ $distribution->collectorinstitution }}"  class="form-control" >
                  </div>  
                  
                </div>  
                  
                  
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                    
                 {!! Form::label('Sex','Sex',['class'=>'control-label']) !!}
                  <input type="text" readonly  value="{{ $distribution->Sex }}"  class="form-control" >
                    
                  
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                      
                   <label for="exampleInputEmail1" class="control-label">Remarks</label>
                   <input type="text" readonly  value="{{ $distribution->remark }}"  class="form-control" >
                 
                      
                  
                  </div>  
                  
                </div> 
                  
                       
                  
                  
                  
                  
                
                 
                  
                
                 
                  
                 
                  
             
                  
              </div>  
            
 
             
              <!-- /.box-body -->
                
             
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


