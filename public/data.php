<?php
//include('config.php');
// storing  request (ie, get/post) global array to a variable 
/* Database connection start */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gvtc";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 =>'taxon_id',
	1 =>'specie_id', 
	2 => 'id',
	3=> 'specie_data',
	4=> 'method_id',
        5=> 'day'	
);

// getting total number records without any search
$sql = "SELECT taxon_id,specie_id, id, specie_data,method_id,day ";
$sql.=" FROM distributions";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);

$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT taxon_id,specie_id, id, specie_data,method_id,day";
$sql.=" FROM distributions WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( taxon_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR specie_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR specie_data LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR method_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR day LIKE '".$requestData['search']['value']."%' )";
}

$query=mysqli_query($conn, $sql) or die("data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
        $id = $row["id"];
        $nestedData=array(); 
	$nestedData[] = $row["taxon_id"];
	$nestedData[] = $row["specie_id"];
	$nestedData[] = $row["specie_data"];
        $nestedData[] = $row["method_id"];
        $nestedData[] = $row["day"];
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
