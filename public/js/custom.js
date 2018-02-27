function statusUpdate(id,tablename)
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
   if(data==1)
   {
   $("#"+id).removeClass('btn-danger');  
   $("#"+id).addClass('btn-success');  
   $("#ai"+id).html('<i class="fa fa-check-circle"></i> Active');    
   }else{
   $("#"+id).removeClass('btn-success');  
   $("#"+id).addClass('btn-danger dng-w');    
   $("#ai"+id).html('<i class="fa fa-times-circle"></i> Inactive');    
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
			//$('.eng_lang').hide();
		}
        else{
            $('.hindi_lang').hide();
			$('.div_specimen').hide();
		}

		});
		});




