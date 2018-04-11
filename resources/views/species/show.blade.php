@extends('species.base')

@section('action-content')
<?php //print_r($species); die; ?>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.view', array(),Session::get('language_val')) @lang('menu.species', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('species.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.taxon', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $species->taxon_code }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.order', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->order }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.family', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $species->family }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.genus', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->genus }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                    <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.species', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $species->species }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.species_author', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->species_author }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                    <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.subspecies', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $species->subspecies }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1"> @lang('menu.sub_species_author', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->subspecies_author }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
               
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-3">
                  <label for="exampleInputEmail1">@lang('menu.common_name_english', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $species->common_name }}"  class="form-control" >
                 
                  </div> 
                  <div class=" col-md-3">
                  <label for="exampleInputEmail1">@lang('menu.common_name_french', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $species->common_name_fr }}"  class="form-control" >
                 
                  </div>     
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.IUCN_threat_code', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->iucn_threat_id }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
               <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.range', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{$range}}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.growthform', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->growth_id }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.forestuse', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{ $species->forestuse_id }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.waterUse', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->wateruse_id }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                   
                   
                   
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.endemism', array(),Session::get('language_val')) </label>
                  <input type="text" readonly  value="{{ $species->endenisms_id }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.migration', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->migration_tbl_id }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                   
                    <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.national_threat_code', array(),Session::get('language_val')) </label>
                  <input type="text" readonly  value="{{ $species->national_threat_code_id }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.breeding', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->breeding_id }}" readonly=""  class="form-control">
                
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


