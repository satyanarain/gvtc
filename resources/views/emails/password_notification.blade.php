<?php //echo $users_details->username; ?>
<?php //echo $users_details->email; ?>
<?php //echo $users_details->first_name; ?>
<?php //echo $users_details->last_name; ?>
<?php //echo $users_details->id; ?>
<?php  
$url='http://'.$_SERVER['HTTP_HOST'].'/'.'create_password'; ?>
<p>Dear User,</p>
<p>Your account has been approved by GVTC admin. You can activate your account by generating a new password. Please <a href="<?php echo $url.'/'.$users_details->id;?>">click here</a> to generate a new password.<p>
</br>
<p>Thanks</p>
GVTC Support Team


