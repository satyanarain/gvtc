<?php
$servername = "localhost";
$username = "root";
$password = "gvtc";
$dbname = "gvtc";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
for($i=0;$i<=50000;$i++)
{
    
 $sql = "INSERT INTO `distributions` (`taxon_id`, `selectioncriteria`, `specie_id`, `specie_data`, `method_id`, `observation_id`, `gazetteer_id`, `day`, `month`, `year`, `number`, `observer_id`, `age_id`, `abundance_id`, `specimendata`, `specimencode`, `collectorinstitution`, `Sex`, `remark`, `status`, `habitat`, `created_at`, `updated_at`, `created_by`) VALUES
('6', 'genus', '1', 'nonnula/Estrilda', '1', '1', '1', '1', '3', '1991', '1', 1, '0', '0', 0, '', '', '', '', 1, 'test', NULL, NULL, 69)";
    
    
   // $sql = "INSERT INTO employee (employee_name,employee_salary,employee_age) VALUES ('Amit Sinha', '20000', 40)";
    $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
}
echo "Done";
?>