@extends('species.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Create Species</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form role="form" method="POST" action="{{ route('species.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group col-md-6 required">

                  {!! Form::label('Taxon','Taxon',['class'=>'control-label']) !!}
                  {!! Form::select('taxon_id',$taxonrecodsql,null,['class'=>'form-control']) !!}
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
                  
                  
                  <div class="form-group{{ $errors->has('species_author') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Species Author</label>
                  <input type="text" name="species_author" value="{{ old('species_author') }}" required  class="form-control" id="species_author" placeholder="Species Author">
                 @if ($errors->has('species_author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('species_author') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('subspecies') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">Subspecies</label>
                  <input type="text" name="subspecies" value="{{ old('subspecies') }}" required  class="form-control" id="subspecies" placeholder="Subspecies">
                 @if ($errors->has('subspecies'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subspecies') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('subspecies_author') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Subspecies Author</label>
                  <input type="text" name="subspecies_author" value="{{ old('subspecies_author') }}" required  class="form-control" id="subspecies_author" placeholder="Subspecies Author">
                 @if ($errors->has('subspecies_author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subspecies_author') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('common_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">Common Name</label>
                  <input type="text" name="common_name" value="{{ old('common_name') }}" required  class="form-control" id="taxon_code" placeholder="Common Name">
                 @if ($errors->has('common_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('common_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required">
                      
                  {!! Form::label('iucn_threat_id','IUCNThreatCode',['class'=>'control-label']) !!}
                  {!! Form::select('iucn_threat_id',$iucnrecodsql,null,['class'=>'form-control']) !!}   
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 required">
                  {!! Form::label('Range','Range',['class'=>'control-label']) !!}
                  {!! Form::select('range_id',$rangerecordsql,null,['class'=>'form-control']) !!} 
                  
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required">
                      
                  {!! Form::label('GrowthForm','GrowthForm',['class'=>'control-label']) !!}
                  {!! Form::select('growth_id',$growthrecordsql,null,['class'=>'form-control']) !!}     
                   </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  
                <div class="form-group col-md-6 required">
                    
                  {!! Form::label('ForestUse','ForestUse',['class'=>'control-label']) !!}
                  {!! Form::select('forestuse_id',$forestusesql,null,['class'=>'form-control']) !!}    
                  
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required">
                      
                   {!! Form::label('WaterUse','WaterUse',['class'=>'control-label']) !!}
                  {!! Form::select('wateruse_id',$waterusesql,null,['class'=>'form-control']) !!}     
                  
                  </div>  
                  
                </div> 
                  
                       <div class="form-row">
                  
                <div class="form-group col-md-6 required">
                    
                   {!! Form::label('Endemism','Endemism',['class'=>'control-label']) !!}
                  {!! Form::select('endenisms_id',$endemismsql,null,['class'=>'form-control']) !!}    
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required">
                    {!! Form::label('Migration','Migration',['class'=>'control-label']) !!}
                  {!! Form::select('migration_tbl_id',$migrationsql,null,['class'=>'form-control']) !!}    
                      
                      
                      
                  
                  </div>  
                  
                </div> 
                  
                  
                  
                  
                
                 
                  
                
                 
                  
                 
                  
             
                  
              </div>    
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">Create</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection
