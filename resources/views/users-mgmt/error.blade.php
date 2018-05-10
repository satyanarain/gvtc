@extends('users-mgmt.errorbase')
@section('action-content')
<?php $session_lan= Session::get('language_val'); ?> 
    <!-- Main content -->
    
    
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
<!--          <h3 class="box-title">Permission Log</h3>-->
        </div>
       
    </div>
  </div>
  
   
  
            <div class="box-body">
             
             <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops!</h3>
          
          <p>Access Denied !!</p>

          <p>
            Looks like you don’t have permission to access this page. Please contact your administrator <a href="/home">return to dashboard</a> 
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


