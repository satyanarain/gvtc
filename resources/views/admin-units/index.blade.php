@extends('admin-units.base')
@section('action-content')
<?php  //print_r($adminunits); die; ?>
    <!-- Main content -->
    
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Admin Unit Log</h3>
        </div>
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('admin-unit.create') }}" data-placement="top" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;
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
                  <th>Country</th>
                  <th>AdminCode</th>
                  <th>Designation</th>
                  <th>Name</th>
                
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                 
                @foreach($adminunits as $adminunit) 
                
                
                <tr>
                  <td style="display:none">{{ $adminunit['id'] }}</td>  
                  <td>{{ $adminunit['country'] }}</td>
                  <td>{{ $adminunit['admincode'] }}</td>
                  <td>{{ $adminunit['designation'] }}</td>
                  <td>{{ $adminunit['name'] }}</td>
                
                 <?php //print_r($endenism); die; ?>
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('admin-unit.destroy', $adminunit['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('admin-unit.show', $adminunit['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('admin-unit.edit', $adminunit['id']) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;Edit</a>
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
