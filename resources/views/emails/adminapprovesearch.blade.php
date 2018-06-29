<?php

//print_r($search_data);
$searchdatav=explode("=",$search_data->serchurl);
$search_data->email;
$search_data->serchurl;
?>
<?php $url='http://'.$_SERVER['HTTP_HOST'].'/'.'login'; ?>
<p>Dear <?php echo $search_data->username; ?>, 
<p>Your search request for “<?php echo $searchdatav[2]; ?>" has been approved by GVTC Admin.</p>
<p>Please <a href="<?php echo $url; ?>" target="_blank">click here</a> to download the search results.</P>    
<p>Thanks</p>
<p>GVTC Team</p>



