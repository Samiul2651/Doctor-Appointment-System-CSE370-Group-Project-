<?php

session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');

$email = $_POST['Email'];
$pass = $_POST['psw'];

$s = " select * from doctor where email = '$email' && password = '$pass' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    
    $_SESSION['doctor_email'] = $email;
    header('location: doctor_dashboard.php');
}
else{
    echo "Wrong email or password";
    echo"<br>";
    //header('location:index.php');
    $address = "index.php";
    echo '<a href="'.$address.'">GO back to the Home page</a>';

}

?>