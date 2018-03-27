@extends('observers.base')

@section('action-content')
<script type="text/javascript">
   var obrv_id = '<?php echo $last_observeid; ?>'; 
</script>    
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Observer</h3>
              <div class="pull-right">
<a href="{{ route('observer.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php print_r($errors->any()); ?>
           @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
      @endif
            <form role="form" method="POST" action="{{ route('observer.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                
                <fieldset class="form-group row">
      <legend class="col-form-legend col-sm-2">Observers Type</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="observeroption" id="Individual" value="Individual" >
            Individual
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="observeroption" id="Institution" value="Institution">
            Institution
          </label>
        </div>
      
      </div>
    </fieldset>
                <div class="div_individual" style="display:none"> 
              <div class="box-body">
                <input type="hidden" name="observer_id"  value="{{ 'GVTCOBS'.$last_observeid }}" required  class="observer_id form-control" id="observer_id" placeholder="Observer ID">
                
                   <div class="form-row" style="display:none" id="individual">
                  
                  <div class="form-group col-md-6 required"> 
                    {!! Form::label('Title','Title',['class'=>'control-label']) !!}
                  {!! Form::select('tittle',['Prof'=>'Prof','Dr'=>'Dr','Mr'=>'Mr','Ms'=>'Ms'],null,['class'=>'form-control','placeholder'=>'Selecte Tittle','required'=>'required']) !!}
                    
                    </div> 
                       
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">First Name</label>
                  <input type="text" name="first_name" value="{{ old('first_name') }}" required  class="form-control" id="taxon_code" placeholder="First Name">
                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                  </div>     
                  
                  
                   </div>
                  
                   <div class="form-row">
                  
                
                 <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }} col-md-6 required" id="institution" style="display:none">
                  <label for="exampleInputEmail1" class="control-label">Institution</label>
                  <input type="text" name="institution" value="{{ old('institution') }}" required  class="form-control" id="institution" placeholder="Institution">
                 @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  
                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6 required" id="las_tname" style="display:none">
                  <label for="exampleInputEmail1" class="control-label">Last Name</label>
                  <input type="textarea" name="last_name" value="{{ old('last_name') }}"   class="form-control" id="last_name" placeholder="Last Name">
                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                     
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Address</label>
                  <input type="textarea" name="address" value="{{ old('address') }}" required  class="form-control" id="address" placeholder="Address">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>     
                       
                  
                </div> 
                  
                  
                  
                  
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('work_tel_number') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Work Tel. Number</label>
                  <input type="text" name="work_tel_number" value="{{ old('work_tel_number') }}" required  class="form-control" id="work_tel_number" placeholder="Work Tel. Number">
                 @if ($errors->has('work_tel_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('work_tel_number') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Mobile</label>
                  <input type="tel" name="mobile" value="{{ old('mobile') }}" required  class="form-control" id="taxon_code_description" placeholder="Mobile">
                 @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                  <div class="form-row">
                  
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Email</label>
                  <input type="email" name="email" value="{{ old('email') }}" required  class="form-control" id="taxon_code" placeholder="Email">
                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Website</label>
                  <input type="text" name="website" value="{{ old('website') }}" required  class="form-control" id="taxon_code_description" placeholder="Website">
                 @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
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
