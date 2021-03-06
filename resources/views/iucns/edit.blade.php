@extends('iucns.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.update', array(),Session::get('language_val')) @lang('menu.IUCN_threat_code', array(),Session::get('language_val'))</h3>
                   <div class="pull-right">
<a href="{{ route('iucns.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($iucn, ['method' => 'PATCH','route' => ['iucns.update', $iucn['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('iucn_threat_code') ? ' has-error' : '' }} col-md-6 required">
                    <span class="lang-sm" lang="en"></span>&nbsp;
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.IUCN_threat_code', array(),Session::get('language_val'))</label>
                  <input type="text" name="iucn_threat_code" value="{{ $iucn->iucn_threat_code }}" required  class="form-control" id="taxon_code" placeholder="IUCN Threat Code">
                 @if ($errors->has('taxon_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iucn_threat_code') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('iucn_code_description') ? ' has-error' : '' }} col-md-6 required">
                      <span class="lang-sm" lang="en"></span>&nbsp;
                  <label for="exampleInputEmail1" class="control-label">IUCN Threat @lang('menu.code_description', array(),Session::get('language_val')) </label>
                  <input type="textarea" name="iucn_code_description" value="{{ $iucn->iucn_code_description }}" required  class="form-control" id="taxon_code_description" placeholder="IUCN Code Description">
                 @if ($errors->has('taxon_code_description'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('iucn_code_description') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                   
                   
               <div class="form-row">
                   <div class="form-group{{ $errors->has('iucn_code_description_fr') ? ' has-error' : '' }} col-md-6 required">
                  <span class="lang-sm" lang="fr"></span>&nbsp;     
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.IUCN_code_description', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="iucn_code_description_fr" value="{{ $iucn->iucn_code_description_fr }}" required  class="form-control" id="IUCN Code Description_fr" placeholder="IUCN Code Description">
                 @if ($errors->has('taxon_code_description_fr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iucn_code_description_fr') }}</strong>
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


