@extends('nationals.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">View National Threat Code</h3>
               <div class="pull-right">
<a href="{{ route('nationals.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
 
               <div class="box-body">
                  
                <div class="form-row">
                    
                    
                    
                    
                    
                  
                <div class=" col-md-6">
                  <label for="exampleInputEmail1">National Threat Code</label>
                  <input type="text" readonly name="national_threat_code" value="{{ $national->national_threat_code }}" required  class="form-control" id="taxon_code" placeholder="IUCN Threat Code">
                 
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">National Threat Code Description</label>
                  <input  name="national_threat_code_description" value="{{ $national->national_threat_code_description }}" readonly=""  class="form-control">
                
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


