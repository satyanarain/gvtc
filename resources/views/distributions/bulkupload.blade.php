@extends('distributions.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bulk Upload Distribution Records</h3>
              <div class="pull-right">
<a href="{{ route('distribution.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form role="form" method="POST"  action="{{ route('distribution.bulkcreat') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="box-body">
            <div class="form-row">
                
                <div class="form-group col-md-2 custom-range">
                 
                </div>
                
                <div class="form-group col-md-4 custom-range">
                 <label for="inlineCheckbox1"> Download Template </label>
                 <a href="{{ asset('images/distributions.csv') }}" target="_blank"><img src="{{ asset('images/DownloadExcel.png') }}" height="200" width="200"/></a>
                </div>  
                   
                
            <div class="form-group col-md-4">
            <label for="inlineCheckbox1"> Upload Distribution Records </label>   
            <img src="{{ asset('images/uploadExcel.png') }}" height="200" width="200" style="cursor:pointer" id="bulkuploadimg"/>
            </div>
             <div class="form-group col-md-2 custom-range">
                 
                </div>   
               
            </div> 
                
                
                
                   
                <div class="form-row " id="div_img" style="display:none;">
                <div class=" col-md-6 ">
                <label for="exampleInputEmail1" class="control-label">Upload Distribution Record</label>
                <span class="badge bg-green"><input accept=".csv" name="documents1" id="documents1" onchange="validFile(this,1)" type="file" required ></span>
                </div>  
                </div>  
                  
                  
                
                  
                  
                  
                  
                  
                
                 
                  
                
                 
                  
                 
                  
             
                  
              </div>    
              <!-- /.box-body -->
                
              <div class="box-footer">
                  <button type="submit"  class="btn btn-primary btn-sub">@lang('menu.save', array(),Session::get('language_val'))</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection

