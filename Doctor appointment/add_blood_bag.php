<?php

session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');


$bag_id = $_POST['bag_id'];
$blood_type = $_POST['blood_type'];
$donor_name = $_POST['donor_name'];
$expiration =  date('Y-m-d', strtotime($_POST['expiration']));;

$availability = $_POST['availability'];
$doctor_id = $_POST['doctor_id'];
$patient_email =  $_POST['patient_email'];


$query = "INSERT INTO blood_bank (Bag_ID, Blood_type, Donor_name, Expiration_date, Availability, Doctor_ID, Patient_email) 
            VALUES('$$bag_id', '$blood_type', '$donor_name ', '$expiration', '$availability', '$doctor_id', '$patient_email')";

mysqli_query($con, $query);
echo"<h2>Successfully Added</h2>"; 
$link_address = "admin_dashboard.php";
echo '<a href="'.$link_address.'">GO back to the dashboard</a>';

?>