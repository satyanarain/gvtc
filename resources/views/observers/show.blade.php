@extends('observers.base')

@section('action-content')
<?php //print_r($observers);die; ?>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.view', array(),Session::get('language_val')) @lang('menu.observer', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('observer.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.observer_id', array(),Session::get('language_val')) </label>
                  <input type="text" readonly  value="{{ $observers->observer_id }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.title', array(),Session::get('language_val'))</label>
                  <input  value="{{ $observers->tittle }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                  
               
                  <div class="form-row">
                  
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.first_name', array(),Session::get('language_val'))</label>
                  <input type="text"readonly  value="{{ $observers->first_name }}"  class="form-control"  >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.last_name', array(),Session::get('language_val'))</label>
                  <input type="text" readonly name="last_name" value="{{ $observers->last_name }}"  class="form-control" >
                 
                  </div>  
                  
                </div>    
                   
                    <div class="form-row">
                  
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.institution', array(),Session::get('language_val'))</label>
                  <input type="text" name="institution" value="{{ $observers->institution }}" readonly  class="form-control" id="institution" placeholder="Institution">
                
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.address', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="address"value="{{ $observers->address }}" readonly  class="form-control" id="address" placeholder="Address">
                 
                  </div>  
                  
                </div>  
                   
                   
                    <div class="form-row">
                  
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.work_tel_number', array(),Session::get('language_val'))</label>
                  <input type="text" name="work_tel_number" value="{{ $observers->work_tel_number }}" readonly  class="form-control" id="work_tel_number" placeholder="Work Tel. Number">
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.mobile', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="mobile" value="{{ $observers->mobile }}" readonly  class="form-control" id="taxon_code_description" placeholder="Mobile">
                
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


