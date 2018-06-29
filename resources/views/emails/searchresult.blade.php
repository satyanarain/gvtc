<?php
$url='http://'.$_SERVER['HTTP_HOST'].'/'.'login';
$searchdatak=explode("=",$search_details->searchdata);

?>
<p>Dear Admin,</p>
<p> <?php echo $search_details->username; ?> has queried for search request.Please <a href="<?php echo $url;?>">click here</a> to take appropriate action.</p>
<p>Search Criteria - <?php echo $searchdatak[2]; ?></p>
<p>First Name - <?php echo $search_details->first_name; ?></p>
<p>Last Name - <?php echo $search_details->last_name; ?></p>
<p>Institution Type - <?php echo $search_details->institution_type; ?></p>
<p>Purpose of Account - <?php echo $search_details->account; ?> </p>
<p>Institution / Organization / Company - <?php echo $search_details->institution; ?></p>


<p>Thanks</p>
GVTC Support Team 