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
              <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.observer', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('observer.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
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
      
      <form role="form" method="POST" action="{{ route('observer.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                
                <fieldset class="form-group row">
      <label class="col-form-legend col-sm-2" style="padding-left: 42px;margin-top: 6px;">@lang('menu.select_type_of_observer', array(),Session::get('language_val'))</label>
      <div class="col-sm-10" style="margin-top: 6px;">
          <div class="form-check" style="float: left;margin-right: 20px;">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="observeroption" id="Individual" value="Individual" >
            @lang('menu.individual', array(),Session::get('language_val'))
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="observeroption" id="Institution" value="Institution">
            @lang('menu.institution', array(),Session::get('language_val'))
          </label>
        </div>
      
      </div>
    </fieldset>
                
                
                
                
                <div class="div_individual" style="display:none"> 
              <div class="box-body">
                <input type="hidden" name="observer_id"  value="{{ 'GVTCOBS'.$last_observeid }}" required  class="observer_id form-control" id="observer_id" placeholder="Observer ID">
                
                   <div class="form-row" style="display:none" id="individual">
                  
                  <div class="form-group col-md-6"> 
                    {!! Form::label('Title',Lang::get('menu.title',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                    <?php if(Session::get('language_val')=='en'){ ?>
                  {!! Form::select('tittle',['Prof.'=>'Prof.','Dr.'=>'Dr.','Mr.'=>'Mr.','Ms.'=>'Ms.'],null,['class'=>'form-control','id'=>'title','placeholder'=>'Select Title']) !!}
                    <?php }else{ ?>
                  {!! Form::select('tittle',['Prof.'=>'Prof.','Dr.'=>'Dr.','Mr.'=>'Mr.','Ms.'=>'Ms.'],null,['class'=>'form-control','id'=>'title','placeholder'=>'Sélectionnez le titre']) !!}
                    <?php } ?>
                    </div> 
                       
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.first_name', array(),Session::get('language_val'))</label>
                  <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"   class="form-control" id="taxon_code" placeholder="@lang('menu.first_name', array(),Session::get('language_val'))">
                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                  </div>     
                  
                  
                   </div>
                  
                   <div class="form-row">
                  
                
                 <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }} col-md-6 required"  id="institution_label" style="display:none">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.institution_name', array(),Session::get('language_val'))</label>
                  <input type="text" name="institution"  value="{{ old('institution') }}"  required="" class="form-control" id="institution_field"  placeholder="@lang('menu.institution_name', array(),Session::get('language_val'))">
                 @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  
                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6 required" id="las_tname" style="display:none">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.last_name', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="last_name" value="{{ old('last_name') }}" required onkeydown = "return Check(event)"  class="form-control" id="last_name" placeholder="@lang('menu.last_name', array(),Session::get('language_val'))">
                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                     
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.address', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="address" value="{{ old('address') }}"   class="form-control" id="address" placeholder="@lang('menu.address', array(),Session::get('language_val'))">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>     
                       
                  
                </div> 
                  
                  
                  
                  
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('work_tel_number') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.work_tel_number', array(),Session::get('language_val'))</label>
                  <input type="number" name="work_tel_number" value="{{ old('work_tel_number') }}"   class="form-control" id="work_tel_number" placeholder="@lang('menu.work_tel_number', array(),Session::get('language_val'))">
                 @if ($errors->has('work_tel_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('work_tel_number') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.mobile', array(),Session::get('language_val'))</label>
                  <input type="tel" name="mobile" maxlength="10" value="{{ old('mobile') }}" required  onkeypress="return isNumberKey(event)"  class="form-control" id="taxon_code_description" placeholder="@lang('menu.mobile', array(),Session::get('language_val'))">
                 @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                  <div class="form-row">
                  
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.email', array(),Session::get('language_val'))</label>
                  <input type="email" name="email" value="{{ old('email') }}"   class="form-control" id="taxon_code" placeholder="@lang('menu.email', array(),Session::get('language_val'))">
                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.website', array(),Session::get('language_val'))</label>
                  <input type="text" name="website" value="{{ old('website') }}"   class="form-control" id="taxon_code_description" placeholder="@lang('menu.website', array(),Session::get('language_val'))">
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
              
              
              
                   <div class="form-group col-md-6">
             <input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
            </div>  
              
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub" id='sub_bt' style='display:none;'>@lang('menu.save', array(),Session::get('language_val'))</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection
