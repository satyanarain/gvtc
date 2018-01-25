@extends('protected-areas.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">View Protected Area</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Protected Area Name </label>
                  <input type="text" readonly  value="{{ $protectedarea->protected_area_name }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Country</label>
                  <input  value="{{ $protectedarea->country }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                  
                   
                 <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Protected Area Code</label>
                  <input type="text" readonly  value="{{ $protectedarea->protected_area_code }}"  class="form-control" >
                 
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


