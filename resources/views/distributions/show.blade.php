@extends('distributions.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.view', array(),Session::get('language_val')) @lang('menu.distribution_records', array(),Session::get('language_val'))</h3>
             <div class="pull-right">
<a href="{{ route('distribution.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
              <?php
              
              //dd($distribution);
              
              ?>
            <!-- /.box-header -->
            <!-- form start -->

 <div class="box-body">
                
                <div class="form-row">
                  
                <div class="form-group col-md-6 required">

                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.taxon', array(),Session::get('language_val'))</label>
                   <input type="text" readonly  value=" {{$distribution->taxon_code_description}}({{ $distribution->taxon_code }})"  class="form-control" >
                  </div>  
                  
                  
                  <div class="form-group col-md-3 required">
                   
                      <p style="font-weight:bold;">@lang('menu.selection_criteria', array(),Session::get('language_val'))</p>
              
                    <input type="text" readonly  value="{{ $distribution->selectioncriteria }}"  class="form-control" >
              </div>  
                    
                    
                    
                    
                   <div class="form-group col-md-3 required">
                   
                      <p style="font-weight:bold;">@lang('menu.species', array(),Session::get('language_val'))</p>
              
                    <input type="text" readonly  value="{{ $distribution->species }}"  class="form-control" >
              </div>  
                    
                    
                    
                    
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group col-md-6 required">
<!--                  {!! Form::label('Method','Method',['class'=>'control-label']) !!}-->
 <label for="exampleInputEmail1"  class="control-label">@lang('menu.method', array(),Session::get('language_val'))</label>
                 <input type="text" readonly  value="{{ $distribution->code_description }} ({{ $distribution->method_code }})"  class="form-control" >

                  </div>  
                  
                  
                  <div class="form-group  col-md-6 ">
<!--                 {!! Form::label('Observation','Observation',['class'=>'control-label']) !!}-->
<label for="exampleInputEmail1"  class="control-label">@lang('menu.observation', array(),Session::get('language_val'))</label>
               <input type="text" readonly  value="{{$distribution->observationd}} ({{ $distribution->observation_code }})"  class="form-control" >

              
                      
                     
                      
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }} col-md-6 required">
                    <label for="exampleInputEmail1"  class="control-label">@lang('menu.place', array(),Session::get('language_val'))</label>
<!--                   {!! Form::label('Place','Place',['class'=>'control-label']) !!}-->
                  <input type="text" readonly  value="{{ $distribution->place }}"  class="form-control" >
                  </div>  
                  
                  
                 
                  
               
                  
                  
                  
                  
                  
                 
                  
                  
                  
                  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2 ">
                   {!! Form::label('day',Lang::get('menu.day', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  <input type="text" readonly  value="{{ $distribution->day }}"  class="form-control" >
                  </div>  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2">
                      {!! Form::label('Month',Lang::get('menu.month', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                   <input type="text" readonly  value="{{ $distribution->month }}"  class="form-control" >
                  </div>  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-2 ">
                      {!! Form::label('Year',Lang::get('menu.year', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  <input type="text" readonly  value="{{ $distribution->year }}"  class="form-control" >
                  </div>    
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }} col-md-6 ">
                   <label for="exampleInputEmail1"  class="control-label">@lang('menu.number', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $distribution->number }}"  class="form-control" >
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required ">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.observer', array(),Session::get('language_val'))</label>    
<!--                  {!! Form::label('Observer','Observer',['class'=>'control-label']) !!}-->
                  <input type="text" readonly  value="{{ $distribution->last_name }} {{ $distribution->institution }}"  class="form-control" >
                  
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  <div class="form-group col-md-6 custom-range">
                 {!! Form::label('AgeGroup',Lang::get('menu.age_group', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                 <input type="text" readonly  value="{{ $distribution->agesd }} <?php if($distribution->age_group==''){  }else{ echo '(';} ?> {{ $distribution->age_group }} <?php if($distribution->age_group==''){  }else{ echo ')';} ?>"  class="form-control" >
                
                  
                  </div>  
                 
    
                  
                  <div class="form-group col-md-6 ">
                   <label for="exampleInputEmail1" class="control-label">@lang('menu.abundance', array(),Session::get('language_val'))</label>    
<!--                  {!! Form::label('AbundanceCode','Abundance',['class'=>'control-label']) !!}-->
                  <input type="text" readonly  value="{{ $distribution->abundancesd }}  <?php if($distribution->abundance_group==''){  }else{ echo '(';} ?> {{ $distribution->abundance_group }} <?php if($distribution->abundance_group==''){  }else{ echo ')';} ?>"  class="form-control" >
                 
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
<label for="exampleInputEmail1" class="control-label">@lang('menu.specimen_code', array(),Session::get('language_val'))</label>
                   <input type="text" readonly  value="{{ $distribution->specimencode }}"  class="form-control" >
                  
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('collectorinstitution') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.collector_institution', array(),Session::get('language_val'))</label>
                   <input type="text" readonly  value="{{ $distribution->collectorinstitution }}"  class="form-control" >
                  </div>  
                  
                </div>  
                  
                  
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                 <label for="exampleInputEmail1" class="control-label">@lang('menu.sex', array(),Session::get('language_val'))</label>   
<!--                 {!! Form::label('Sex','Sex',['class'=>'control-label']) !!}-->
                  <input type="text" readonly  value="{{ $distribution->Sex }}"  class="form-control" >
                    
                  
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                    <label for="exampleInputEmail1" class="control-label">@lang('menu.remarks', array(),Session::get('language_val'))</label>  
<!--                   <label for="exampleInputEmail1" class="control-label">Remarks</label>-->
                   <input type="text" readonly  value="{{ $distribution->remark }}"  class="form-control" >
                 
                      
                  
                  </div>  
                  
                </div> 
                  
                       
                  
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                 <label for="exampleInputEmail1" class="control-label">@lang('menu.habitat', array(),Session::get('language_val'))</label>   
<!--                 {!! Form::label('Sex','Sex',['class'=>'control-label']) !!}-->
                  <input type="text" readonly  value="{{ $distribution->habitat }}"  class="form-control" >
                    
                  
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


