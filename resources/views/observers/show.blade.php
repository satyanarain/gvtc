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
              <h3 class="box-title">View Observer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Observer ID </label>
                  <input type="text" readonly  value="{{ $observers->observer_id }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Title</label>
                  <input  value="{{ $observers->tittle }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                  
               
                  <div class="form-row">
                  
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text"readonly  value="{{ $observers->first_name }}"  class="form-control"  >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" readonly name="last_name" value="{{ $observers->last_name }}"  class="form-control" >
                 
                  </div>  
                  
                </div>    
                   
                    <div class="form-row">
                  
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Institution</label>
                  <input type="text" name="institution" value="{{ $observers->institution }}" readonly  class="form-control" id="institution" placeholder="Institution">
                
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="textarea" name="address"value="{{ $observers->address }}" readonly  class="form-control" id="address" placeholder="Address">
                 
                  </div>  
                  
                </div>  
                   
                   
                    <div class="form-row">
                  
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Work Tel. Number</label>
                  <input type="text" name="work_tel_number" value="{{ $observers->work_tel_number }}" readonly  class="form-control" id="work_tel_number" placeholder="Work Tel. Number">
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Mobile</label>
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


