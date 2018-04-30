<!-- Footer -->
    <footer class="custom-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-left">
            <span class="copyright">Copyright © 2018 <a href="http://opiant.in/" target="_blank">Opiant</a>. All rights reserved.</span>
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
<script src="{{ asset ("/front/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- Plugin JavaScript -->
<!-- Custom scripts for this template -->
<script src="{{ asset ("/front/js/gvtc.js") }}"></script>
<script src="{{ asset ("/front/vendor/jquery-easing/jquery.easing.min.js") }}"></script>
  </body>

</html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
 <script>
  $(function () {
    $('#example').DataTable({  
      "paging"      : true,
      "lengthChange": true,
      "searching"   : true,
      "ordering"    : true,
      "order"       : [[0,'desc']],
      "info"       : true,
      "autoWidth"   : false,
       "aoColumnDefs" : [
 {
   'bSortable' : false,
   'aTargets' : [ 'action', 'text-holder' ]
 }]
 
 
 
})
  })
</script>
 