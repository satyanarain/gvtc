<!-- Footer -->
    <footer class="custom-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-left">
<!--            <span class="copyright">Copyright © 2018 <a href="http://opiant.in/" target="_blank">Opiant</a>. All rights reserved.</span>-->
          </div>
          <div class="col-md-6">
            <ul class="list-inline social-buttons pull-right">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
 <!-- Bootstrap core JavaScript -->

<!-- Plugin JavaScript -->
<!-- Custom scripts for this template -->



<script src="{{ asset ("/front/bootstrap/js/jquery.min.js") }}"></script>
<script src="{{ asset ("/front/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset ("/front/js/gvtc.js") }}"></script>

  </body>

</html>

<script type="text/javascript" class="init">	
$(document).ready(function(startup) {
	$('#example').DataTable( {
              
		dom: 'Bfrtip',
               
		buttons: [
			 'csv', 'excel', 'pdf'
		]
             } );
} );

</script>
<script type="text/javascript" class="init">	
$(document).ready(function(startup) {
	$('#exampledemo').DataTable( {
            "searching": false,  
		
             } );
} );

</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<style type="text/css" class="init"></style>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
 