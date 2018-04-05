function statusUpdate(id,tablename,lang)
{

var txt;
var r = confirm("Are you sure want to change status?");
if (r == true) {
    txt = "You pressed OK!";

$.ajax({
   type:'get',
   url:'/taxons/status_update/'+id,
   data:"tablename="+tablename,
success:function(data)
   {
       //alert(data);
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
} else {
    txt = "You pressed Cancel!";
}  
}


function userstatusUpdate(id,tablename)
{
    
var txt;
var r = confirm("Are you sure want to change status?");
if (r == true) {
    txt = "You pressed OK!";

$.ajax({
   type:'get',
   url:'/user-management/user_status_update/'+id,
   data:"tablename="+tablename,
success:function(data)
   { 
   if(data==1)
   {
   $("#"+id).removeClass('btn-danger');  
   $("#"+id).addClass('btn-success');  
   $("#ai"+id).html('<i class="fa fa-check-circle"></i> Active'); 
   window.setTimeout(function(){location.reload()},1)
   
  }else{
   $("#"+id).removeClass('btn-success');  
   $("#"+id).addClass('btn-danger dng-w');    
   $("#ai"+id).html('<i class="fa fa-times-circle"></i> Inactive');
    window.setTimeout(function(){location.reload()},1)
  
   }
   
   }
});
} else {
    txt = "You pressed Cancel!";
}  
}

document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
      setTimeout(function(){
          document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
      },1000);
  }
}
// check dupliacte user    
$(document).ready(function(){    
$("#username").blur(function()
{
var username = $("#username").val();
//alert(username);
if(username!=''){


    $.ajax({
   type:'get',
   url:'/guest_register/find_username/'+username,

   
success:function(data)
   { 
   $("#usermessage").html(data);
   }
});

}

});
});  

//genusclick
$(document).ready(function(){    
$(".geniusrecord").click(function()
{
var taxon_id = $("#taxon_id").val();
var genus = $(this).val();
//alert(genus);
if(taxon_id!=''){

    $.ajax({
   type:'get',
   url:'/distribution/speciec_record/'+taxon_id,
    data:"genus="+genus,
 success:function(data)

   {
  //alert(data);
    $("#displ").show();
    $("#div_show").hide();
       $("#speciessel").html(data);
       //alert(data);
   //$("#usermessage").html(data);
   }
});

}

});
}); 
//specimendata

$(document).ready(function(){
$('#specimendata').change(function(){
if(this.checked){
$('.div_specimen').show();
}
else{
$('.hindi_lang').hide();
$('.div_specimen').hide();
}
});
});

//validation for distribution reacord
$(document).ready(function(){
$("#genus").click(function(){
var taxonid= $("#taxon_id").val();
if(taxonid==''){
    alert("Please select Taxon");
}
//alert(taxonid);

});
$("#inlineCheckbox3").click(function(){
var taxonid= $("#taxon_id").val();
if(taxonid==''){
    alert("Please select Taxon");
}
//alert(taxonid);

});
$("#common_name_fr").click(function(){
 var taxonid= $("#taxon_id").val();
if(taxonid==''){
    alert("Please select Taxon");
}   
});
});
//country change Protected Area
$(document).ready(function(){
$("#country_id").change(function(){
var countryid=$("#country_id").val();
if(countryid!='')
{
$.ajax({
   type:'get',
   //url:'/distribution/speciec_record/'+taxon_id,
   url:'/protectecarea/protected_area/'+countryid,
 success:function(data)

   {
       $("#protected_area_deafult").hide();
       $("#protected_area_select").show();
       $("#protected_area_select").html(data);
    

   }
});
}else{
    
   alert("Please Selcet Country"); 
   return false;
    
}
});
});

//country change Admin Unit
$(document).ready(function(){
$("#country_id").change(function(){
var countryid=$("#country_id").val();
if(countryid!=''){
$.ajax({
   type:'get',
   //url:'/distribution/speciec_record/'+taxon_id,
   url:'/admin-unit/admin_unit/'+countryid,
 success:function(data)

   {
     $("#adminunit_default").hide();
    $("#adminunit_select").show();
     $("#adminunit_select").html(data);
    

   }
});

}else{
    
   alert("Please Selcet Country"); 
   return false;
    
}    
    
    
    
});
});

//select all
//$({function () {
//			$("#selectall").click(function () {
//				if ($("#selectall").is(':checked')) {
//					$("input[type=checkbox]").each(function () {
//					$(this).attr("checked", true);
//					});
//					$("#bulk-delete").show();
//					$("#bulk-submit").show();
//                                        $(".default-btn").hide();
//                                        $("#bulksubmitdefault").hide();
//
//				} else {
//					$("input[type=checkbox]").each(function () {
//						$(this).attr("checked", false);
//					});
//					$("#bulk-delete").hide();
//                                        
//				}
//			});
//		});

$(document).ready(function(){
$("#selectall").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
$(".btn-show").show(); 
$(".default-btn").hide();
});
});



$(document).ready(function(){
$('.check-all').change(function(){   
if(this.checked){
 // alert('hi');
$(".btn-show").show(); 
$(".default-btn").hide();
}
else{
$(".default-btn").hide();
//$(".btn-show").hide();
}
});
});

//bulkimg
$(document).ready(function(){
$("#bulkuploadimg").click(function(){
$("#div_img").toggle();    
//alert('hi'); 
    
});    
    
    
    
});
		
