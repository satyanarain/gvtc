@extends('species.base')

@section('action-content')

    
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Species</h3>
              <div class="pull-right">
<a href="{{ route('species.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form role="form" method="POST" action="{{ route('species.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group col-md-6 required">

                  {!! Form::label('Taxon','Taxon',['class'=>'control-label']) !!}
                  {!! Form::select('taxon_id',$taxonrecodsql,null,['class'=>'form-control','placeholder'=>'Select Taxon','required'=>'required','id' => 'taxon_id']) !!}
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Order</label>
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
                  <label for="exampleInputEmail1"  class="control-label">Family</label>
                  <input type="text" name="family" value="{{ old('family') }}" required  class="form-control" id="family" placeholder="Family">
                 @if ($errors->has('family'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('genus') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Genus</label>
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
                  <label for="exampleInputEmail1"  class="control-label">Species</label>
                  <input type="text" name="species" value="{{ old('species') }}" required  class="form-control" id="species" placeholder="Species">
                 @if ($errors->has('species'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('species') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('species_author') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1" class="control-label">Species Author</label>
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
                  <label for="exampleInputEmail1"  class="control-label">Sub-species</label>
                  <input type="text" name="subspecies" value="{{ old('subspecies') }}"   class="form-control" id="subspecies" placeholder="Subspecies">
                 @if ($errors->has('subspecies'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subspecies') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">Sub-species Author</label>
                  <input type="text" name="subspecies_author" value="{{ old('subspecies_author') }}"   class="form-control" id="subspecies_author" placeholder="Subspecies Author">
                 @if ($errors->has('subspecies_author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subspecies_author') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('common_name') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1"  class="control-label">Common Name</label>
                  <input type="text" name="common_name" value="{{ old('common_name') }}"   class="form-control" id="taxon_code" placeholder="Common Name">
                 @if ($errors->has('common_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('common_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                      
                  {!! Form::label('iucn_threat_id','IUCN Threat Code',['class'=>'control-label']) !!}
                  {!! Form::select('iucn_threat_id',$iucnrecodsql,null,['class'=>'form-control','placeholder'=>'Select IUCN Threat Code']) !!}   
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                      <style>
                          
                          
                      </style>
   
                <div class="form-group col-md-6 custom-range">
                  {!! Form::label('Range','Range',['class'=>'control-label']) !!}
                  {!! Form::select('range_id[]',$rangerecordsql,null,['class'=>'form-control','id'=>"lstFruits",'multiple'=>"multiple"]) !!} 
                  
                  </div>  
                 
    
                  
                  <div class="form-group col-md-6 " id="growth_id_div" style='display:none;'>
                      
                  {!! Form::label('Growth Form','Growth Form',['class'=>'control-label']) !!}
                  {!! Form::select('growth_id',$growthrecordsql,null,['class'=>'form-control','placeholder'=>'Select Growth Form','id' => 'growth_id']) !!}     
                   </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                    
                  {!! Form::label('ForestUse','Forest Use',['class'=>'control-label']) !!}
                  {!! Form::select('forestuse_id',$forestusesql,null,['class'=>'form-control','placeholder'=>'Select Forest Use']) !!}    
                  
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                      
                   {!! Form::label('WaterUse','Water Use',['class'=>'control-label']) !!}
                  {!! Form::select('wateruse_id',$waterusesql,null,['class'=>'form-control','placeholder'=>'Select Water Use']) !!}     
                  
                  </div>  
                  
                </div> 
                  
                       <div class="form-row">
                  
                <div class="form-group col-md-6 ">
                    
                   {!! Form::label('Endemism','Endemism',['class'=>'control-label']) !!}
                  {!! Form::select('endenisms_id',$endemismsql,null,['class'=>'form-control','placeholder'=>'Select Endemism']) !!}    
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6 ">
                    {!! Form::label('Migration','Migration',['class'=>'control-label']) !!}
                  {!! Form::select('migration_tbl_id',$migrationsql,null,['class'=>'form-control','placeholder'=>'Select Migration']) !!}    
                      
                      
                      
                  
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

