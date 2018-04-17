<!-- Footer -->
<footer class="py-5 bg-dark">
<div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Gvtc 2018</p>
</div>
<!-- /.container -->
</footer>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset ("/front/js/bootstrap.min.js") }}"></script>
 
<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/datatables.min.css')}}"/>
<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

<style>
.navbar{border-radius: 0px !important;}
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover{ background:#20c997 !important}
.pagination>li>a, .pagination>li>span {border:none; }
.pagination>li>a, .pagination>li>span{color:black !important }
#example1_length{ float:left;}
</style>
<script>
$(function () {
$('#example1').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": false,
    "ordering": false,
    "order": [[0, 'desc']],
    "info": false,
    "autoWidth": true,
    "aoColumnDefs": [
        {
            'bSortable': false,
            'aTargets': ['action', 'text-holder']
        }]



})
})
</script>
</body>
</html>
