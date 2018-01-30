@extends('species.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Species Log</h3>
        </div>
        <div class="col-sm-4" >
 <a class="btn btn-primary btn-template" href="{{ route('species.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;@lang('menu.add', array(),$session_lan= Session::get('language_val'))</a>
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
                  <th>Taxon Code</th>
                  <th>Order</th>
                  <th>Family</th>
                  <th>Genus</th>
                  <th>Species</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                   <?php //print_r($val); die; ?> 
                @foreach($species as $val) 
                
                <tr>
                   <td style="display:none">{{ $val->id }}</td>
                  <td>{{ $val->taxon_code }}</td>
                  <td>{{ $val->order }}</td>
                  <td>{{ $val->family}}</td>
                  <td>{{ $val->genus }}</td>
                  <td>{{ $val->species }}</td>
                 

                 
                  <td>
                   
                   <form class="row" method="POST" action="{{ route('species.destroy', $val->id) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('species.show', $val->id) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
<a href="{{ route('species.edit', $val->id) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
<i class="fa fa-pencil"></i>&nbsp;Edit</a>
                        
                        <button type="submit" class="btn btn-google mini blue-stripe" id="id_of_your_button" style="margin-left: 20px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                       
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
