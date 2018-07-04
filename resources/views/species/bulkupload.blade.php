@extends('species.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bulk Upload Species Records</h3>
              <div class="pull-right">
<a href="{{ route('species.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form role="form" method="POST"  action="{{ route('species.bulkcreat') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="box-body">
            <div class="form-row">
                
                <div class="form-group col-md-2 custom-range">
                 
                </div>
                
                <div class="form-group col-md-4 custom-range text-center">
                 
                 <a href="{{ asset('images/species_template.csv') }}" target="_blank"><img src="{{ asset('images/DownloadExcel.png') }}" height="200" width="200"/></a>
                 <br /><h2> Download Template </h2>
                </div>  
                   
                
            <div class="form-group col-md-4 text-center">
            <img src="{{ asset('images/uploadExcel.png') }}" height="200" width="200" style="cursor:pointer" id="bulkuploadimg"/>
            <br /><h2> Upload Species Records </h2> 
            </div>
             <div class="form-group col-md-2 custom-range">
                 
                </div>   
               
            </div> 
                
                
                
                   
                <div class="form-row " id="div_img" style="display:none;">
                <div class=" col-md-6 ">
                <label for="exampleInputEmail1" class="control-label">Upload Species Record</label>
                <span class="badge bg-green"><input accept=".csv" name="documents1" type="file" required ></span>
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

