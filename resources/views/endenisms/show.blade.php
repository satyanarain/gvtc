@extends('endenisms.base')

@section('action-content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.view', array(),Session::get('language_val')) @lang('menu.endenism', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('endenism.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.endenism', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $endenisms->endenism }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.endenism_status', array(),Session::get('language_val'))</label>
                  <input  value="{{ $endenisms->endenism_status}}" readonly=""  class="form-control">
                
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


