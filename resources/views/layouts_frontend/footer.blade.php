<!-- Footer -->
   <section class="sub-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 clearfix footerAbout">
            	<h4 class="footerHead">About GVTC</h4>
                <p class="footerText">Greater Virunga Transboundary Collaboration is a framework for strategic, transboundary, collaborative management of the Greater Virunga Landscape</p> 
                 <ul class="list-inline social-buttons">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul> 
            </div>
            <div class="col-md-4 col-xs-12  footerBorderLeft">
            	<ul class="footerNav">
                	<h4 class="footerHead">Quick Links</h4>
                    <li><a href="{{ url('/') }}">Home</a></li>
       				<li><a href="{{ url('/about-us') }}">About Us</a></li>
        			<li><a href="{{ url('reports') }}">Reports</a></li>
        			<li><a href="#">Contact Us</a></li>
                </ul>
            </div>
           
            <div class="col-md-4 col-xs-12 footerBorderLeft">
            	<h4 class="footerHead">Contact info</h4>
            	<p class="footerText">KG 6 AV. #18, plot #954<br />Gasabo District, Kimihurura, Rugando<br /> P.O.Box 6626 Kigali Rwanda<br />
                    <strong>Telephone:</strong> +250 252-580-429<br /><strong>Mobile:</strong> +250 788-573-965<br /><strong>E-mail:</strong> centerofexcellence@greatervirunga.org</p>
            </div>
		</div>
	</div>
</section>

<footer class="custom-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="copyright">Copyright © 2018 GVTC | Powered by <a href="http://opiant.in/" target="_blank">Opiant</a></div>
          </div>
        </div>
      </div>
    </footer>
 <script>
$(document).ready(function(){

$("#submitbtn").click(function(){
var token = window.Laravel.csrfToken;
    //alert(token);    
var user_name=$("#user_name").val();    
var user_email=$("#user_email").val(); 
var user_subject=$("#user_subject").val();    
var user_message=$("#user_message").val();  
//var datastring="user_name="+user_name+"&user_email="+user_email+"&user_subject="+user_subject+"&user_message="+user_message;
//alert(datastring);
         $.ajax({
         url: "/contactus",
         type: "POST",
         data:{'user_name':user_name,'user_email':user_email,'user_subject':user_subject,'user_message':user_message,'_token':token},
         //data:{},
//         success: function(data){
//             //alert(data);
//               $("#myElem").show();
//               setTimeout(function() { $("#myElem").hide(); }, 5000);
//               $("form").trigger("reset");
//              //alert("Data Save: " + data);
//              //$('#msg').html(data).fadeIn('slow');
//               //$('#msg').html("data insert successfully").fadeIn('slow') //also show a success message 
//               //$('#msg').delay(5000).fadeOut('slow');
//         }
         
         success: function(data) {
	                if($.isEmptyObject(data.error)){
                                $(".print-success-msg").find("ul").html('');
                                $(".print-success-msg").css('display','block');
                                $(".alert-danger").css('display','none');
                                $(".print-success-msg").find("ul").append('<li>'+data.success+'</li>');
                            	$("#contacform").trigger("reset");
                                setTimeout(function() { $(".alert-success").hide(); }, 5000);
                                
	                }else{
	                	printErrorMsg(data.error);
	                }
	            }
         
         
});  
}); 

function printErrorMsg (msg) {
			$(".print-error-msg").find("ul").html('');
			$(".print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
			});
		}
                



});    
</script>
<script language="JavaScript">
  /**
    * Disable right-click of mouse, F12 key, and save key combinations on page
    * By Arthur Gareginyan (arthurgareginyan@gmail.com)
    * For full source code, visit http://www.mycyberuniverse.com
    */
//  window.onload = function() {
//    document.addEventListener("contextmenu", function(e){
//      e.preventDefault();
//    }, false);
//    document.addEventListener("keydown", function(e) {
//    //document.onkeydown = function(e) {
//      // "I" key
//      if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
//        disabledEvent(e);
//      }
//      // "J" key
//      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
//        disabledEvent(e);
//      }
//      // "S" key + macOS
//      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
//        disabledEvent(e);
//      }
//      // "U" key
//      if (e.ctrlKey && e.keyCode == 85) {
//        disabledEvent(e);
//      }
//      // "F12" key
//      if (event.keyCode == 123) {
//        disabledEvent(e);
//      }
//    }, false);
//    function disabledEvent(e){
//      if (e.stopPropagation){
//        e.stopPropagation();
//      } else if (window.event){
//        window.event.cancelBubble = true;
//      }
//      e.preventDefault();
//      return false;
//    }
//  };
//  
  
</script>
  </body>

</html>
<script type="text/javascript" class="init">	
$(document).ready(function(startup) {
	$('#exampledemo').DataTable( {
            "searching": false,  
		
             } );
} );


jQuery(document).bind("keyup keydown", function(e){
    if(e.ctrlKey && e.keyCode == 80){
        //alert('fine');
        return false;
    }
})
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<style type="text/css" class="init"></style>
<!--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>-->






   
   <script type="text/javascript" language="javascript" src=" https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" language="javascript" src=" https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>


 



 <script type="text/javascript" class="init">	
$(document).ready(function(startup) {
	$('#example').DataTable( {
              
		dom: 'Bfrtip',
               "searching": false,  
		buttons: [
			 'csv', 'excel','pdf'
		]
             } );
} );



</script> 

