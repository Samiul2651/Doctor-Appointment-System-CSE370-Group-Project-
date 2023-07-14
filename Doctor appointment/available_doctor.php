<!DOCTYPE html>
<?php
session_start();
?>
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
<h1>Available Doctors</h1>
<br>
<br>
<br>
<br>
<table id="customers">
  <tr>
    <th>Doctor Name</th>
    <th>Type</th>
    <th>Contact</th>
    <th>Action</th>
  </tr>
  <tr>
    <td><?php echo  $_SESSION['result']; ?></td>
    <td>Cardiologist</td>
    <td>alfred@gmail.com</td>
    <td>11-08-2022</td>
  </tr>
 
</table>

</body>
</html>