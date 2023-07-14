<?php

session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');


$pemail = $_POST['pemail'];
$preport = $_POST['preport'];

$query = "INSERT INTO report (pemail, report) 
            VALUES('$pemail', '$preport')";

mysqli_query($con, $query);
echo"<h2>Successfully Added</h2>"; 
$link_address = "admin_dashboard.php";
echo '<a href="'.$link_address.'">GO back to the dashboard</a>';

?>