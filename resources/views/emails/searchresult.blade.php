<?php $url='http://'.$_SERVER['HTTP_HOST'].'/'.'login'; ?>
<p>Dear Admin,</p>
<p> <?php echo $search_details->username; ?> has queried for search request Please click <a href="<?php echo $url;?>">here</a> to take appropriate action.</p>
<p>Search URL- <?php echo $search_details->searchdata; ?></p>
<p>Search Date- <?php echo $search_details->date; ?></p>
<p>Thanks</p>
GVTC Support Team 