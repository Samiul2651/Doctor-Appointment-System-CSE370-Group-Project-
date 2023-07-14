<?php

session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$degree =  $_POST['degree'];
$id = $_POST['id'];
$specialization = $_POST['specialization'];


$query = "INSERT INTO doctor (name, email, password, degree, id, specialization) VALUES('$name', '$email', '$password', '$degree', '$id', '$specialization')";

mysqli_query($con, $query);
echo"<h2>Successfully Added</h2>"; 
$link_address = "admin_dashboard.php";
echo '<a href="'.$link_address.'">GO back to the dashboard</a>';
?>