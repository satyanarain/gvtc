<?php $url='http://'.$_SERVER['HTTP_HOST'].'/'.'login'; ?>
<p>Dear Admin,</p>
<p> <?php echo $search_details->username; ?> has queried for search request.Please <a href="<?php echo $url;?>">click here</a> to take appropriate action.</p>
<p>Search URL- <?php echo $search_details->searchdata; ?></p>
<p>Thanks</p>
GVTC Support Team 