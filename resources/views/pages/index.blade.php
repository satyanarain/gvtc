@extends('layouts_frontend.masterlayout')
@section('action-content')

 <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <h1 class="my-4">GVTC
                    <small>Database Search</small>
                </h1>

                <!-- Blog Post -->
                <div class="card my-4">
                <input type="text" name="search_text" title="Enter a search term (taxonomic name to species level or common name)"  autocomplete="off" id="search" class="form-control" placeholder="Enter search term(s)...">
                
                </div>
                <div id="txtHint" class="title-color" style="padding-top:20px; text-align:center;" ><b>Species information will be listed here...</b></div>




                






            </div>

            <!-- Sidebar Widgets Column -->


        </div>
        <!-- /.row -->

</div>



<script>
$(document).ready(function(){
   $("#search").keyup(function(){
       var str=  $("#search").val();
       if(str == "") {
               $( "#txtHint" ).html("<b>Blogs information will be listed here...</b>"); 
       }else {
               $.get( "{{ url('/livesearch?id=') }}"+str, function( data ) {
                   $( "#txtHint" ).html( data );  
            });
       }
   });  
}); 
</script>













@endsection









