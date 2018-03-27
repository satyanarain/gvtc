<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function testdatas($table='',$id='', $status = '') {

    $lang=Session::get('language_val');
       ?>
<div  style="margin-left: 15px;" <?php if($status==1) { ?>class="btn btn-small btn-success pull" <?php }else{ ?>  class="btn btn-small btn-danger dng-w" <?php } ?>  id="<?php echo $id; ?>" onclick="statusUpdate(this.id,'<?php echo $table; ?>','<?php echo $lang ?>')">&nbsp;<span id="<?php echo "ai".$id; ?>"> <?php if($status==1){ ?> <i class="fa fa-check-circle"></i> Active <?php }else{ ?>  <i class="fa fa-times-circle"></i>&nbsp;<?php if($lang=='en'){ ?>In-active <?php }else{ ?>enactivité<?php } ?> <?php }?></span></div>                      
       

 <?php
}


function userstatus($table='',$id='', $status = '') {
$lang=Session::get('language_val');
   
       ?>
<div  style="margin-left: 15px;" <?php if($status==1) { ?>class="btn btn-small btn-success pull" <?php }else{ ?>  class="btn btn-small btn-danger dng-w" <?php } ?>  id="<?php echo $id; ?>" onclick="userstatusUpdate(this.id,'<?php echo $table; ?>','<?php echo $lang ?>')">&nbsp;<span id="<?php echo "ai".$id; ?>"> <?php if($status==1){ ?> <i class="fa fa-check-circle"></i> Active <?php }else{ ?>  <i class="fa fa-times-circle"></i>&nbsp;<?php if($lang=='en'){ ?>In-active <?php }else{ ?>enactivité<?php } ?> <?php }?></span></div>                      
       

 <?php
}




function getpermissionstatus($user_id,$role,$permission_key){
     
    if($role=="admin")
    {
        return true;
    }else{
        return $existuserid = DB::table('permissions')->where('user_id', $user_id)->where('permission_key', $permission_key)->count();
//        if($existuserid)
//            return true;
//        else
//            return 0;
     
//        $i=0;
//       
//        foreach ($existuserid as $userval){
//           $userarra[$i++]=$userval->permission_key;
//       }
    }
    //return true;
}
function getAllPermission($user_id)
{
    $existuserid = DB::table('permissions')->where('user_id', $user_id)->get();
    $i=0;
    $userarra=array();
    foreach ($existuserid as $userval){
        $userarra[$i++]=$userval->permission_key;
        $i++;
    }
    
    return $userarra;    
    
}

function grtmultipleid($resultid,$array)
{

$resultid=DB::table('ranges')->whereIn('id',$array)->get();  

foreach($resultid as $ids ){
    
  $str[]= $ids->range_code;
    
} 
return  $idss=implode(',',$str);
}