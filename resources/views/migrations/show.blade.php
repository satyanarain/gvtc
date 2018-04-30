@extends('migrations.base')

@section('action-content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.view', array(),Session::get('language_val')) @lang('menu.migration', array(),Session::get('language_val')) </h3>
              <div class="pull-right">
<a href="{{ route('migration.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                    <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1">@lang('menu.migration', array(),Session::get('language_val')) </label>
                  <input type="text" readonly  value="{{ $migrations->migration_title }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                      <span class="lang-sm" lang="en"></span>
                  <label for="exampleInputEmail1">@lang('menu.birds_migrating_populations', array(),Session::get('language_val'))</label>
                  <input  value="{{ $migrations->birds_migrating_population }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                 <div class="form-row">
                    
                    
               
                  
                  
                  <div class="form-group col-md-6">
                      <span class="lang-sm" lang="fr"></span>
                  <label for="exampleInputEmail1">@lang('menu.birds_migrating_populations', array(),Session::get('language_val'))</label>
                  <input  value="{{ $migrations->birds_migrating_population_fr }}" readonly=""  class="form-control">
                
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


