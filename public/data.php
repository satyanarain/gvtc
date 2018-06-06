<?php
//include('config.php');
// storing  request (ie, get/post) global array to a variable 
/* Database connection start */

$servername = "localhost";
$username = "root";
$password = "gvtc";
$dbname = "gvtc";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'distributions.id',
//	1 =>'distributions.specie_id', 
//	2 => 'distributions.id',
//	4=> 'distributions.method_id',
//        5=> 'distributions.day'	
);

// getting total number records without any search
//$sql = "SELECT taxons.taxon_code,distributions.taxon_id,species.species,distributions.specie_id,distributions.id,distributions.specie_data,distributions.method_id,distributions.day";
//$sql.=" FROM distributions LEFT JOIN taxons on taxons.id=distributions.taxon_id LEFT JOIN  species on species.id=distributions.specie_id ";

  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT taxons.taxon_code,distributions.taxon_id,species.species,distributions.specie_id,distributions.id,distributions.method_id,distributions.day as distributionsday,distributions.method_id,methods.method_code,methods.code_description as method_description,selectioncriteria,distributions.month as month ,distributions.year as year,number,distributions.abundance_id,abundances.abundance_group,specimencode,collectorinstitution,distributions.observation_id,observation.observation_code,observation.code_description,distributions.gazetteer_id,gazetteers.place,distributions.observer_id,observers.last_name,distributions.age_id,ages.age_group,distributions.Sex as distributionsex,distributions.remark,distributions.habitat";
$sql.=" FROM distributions LEFT JOIN taxons on taxons.id=distributions.taxon_id LEFT JOIN species on species.id=distributions.specie_id  LEFT JOIN methods on methods.id=distributions.method_id LEFT JOIN  abundances ON abundances.id=distributions.abundance_id LEFT JOIN observation on  observation.id=distributions.observation_id LEFT JOIN gazetteers ON gazetteers.id=distributions.gazetteer_id LEFT JOIN observers ON observers.id=distributions.observer_id LEFT JOIN ages ON  ages.id=distributions.age_id  WHERE 1=1";
//print_r($sql);die;
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);

$totalFiltered = $totalData;

//if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
//	$sql.=" AND ( taxon_id LIKE '".$requestData['search']['value']."%' ";    
//	$sql.=" OR specie_id LIKE '".$requestData['search']['value']."%' ";
//	$sql.=" OR specie_data LIKE '".$requestData['search']['value']."%' ";
//	$sql.=" OR method_id LIKE '".$requestData['search']['value']."%' ";
//	$sql.=" OR day LIKE '".$requestData['search']['value']."%' )";
//}

$query=mysqli_query($conn, $sql) or die("data.php: get employees");
//echo $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
//echo $columns[$requestData['order'][0]['column']];
//echo $requestData['order'][0]['dir'];
//die;
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
//print_r($sql);
//die;
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
//$row=mysqli_fetch_array($query);
//print_r($row);
//die;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
        $id = $row["id"];
        $nestedData=array(); 
	$nestedData[] = $row["taxon_code"];
	$nestedData[] = $row["species"];
	$nestedData[] = $row["method_description"].'('.$row["method_code"].')';
	$nestedData[] = $row["code_description"]."(".$row["observation_code"].")";
	$nestedData[] = $row["place"];
        $nestedData[] = $row["selectioncriteria"];
        $nestedData[] = $row["distributionsday"];
        $nestedData[] = $row["month"];
        $nestedData[] = $row["year"];
        $nestedData[] = $row["number"];
        $nestedData[] = $row["last_name"];
        $nestedData[] = $row["age_group"];
        $nestedData[] = $row["abundance_group"];
        $nestedData[] = $row["specimencode"];
        $nestedData[] = $row["collectorinstitution"];
        $nestedData[] = $row["distributionsex"];
        $nestedData[] = $row["remark"];
        $nestedData[] = $row["habitat"];
	$nestedData[] = "<a href='passinventory/$id/edit' class='btn btn-bitbucket'><span class='glyphicon glyphicon-edit'></span>&nbsp;&nbsp;Edit</a>";
	
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);
echo $datajson = json_encode($json_data);  // send data as json format
?>
