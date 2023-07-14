<?php

session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');


$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$password =  $_POST['psw'];

echo $name;

$query = "INSERT INTO patient_registration (name, email, address, password) VALUES('$name', '$email', '$address', '$password')";

mysqli_query($con, $query);
$_SESSION['name'] = $name;
$_SESSION['success'] = "You are now logged in";
header('location: patient_dashboard.php');

?>
