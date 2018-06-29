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
                  <label for="exampleInputEmail1">@lang('menu.sub_species', array(),Session::get('language_val'))</label>
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
                 <input  value="<?php if(Session::get('language_val')=='en'){ ?> {{ $species->iucn_code_description }} <?php }else{ ?> {{ $species->iucn_code_description_fr }} <?php } ?> ({{ $species->iucn_threat_code }})" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
               <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.range', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="{{$range}}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.growth_form', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->plants_growth_form }}({{ $species->growth_form }})" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.forest_use', array(),Session::get('language_val'))</label>
                  <input type="text" readonly  value="<?php if(Session::get('language_val')=='en'){ ?>{{ $species->forest_habitat_usage }} <?php }else{ ?> {{ $species->forest_habitat_usage_fr }} <?php } ?> ({{ $species->forest_use }})"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.water_use', array(),Session::get('language_val'))</label>
                  <input  value="<?php if(Session::get('language_val')=='en'){ ?> {{ $species->water_habitat_usage }} <?php }else { ?> {{ $species->water_habitat_usage_fr }} <?php } ?> ({{ $species->water_use }})" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                   
                   
                   
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.endemism', array(),Session::get('language_val')) </label>
                  <input type="text" readonly  value="<?php if(Session::get('language_val')=='en'){ ?>{{ $species->endenism_status }}<?php }else{ ?>{{ $species->endenism_status_fr }}<?php } ?> ({{ $species->endenism }})"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.migration', array(),Session::get('language_val'))</label>
                  <input  value="<?php if(Session::get('language_val')=='en'){ ?>{{ $species->birds_migrating_population }}<?php }else{ ?>{{ $species->birds_migrating_population_fr }}<?php } ?>({{ $species->migration_title }})" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                   
                    <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.national_threat_code', array(),Session::get('language_val')) </label>
                  <input type="text" readonly  value="{{ $species->national_threat_code_description }} ({{ $species->national_threat_code }})"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.breeding', array(),Session::get('language_val'))</label>
                  <input  value="{{ $species->breeding_description }}({{ $species->breeding_code}})" readonly=""  class="form-control">
                
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


