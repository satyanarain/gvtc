<?php

//print_r($search_data);
$searchdatav=explode("=",$search_data->serchurl);
$search_data->email;
$search_data->serchurl;
?>
<?php $url='http://'.$_SERVER['HTTP_HOST'].'/'.'login'; ?>
<p>Dear <?php echo $search_data->username; ?>, your search criteria "<?php echo $searchdatav[2]; ?>" Approved By GVTC Team.</p>
<p><a href="<?php echo $url; ?>" target="_blank">Click here</a> to download</p>
<p>Thanks</p>
<p>GVTC Team</p>



