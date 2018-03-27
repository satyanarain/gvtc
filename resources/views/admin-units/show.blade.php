@extends('admin-units.base')

@section('action-content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">View Admin Unit</h3>
                 <div class="pull-right">
<a href="{{ route('admin-unit.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    <div class="col-md-6">
                  <label for="exampleInputEmail1">Admin Unit Name</label>
                  <input  value="{{ $adminunits->name }}" readonly=""  class="form-control">
                
                  </div>  
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Country </label>
                  <input type="text" readonly  value="{{ $adminunits->country }}"  class="form-control" >
                 
                  </div>  
                  
                  
                   
                  
                </div> 
                   
                    <div class="form-row">
                    
                    
                    
                    <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Admin Unit Type</label>
                  <input  value="{{ $adminunits->admincode }}" readonly=""  class="form-control">
                
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


