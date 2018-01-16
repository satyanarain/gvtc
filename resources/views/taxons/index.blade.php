@extends('taxons.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Taxon Code Log</h3>
        </div>
        <div class="col-sm-4" >
 <a class="btn btn-primary btn-template" href="{{ route('taxons.create') }}"><span class="glyphicon glyphicon-plus" title="Add"></span>&nbsp;Add</a>
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
                  <th>Taxon Code Description</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                    
                @foreach($taxons as $taxon) 
                
                <tr>
                   <td style="display:none">{{ $taxon['id'] }}</td>
                  <td>{{ $taxon['taxon_code'] }}</td>
                  <td>{{ $taxon['taxon_code_description'] }}</td>
                 
                  <td>
                   
                   <form class="row" method="POST" action="{{ route('taxons.destroy', $taxon['id']) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="{{ route('taxons.show', $taxon['id']) }}"  class="btn btn-info mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="View" style="margin-left:15px;"><i class="fa fa-search"></i>&nbsp;View</a>                        
<a href="{{ route('taxons.edit', $taxon['id']) }}" style="margin-left: 15px;" class="btn btn-bitbucket mini blue-stripe" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
<i class="fa fa-pencil"></i>&nbsp;Edit</a>
                        
                        <button type="submit" class="btn btn-google mini blue-stripe" id="id_of_your_button" style="margin-left: 20px;"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Delete</button>
                       
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
