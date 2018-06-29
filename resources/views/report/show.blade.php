@extends('report.breadcrumb.bred')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.view', array(),Session::get('language_val')) @lang('menu.report', array(),Session::get('language_val')) @lang('menu.record', array(),Session::get('language_val'))</h3>
             <div class="pull-right">
<a href="{{ url('report/uploadreport/') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

 <div class="box-body">
                
                <div class="form-row">
                    
  
                    
                    
                    
                      <div class="form-group col-md-6">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.report_title', array(),Session::get('language_val'))</label>
                  <input type="text" name="report_title"  value="{{ $reportresult->report_title }}"   required=""  class="form-control" id="report_title" placeholder="Report Title">
                 
                               
                  </div>  
        
                     
                  
                  
                  <div class="form-group col-md-6">
                  {!! Form::label('Report Category',Lang::get('menu.report_category', array(),Session::get('language_val')),['class'=>'control-label']) !!}
    <input type="text" name="report_title"  value="{{ $reportresult->title }}"   required=""  class="form-control" id="report_title" placeholder="Report Title">
                 
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


