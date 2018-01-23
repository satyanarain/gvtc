@extends('observations.base')
@section('action-content')
<?php //print_r($observation);die; ?>
    <!-- Main content -->
    
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Method Log </h3>
        </div>
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('observation.create') }}" data-placement="top" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;
@lang('menu.add', array(),Session::get('language_val'))
         
              </a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  @include('partials.message')
   <!-- /.box-header -->
   
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">id</th>  
                  <th>Observation Code</th>
                  <th>Code Description</th>
                
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                 
                @foreach($observation as $observations) 
                <?php //print_r($observations); die; ?>
                
                <tr>
                  <td style="display:none">{{ $observations['id'] }}</td>  
                  <td>{{ $observations['observation_code'] }}</td>
                  <td>{{ $observations['code_description'] }}</td>
                
                 
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('observation.destroy', $observations['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('observation.show', $observations['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('observation.edit', $observations['id']) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;Edit</a>
<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Delete</button>
                       
                    </form>
                      
                      
                     </td>
                </tr>
               
              @endforeach
              
              
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
  
  
  
  
  
  

  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection
