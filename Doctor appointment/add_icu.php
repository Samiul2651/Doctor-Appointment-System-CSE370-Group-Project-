<?php

session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');


$icu_id = $_POST['icu_id'];
$icu_type = $_POST['icu_type'];
$room_no = $_POST['room_no'];
$floor =  $_POST['floor'];
$availability = 0;



$query = "INSERT INTO icu (ICU_ID, ICU_type, Room_no, Floor, Availability) VALUES('$icu_id', '$icu_type', '$room_no ', '$floor', '$availability')";

mysqli_query($con, $query);
echo"<h2>Successfully Added</h2>"; 
$link_address = "admin_dashboard.php";
echo '<a href="'.$link_address.'">GO back to the dashboard</a>';

?>