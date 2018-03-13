@extends('users-mgmt.errorbase')
@section('action-content')
<?php $session_lan= Session::get('language_val'); ?> 
    <!-- Main content -->
    
    
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Error Log</h3>
        </div>
       
    </div>
  </div>
  
   
  
            <div class="box-body">
             
             <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="/">return to dashboard</a> 
          </p>

         
        </div>
                
                
                
                
                
                
                

   
   
                
                
                
            </div>
            <!-- /.box-body -->
  
  
  
  
  
  

  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  @endsection


