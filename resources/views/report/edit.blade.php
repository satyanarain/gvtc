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
              <h3 class="box-title">Update Report Record</h3>
              <div class="pull-right">
<a href="{{ url('report/uploadreport/') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
   
            <!-- /.box-header -->
            <!-- form start -->
<?php //print_r($specie);die; ?>
{!! Form::model($reportval, ['method' => 'PATCH','route' => ['report.update', $reportval['id']],'files'=>true,'enctype' => 'multipart/form-data']) !!}
          


   <div class="box-body">
       
       
       
       <div class="form-row">
                  
                <div class="form-group{{ $errors->has('report_title') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">Report Title</label>
                  <input type="text" name="report_title"  value="{{ $reportval['report_title'] }}"   required=""  class="form-control" id="report_title" placeholder="Report Title">
                 @if ($errors->has('report_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('report_title') }}</strong>
                                    </span>
                                @endif
                  </div>  
        
           
                  
                  
                  <div class="form-group col-md-6 required ">
                  {!! Form::label('Report Category','Report Category',['class'=>'control-label']) !!}
    {!! Form::select('report_categories_id',$reportcargorysql,null,['class'=>'form-control','placeholder'=>'Select Report Category','required'=>'required','id' => 'report_categories_id']) !!}
                 
                  </div>  
                  
                </div> 
       
       
       
       
       
        <div class="form-row">
                  <div class="form-group col-md-6 custom-range required">
                 {!! Form::label('Uplaod Report','Uplaod Report',['class'=>'control-label']) !!}
                 <input type="file"  accept=".pdf"  onchange="validFile(this,1)" name="uploded_report" id="documents3">
                 
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


