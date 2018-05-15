@extends('report.breadcrumb.bredit')
@section('action-content')
<?php //print_r($reportval);die; ?>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.update', array(),Session::get('language_val')) @lang('menu.report', array(),Session::get('language_val')) @lang('menu.record', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ url('report/uploadreport/') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
   
            <!-- /.box-header -->
            <!-- form start -->
<?php //print_r($specie);die; ?>
{!! Form::model($reportval, ['method' => 'PATCH','route' => ['report.update', $reportval['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
          


   <div class="box-body">
       
       
       
       <div class="form-row">
                  
                <div class="form-group{{ $errors->has('report_title') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.report_title', array(),Session::get('language_val'))</label>
                  <input type="text" name="report_title"  value="{{ $reportval['report_title'] }}"   required=""  class="form-control" id="report_title" placeholder="Report Title">
                 @if ($errors->has('report_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('report_title') }}</strong>
                                    </span>
                                @endif
                  </div>  
        
           
                  
                  
                  <div class="form-group col-md-6 required ">
                  {!! Form::label('Report Category',Lang::get('menu.report_category', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                   <?php if(Session::get('language_val')=='en'){ ?>
    {!! Form::select('report_categories_id',$reportcargorysql,null,['class'=>'form-control','placeholder'=>Lang::get('menu.select_report_category', array(),Session::get('language_val')),'required'=>'required','id' => 'report_categories_id']) !!}
     <?php }else{ ?>
    {!! Form::select('report_categories_id',$reportcargorysql_fr,null,['class'=>'form-control','placeholder'=>Lang::get('menu.select_report_category', array(),Session::get('language_val')),'required'=>'required','id' => 'report_categories_id']) !!}
     <?php } ?>
    
   
    
    
    
                  </div>  
                  
                </div> 
       
       
       
       
       
        <div class="form-row">
                  <div class="form-group col-md-6 custom-range required">
                 {!! Form::label('Uplaod Report',Lang::get('menu.upload_report', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                 <input type="file"  accept=".pdf"  onchange="validdocument(this,1)" name="uploded_report" id="documents3">
                 
                 <?php $docname=$reportval['uploded_report']; ?>
                 </br>
                 <a  onClick="openTab(this)"  href="{{ asset("report_document/$docname") }}" target="_blank"><img src="{{ asset('images/pdf_download.png') }}"/></a>
                
              
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


