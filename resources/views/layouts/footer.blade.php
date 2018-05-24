
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="http://opiant.in/" target="_blank">Opiant</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
 
</div>
<!-- ./wrapper -->



</body>
</html>
<!-- jQuery 3 -->

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset ("/bower_components/jquery-ui/jquery-ui.min.js") }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<!-- Morris.js charts -->
<script src="{{ asset ("/bower_components/raphael/raphael.min.js") }}"></script>
<script src="{{ asset ("/bower_components/morris.js/morris.min.js") }}"></script>
<!-- Sparkline -->
<script src="{{ asset ("/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js") }}"></script>
<!-- jvectormap -->
<script src="{{ asset ("/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
<script src="{{ asset ("/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ("/bower_components/jquery-knob/dist/jquery.knob.min.js") }}"></script>
<!-- daterangepicker -->
<script src="{{ asset ("/bower_components/moment/min/moment.min.js") }}"></script>
<script src="{{ asset ("/bower_components/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
<!-- datepicker -->
<script src="{{ asset ("/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset ("/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
<!-- Slimscroll -->
<script src="{{ asset ("/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset ("/bower_components/fastclick/lib/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/dist/js/adminlte.min.js") }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset ("/dist/js/pages/dashboard.js") }}"></script>
<script src="{{ asset ("/dist/js/dropzone.js") }}"></script>
 

<!-- AdminLTE for demo purposes -->
<script src="{{ asset ("/dist/js/demo.js") }}"></script>
<?php if(Session::get('language_val')=='en'){?>
<script src="{{ asset ("/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<?php }else { ?>
<script src="{{ asset ("/bower_components/datatables.net/js/fr-jquery.dataTables.min.js") }}"></script>
<?php } ?>
<script src="{{ asset ("/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
@stack('datatable_data')
 <script>
  $(function () {
    $('#example1').DataTable({  
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

    
<script type="text/javascript">
$('#calendar').datepicker({
todayHighlight: true
   });
//$(document).ready(function(){
//    $(".sidebar-toggle").on("click",function(){
//        //if($(".logo-lg").is(':visible'))
//        if($('body').hasClass('sidebar-collapse'))
//        {
//            $(".new_logo_holder").html('');
//            //alert('if');
//            //$(".new_logo_holder").html('<span class="logo-lg"><img src="{{ asset('images/gvtcLogolong.jpg') }}"/></span>');
//        }else{
//            //$(".new_logo_holder").html('');
//            //alert('else');
//            $(".new_logo_holder").html('<span class="logo-lg"><img src="{{ asset('images/gvtcLogolong.jpg') }}"/></span>');
//        }
//    })
//})

</script> 

<script>
$(document).ready(function(){
$('#taxon_id').change(function(){
    $taxonid=$(this).val();
    if($taxonid==1){
        $("#growth_id_div").show();
    }else{
     $("#growth_id_div").hide();
    }
//alert($(this).val());
});
   
});    
</script>
<script>
$(document).ready(function(){
var taxonidval= $("#taxon_id").val();;
 //alert(taxonidval);
if(taxonidval==1){
        $("#growth_id_div").show();
    }else{
        
        
        $("#growth_id_div").hide();
    }
    
    
    
$('#taxon_id').change(function(){
    $taxonid=$(this).val(); 
    if($taxonid==1){
        $("#growth_id_div").show();
    }else{
     $("#growth_id_div").hide();
    }
}); 



$('#taxon_id').change(function(){
    $taxonid=$(this).val(); 
    if($taxonid==6){
        $("#breeding_div").show();
    }else{
     $("#breeding_div").hide();
    }
}); 
if(taxonidval==6){
        $("#breeding_div").show();
    }else{
        
        
        $("#breeding_div").hide();
    }

});
//sorticonremove
$(document).ready(function(){
$("#example1 th:last-child").removeClass("sorting");
$("#example1 th:last-child").addClass("sort");
});
//radiobutton
$(document).ready(function(){
$(function() {
    $('input[name="observeroption"]').on('click', function() {
        if ($(this).val() == 'Individual') {
            var newobrv_id = 'GVTCINV'+obrv_id;
            $('#institution_field').removeAttr('required');
            $("#institution_label").hide();
            $('#observer_id').val(newobrv_id);
             $(".div_individual").show();
             $("#individual").show();
             $("#las_tname").show();
              //$("#institution_label").hide();
              $("#sub_bt").show();
               $('#first_name').addAttr('required');
            $('#last_name').addAttr('required');
           $('#title').addAttr('required');
           
           
           //$("#institution_field").removeAttr('required');
          // alert('hi');
            
          
        }
        else {
            var newobrv_id = 'GVTCINS'+obrv_id;
             $('#observer_id').val(newobrv_id);
             $('.div_individual').hide();
             
        }
    });
});

$(function() {
    $('input[name="observeroption"]').on('click', function() {
        if ($(this).val() == 'Institution') {
           $(".div_individual").show();
           $("#individual").hide();
           $("#las_tname").hide();
           $('#first_name').removeAttr('required');
           $('#last_name').removeAttr('required');
           $('#title').removeAttr('required');
           $("#sub_bt").show();
           $("#institution_label").show();
           $("#institution_field").addAttr('required');
           
        }
        else {
            $('#div_Institution').hide();
            
        }
    });
});


});
function divFunction(id,tablename,lang)
{
//alert(id);
//alert(tablename);
//alert(lang);
var r = confirm("Are you sure want to change status?");
if (r == true) {
$.ajax({
   type:'get',
   url:'/taxons/status_update/'+id,
   data:"tablename="+tablename,
success:function(data)
   {
   if(data==1)
   {
      
   $("#"+id).removeClass('btn-danger');  
   $("#"+id).addClass('btn-success');  
    if(lang=='en'){
   $("#ai"+id).html('<i class="fa fa-check-circle"></i> Active'); 
    }else{
       $("#ai"+id).html('<i class="fa fa-check-circle"></i> Active'); 
    }
   }else{
   $("#"+id).removeClass('btn-success');  
   $("#"+id).addClass('btn-danger dng-w'); 
    if(lang=='en'){
   $("#ai"+id).html('<i class="fa fa-times-circle"></i> Inactive');
    }else{
    $("#ai"+id).html('<i class="fa fa-times-circle"></i> en activité');
    }
   }
   
   }
});
}

}
</script>
<SCRIPT language=Javascript>

      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }else{
         return true;
     }
      }
     
  function Check(evt)
    {
        if(evt.keyCode == 32)
        {
            alert("Space not allowed");
            return false;
        }
        return true;
    }   
     
     
   </SCRIPT>
<script>
setTimeout(function() {
$('.alert-success').fadeOut('fast');
}, 2000);

</script>


    