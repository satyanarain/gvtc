@extends('observers.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            
            
                   
                <fieldset class="form-group row">
                    <legend class="col-form-legend col-sm-2">@lang('menu.observer_type', array(),Session::get('language_val'))</legend> <div style='font-weight:bold;'>{{ $observers->observeroption}}</div>
      <div class="col-sm-10">
       
        
      
      </div>
    </fieldset>
     <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.update', array(),Session::get('language_val')) @lang('menu.observer', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('observer.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($observers, ['method' => 'PATCH','route' => ['observer.update', $observers['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                 <?php if($observers->observeroption!='Institution'){ ?> 
                <div class="form-row">
<!--                   <label for="exampleInputEmail1" class="control-label">Observer ID</label>-->
                <div class="form-group{{ $errors->has('observer_id') ? ' has-error' : '' }} col-md-6 required">
<!--                  <label for="exampleInputEmail1" class="control-label">Observer ID</label>-->
                  <input type="hidden" name="observer_id" readonly="" value="{{ $observers->observer_id }}" required  class="form-control" id="observer_id" placeholder="Taxon Code">
                 @if ($errors->has('observer_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observer_id') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
<!--                  <div class="form-group{{ $errors->has('tittle') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Title</label>
                  <input type="textarea" name="tittle" value="{{ $observers->tittle }}" required  class="form-control" id="taxon_code_description" placeholder="Title">
                 @if ($errors->has('tittle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tittle') }}</strong>
                                    </span>
                                @endif
                  </div>  -->
 <div class="form-group col-md-12 required"> 
                    {!! Form::label('Title',Lang::get('menu.title',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('tittle',['Prof.'=>'Prof.','Dr.'=>'Dr.','Mr.'=>'Mr.','Ms.'=>'Ms.'],isset($observers->tittle) ? $observers->tittle : 'selected',['class'=>'form-control','placeholder'=>'Selecte Tittle','required'=>'required']) !!}
                    
                    </div> 
                 
                </div> 
                
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.first_name', array(),Session::get('language_val'))</label>
                  <input type="text" name="first_name" value="{{ $observers->first_name}}"   class="form-control" id="taxon_code" placeholder="First Name">
                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.last_name', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="last_name" value="{{  $observers->last_name }}" required  class="form-control" id="last_name" placeholder="Last Name">
                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div>    
                  <?php } ?>    
                  <div class="form-row">
                 <?php if($observers->observeroption!='Individual'){ ?>
                <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.institution', array(),Session::get('language_val'))</label>
                  <input type="text" name="institution" value="{{  $observers->institution }}" required  class="form-control" id="institution" placeholder="Institution">
                 @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  <?php } ?>
                  
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.address', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="address" value="{{  $observers->address }}"   class="form-control" id="address" placeholder="Address">
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
                  <input type="text" name="work_tel_number" value="{{ $observers->work_tel_number }}"   class="form-control" id="work_tel_number" placeholder="Work Tel. Number">
                 @if ($errors->has('work_tel_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('work_tel_number') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.mobile', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="mobile" value="{{  $observers->mobile }}"   class="form-control" id="taxon_code_description" placeholder="Mobile">
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
                  <input type="text" name="email" value="{{  $observers->email }}"   class="form-control" id="taxon_code" placeholder="Email">
                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} col-md-6 ">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.website', array(),Session::get('language_val'))</label>
                  <input type="text" name="website" value="{{  $observers->website }}"   class="form-control" id="taxon_code_description" placeholder="Website">
                 @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
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


