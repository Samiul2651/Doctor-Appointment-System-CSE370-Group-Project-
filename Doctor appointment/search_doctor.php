<?php
session_start();
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'hospital_management');

$date = date('Y-m-d', strtotime($_POST['date']));
$specialization = $_POST['specialization'];

$doctor_search = "SELECT name, specialization, email FROM doctor WHERE specialization = '$specialization'";
$result = mysqli_query($con, $doctor_search);
$num = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($result);

$_SESSION['res'] = $specialization;
$_SESSION['date'] = $date;
/*header('location:patient_dashboard.php');
*/
?>