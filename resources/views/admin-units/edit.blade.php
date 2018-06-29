@extends('admin-units.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">List of Water Use</h3>
                 <div class="pull-right">
<a href="{{ route('admin-unit.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($adminunits, ['method' => 'PATCH','route' => ['admin-unit.update', $adminunits['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
    <?php //print_r($endenisms);die; ?>        
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6 required">
                       <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.admin_unit', array(),Session::get('language_val')) @lang('menu.name', array(),Session::get('language_val'))</label>
                  <input type="text" name="name" value="{{ $adminunits->name }}"   class="form-control" id="status" placeholder="Name">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>   
                    
                    
                  
                <div class="form-group col-md-6  required">
                     <span class="lang-sm" lang="en"></span>
                   {!! Form::label('Country',Lang::get('menu.country',array(),Session::get('language_val')),['class'=>'control-label']) !!}
                  {!! Form::select('countrie_id',$countryrecodsql,isset($adminunits->countrie_id) ? $adminunits->countrie_id : selected,['class'=>'form-control','placeholder'=>'Select Country','required'=>'required']) !!}  
                  </div>  
                  
                  
                 
                  
                </div> 
                  
                   
                   <div class="form-row">
                        
                       
                      <div class="form-group{{ $errors->has('admincode') ? ' has-error' : '' }} col-md-6 required">
                          <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.admin_unit_type', array(),Session::get('language_val'))</label>
                  <input type="text" name="admincode" value="{{ $adminunits->admincode }}" required  class="form-control" id="status" placeholder="Admin Code">
                 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admincode') }}</strong>
                                    </span>
                                @endif
                  </div>    
                       
                       
                   <div class="form-group{{ $errors->has('name_fr') ? ' has-error' : '' }} col-md-6 required">
                          <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.admin_unit_type', array(),Session::get('language_val'))</label>
                  <input type="text" name="name_fr" value="{{ $adminunits->name_fr }}" required  class="form-control" id="status" placeholder="Name">
                 @if ($errors->has('name_fr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_fr') }}</strong>
                                    </span>
                                @endif
                  </div> 
                
                  
                  
                   
                  
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


