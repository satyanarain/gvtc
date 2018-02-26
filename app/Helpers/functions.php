<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function testdatas($table='',$id='', $status = '') {

   
       ?>
<div  style="margin-left: 15px;" <?php if($status==1) { ?>class="btn btn-small btn-success pull" <?php }else{ ?>  class="btn btn-small btn-danger dng-w" <?php } ?>  id="<?php echo $id; ?>" onclick="statusUpdate(this.id,'<?php echo $table; ?>')">&nbsp;<span id="<?php echo "ai".$id; ?>"> <?php if($status==1){ ?> <i class="fa fa-check-circle"></i> Active <?php }else{ ?>  <i class="fa fa-times-circle"></i>&nbsp;In-active <?php }?></span></div>                      
       

 <?php
}


function userstatus($table='',$id='', $status = '') {

   
       ?>
<div  style="margin-left: 15px;" <?php if($status==1) { ?>class="btn btn-small btn-success pull" <?php }else{ ?>  class="btn btn-small btn-danger dng-w" <?php } ?>  id="<?php echo $id; ?>" onclick="userstatusUpdate(this.id,'<?php echo $table; ?>')">&nbsp;<span id="<?php echo "ai".$id; ?>"> <?php if($status==1){ ?> <i class="fa fa-check-circle"></i> Active <?php }else{ ?>  <i class="fa fa-times-circle"></i>&nbsp;In-active <?php }?></span></div>                      
       

 <?php
}
