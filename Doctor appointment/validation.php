<?php

session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');

$email = $_POST['Email'];
$pass = $_POST['psw'];

$s = " select * from patient_registration where email = '$email' && password = '$pass' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    
    $_SESSION['email'] = $email;
    header('location:patient_dashboard.php');
}
else{
    header('location:index.php');
}

?>