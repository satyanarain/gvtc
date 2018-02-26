@extends('forest.base')
@section('action-content')
<?php //print_r($forests);die; ?>
    <!-- Main content -->
    
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Forest Used Log</h3>
        </div>
        <div class="col-sm-4" >
          <a class="btn btn-primary btn-template" href="{{ route('forest.create') }}" data-placement="top" data-toggle="tooltip" data-original-title="Add"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;
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
                  <th>Forest Used </th>
                  <th>Forest Habitat Usage</th>
                
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                 
                @foreach($forests as $forest) 
                <?php //print_r($protectedarea); die; ?>
                
                <tr>
                  <td style="display:none">{{ $forest['id'] }}</td>  
                  <td>{{ $forest['forest_use'] }}</td>
                  <td>{{ $forest['forest_habitat_usage'] }}</td>
                
                 
                  <td>
                      
                      <form class="row" method="POST" action="{{ route('forest.destroy', $forest['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('forest.show', $forest['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
<a class="btn btn-bitbucket mini blue-stripe" style="margin-left: 15px;" href="{{ route('forest.edit', $forest['id']) }}" data-placement="top" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i>&nbsp;Edit</a>
<!--<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->
<?php testdatas('forestuse',$forest['id'],$forest['status']); ?>   
                       
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
