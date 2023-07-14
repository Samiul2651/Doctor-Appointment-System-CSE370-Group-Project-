<?php
session_start();

$demail=$_GET["demail"];
$pemail=$_GET["pemail"];
$booked_date=$_GET["booked_date"];

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');
$pquery = "SELECT name, address, email FROM patient_registration WHERE email = '$pemail'";
$dquery = "SELECT name, specialization, email FROM doctor WHERE email = '$demail'";


$presult = mysqli_query($con, $pquery);
$dresult = mysqli_query($con, $dquery);


$prow = mysqli_fetch_assoc($presult);
$drow = mysqli_fetch_assoc($dresult);


$query = "INSERT INTO whole_appointment (pname, paddress, pemail, dname, specialization, demail, date)
         VALUES('{$prow['name']}', '{$prow['address']}', '$pemail', '{$drow['name']}', '{$drow['specialization']}', '$demail', '$booked_date')";
         
mysqli_query($con, $query);
echo"<h3>BOOKING SUCCESSFULL!</h3>";
echo"";
$link_address = "patient_dashboard.php";
echo '<a href="'.$link_address.'">GO back to the dashboard</a>';


?>