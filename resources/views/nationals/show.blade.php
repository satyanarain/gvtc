@extends('nationals.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.view', array(),Session::get('language_val')) @lang('menu.national_threat_code', array(),Session::get('language_val'))</h3>
               <div class="pull-right">
<a href="{{ route('nationals.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.national_threat_code', array(),Session::get('language_val')) </label>
                  <input type="text" readonly name="national_threat_code" value="{{ $national->national_threat_code }}" required  class="form-control" id="taxon_code" placeholder="IUCN Threat Code">
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.national_threat_code', array(),Session::get('language_val')) @lang('menu.description', array(),Session::get('language_val')) </label>
                  <input  name="national_threat_code_description" value="{{ $national->national_threat_code_description }}" readonly=""  class="form-control">
                
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


