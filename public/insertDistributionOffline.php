<?php

	// Database Connection
	include_once('databaseconnect.php');
 
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// Get data		
		$taxonId =  $_POST['taxonId'] ;
		$selectionCriteria =  $_POST['selectionCriteria'];
		$speciesId =  $_POST['speciesId'];
		$speciesData =  $_POST['speciesData'];
		$methodId =  $_POST['methodId'];		
		$observationId =  $_POST['observationId'];
		$gazetteerId =  $_POST['gazetteerId'];
		$day =  $_POST['day'];
		$month =  $_POST['month'];
		$year =  $_POST['year'];
		$number =  $_POST['number'];		
		$observerId =  $_POST['observerId'];
		$ageId =  $_POST['ageId'];
		$abundanceId =  $_POST['abundanceId'];
		$specimenData =  $_POST['specimenData'];
		$specimenCode =  $_POST['specimenCode'];
		$collectorInstitution =  $_POST['collectorInstitution'];
		$sex =  $_POST['sex'];
		$remark =  $_POST['remark']	;
		$status1 =  $_POST['status1'];
		
		$createdAt =  $_POST['createdAt'];
		$updatedAt =  $_POST['updatedAt'];
		$createdby =  $_POST['createdby'];		
		


		// Select data from database
		$bln = false;
		$txtResult = "Not Successful! Try again!!";
				
		if ($bln == false) {
			$sql = "INSERT INTO `distributions_offline`( `taxon_id` ,`selectioncriteria`,  `specie_id` ,`specie_data` ,  `method_id`  ,  `observation_id`  ,  `gazetteer_id`  ,  `day`  ,  `month`  ,  `year`  ,  `number`  ,  `observer_id` ,  `age_id`  ,  `abundance_id` ,`specimendata` ,  `specimencode`  ,  `collectorinstitution`  ,  `Sex`  ,  `remark`,`status`   ,  `created_at` ,  `updated_at`,`created_by`)  VALUES ('" . $taxonId . "','" . $selectionCriteria . "','" . $speciesId . "','" . $speciesData . "','" . $methodId . "','" . $observationId . "','" . $gazetteerId . "','" . $day . "','" . $month . "','" . $year . "','" . $number . "','" . $observationId . "','" . $ageId . "','" . $abundanceId . "','" . $specimenData . "','" . $specimenCode . "','" . $collectorInstitution . "','" . $sex . "','" . $remark . "','" . $status1 . "','" . $createdAt . "','" . $updatedAt . "','" . $createdby . "');";
			
			$bResult = mysqli_query($link,$sql) ;
			if ($bResult)
			{
				$txtResult = "1";
			}
			
		}
	}
	else
	{
		$txtResult = "Requested method not accepted!";
	}
	
 
	/* Output header */
	header('Content-type: application/json');
  	// Returns the JSON representation of fetched data
	print(json_encode($txtResult));

 ?>
 
