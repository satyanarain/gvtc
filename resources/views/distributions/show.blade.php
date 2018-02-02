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
              <h3 class="box-title">View Species</h3>
              <div class="pull-right">
<a href="{{ route('species.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Taxon Code </label>
                  <input type="text" readonly  value="{{ $species->taxon_code }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Order</label>
                  <input  value="{{ $species->order }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Family </label>
                  <input type="text" readonly  value="{{ $species->family }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Genus</label>
                  <input  value="{{ $species->genus }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                    <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Species</label>
                  <input type="text" readonly  value="{{ $species->species }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Species Author</label>
                  <input  value="{{ $species->species_author }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                    <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Subspecies</label>
                  <input type="text" readonly  value="{{ $species->subspecies }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Subspecies Author</label>
                  <input  value="{{ $species->subspecies_author }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
               
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Common Name</label>
                  <input type="text" readonly  value="{{ $species->common_name }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">IUCNThreatCode</label>
                  <input  value="{{ $species->iucn_threat_id }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
               <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Rang</label>
                  <input type="text" readonly  value="{{$range}}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">GrowthForm</label>
                  <input  value="{{ $species->growth_id }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">ForestUse</label>
                  <input type="text" readonly  value="{{ $species->forestuse_id }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">WaterUse</label>
                  <input  value="{{ $species->wateruse_id }}" readonly=""  class="form-control">
                
                  </div>  
                  
                </div> 
                   
                   
                   
                   
                   
                   
                   <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">Endemism </label>
                  <input type="text" readonly  value="{{ $species->endenisms_id }}"  class="form-control" >
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Migration</label>
                  <input  value="{{ $species->migration_tbl_id }}" readonly=""  class="form-control">
                
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


