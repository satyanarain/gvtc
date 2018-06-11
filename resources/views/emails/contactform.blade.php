<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//print_r($contact_deatils);
//die;

?>
<p>Hi GVTC,</p>
<p>You have got a new query from contact us page.</p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
  <tbody>
  <tr>
    <td>&nbsp;&nbsp;Name</td>
    <td>&nbsp;&nbsp;<?php echo $contact_deatils->user_name; ?></td>
  </tr>
  <tr>
    <td bgcolor="#f1f1f1">&nbsp;&nbsp;Email</td>
    <td bgcolor="#f1f1f1">&nbsp;&nbsp;<?php echo $contact_deatils->user_email; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Subject</td>
    <td>&nbsp;&nbsp;<?php echo $contact_deatils->user_subject; ?></td>
  </tr>
  <tr>
    <td bgcolor="#f1f1f1">&nbsp;&nbsp;Message </td>
    <td bgcolor="#f1f1f1">&nbsp;&nbsp;<?php echo $contact_deatils->user_message; ?></td>
  </tr>
</tbody></table>
<p>Thank You</p>