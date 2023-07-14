<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<br>
<br>
<h1> Report of the patient</h1>
<br>
<br>
<br>
<table id="customers">
  <tr>
    <th>Report</th>
  </tr>

<?php

session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'hospital_management');

$report_email = $_POST['pemail'];

$s = " select report from report where pemail = '$report_email' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);


if($num == 1){
    $row = mysqli_fetch_assoc($result);
    echo"<tr><td>{$row['report']}</td></tr>";
    
}
else{

    echo"<tr><td>NO REPORT </td></tr>";
}

$link_address = "doctor_dashboard.php";
echo '<a href="'.$link_address.'">GO back to the dashboard</a>';

?>