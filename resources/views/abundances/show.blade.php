@extends('abundances.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.view', array(),Session::get('language_val')) @lang('menu.abundance', array(),Session::get('language_val'))</h3>
               <div class="pull-right">
<a href="{{ route('abundance.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1">@lang('menu.abundance_group', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $abundances->abundance_group}}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1">@lang('menu.code_description', array(),Session::get('language_val'))</label>
                  <input  value="{{ $abundances->code_description}}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                  
                   <div class="form-row">
                    
                  
                  
                  
                  <div class="form-group col-md-6">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1">@lang('menu.code_description', array(),Session::get('language_val'))</label>
                  <input  value="{{ $abundances->code_description_fr}}" readonly=""  class="form-control">
                
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


