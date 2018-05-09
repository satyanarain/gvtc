@extends('report.breadcrumb.brcreate')

@section('action-content')

    
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.add', array(),Session::get('language_val')) @lang('menu.upload_reports', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ url('report/uploadreport/') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form role="form" method="POST"  action="{{ route('report.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
             
                  
                 
                  
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('report_title') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1"  class="control-label">@lang('menu.report_title', array(),Session::get('language_val'))</label>
                  <input type="text" name="report_title" value="{{ old('report_title') }}" required=""  class="form-control" id="report_title" placeholder="@lang('menu.report_title', array(),Session::get('language_val'))">
                 @if ($errors->has('report_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('report_title') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group col-md-6 required ">
                      
                  {!! Form::label('Report Category',Lang::get('menu.report_category', array(),Session::get('language_val')),['class'=>'control-label']) !!}
    {!! Form::select('report_categories_id',$reportcargorysql,null,['class'=>'form-control','placeholder'=>'Select Report Category','required'=>'required','id' => 'report_categories_id']) !!}
                 
                  </div>  
                  
                </div> 
                  
                  <div class="form-row">
                  <div class="form-group col-md-6 custom-range required">
                 {!! Form::label('upload Report',Lang::get('menu.upload_report', array(),Session::get('language_val')),['class'=>'control-label']) !!}
                 <input type="file"  accept=".pdf" required="" onchange="validdocument(this,1)" name="uploded_report" id="documents3">
                
                
                  </div>  
                 
    
                
                  
                </div> 
                  
                
                  
                  
                <input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
                       
                  
                  
                  
                  
                
                 
                  
                
                 
                  
                 
                  
             
                  
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

