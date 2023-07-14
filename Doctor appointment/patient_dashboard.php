

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #2F4F4F ;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}
.tablink2 {
  background-color: #04AA6D ;
  color: white;
  float: center;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 30px 16px;
  font-size: 17px;
  width: 50%;
}
.tablink3 {
  background-color: #04AA6D ;
  color: white;
  float: center;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 30px 16px;
  font-size: 17px;
  width: 50%;
}

.tablink:hover {
  background-color: #2F4F4F;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 10px 10px;
  height: 100%;
}

#Dashboard {background-color: #F7F9F9;}
#Doctors {background-color: #F7F9F9;}
#Facilities {background-color: #F7F9F9;}
#Sign_out {background-color: #F7F9F9;}
</style>
</head>
<body>

<button class="tablink" onclick="openPage('Dashboard', this, '#1D8348')"id="defaultOpen">Dashboard</button>
<button class="tablink" onclick="openPage('Doctors', this, '#1D8348')">Book Doctors</button>
<button class="tablink" onclick="openPage('Facilities', this, '#1D8348')">Facilities</button>
<button class="tablink" onclick="openPage('Sign_out', this, '#1D8348')">Sign out</button>

<div id="Dashboard" class="tabcontent">
<?php

session_start();
?>
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
<h1>Appointments Scheduled by <?php echo  $_SESSION['email']; ?></h1>
<br>
<br>
<br>
<br>
<table id="customers">
  <tr>
    <th>Doctor Name</th>
    <th>Type</th>
    <th>Contact</th>
    <th>Date</th>
  </tr>

  <?php

    //echo "<td> $_SESSION['result'] </td>";
    //echo $_SESSION['res'];
    
    $pemail=$_SESSION['email'];
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'hospital_management');
    $patient_schedule = "SELECT pname, pemail, dname, specialization, demail, date  
                        FROM whole_appointment WHERE pemail = '$pemail' GROUP BY pemail, demail, date ORDER by date ASC;";
    $patient_schedule_result = mysqli_query($con, $patient_schedule);
    

    while($row = mysqli_fetch_assoc($patient_schedule_result)){
      
      echo"<tr><td>{$row['dname']}</td><td>{$row['specialization']}</td><td>{$row['demail']}</td><td>{$row['date']}</td></tr>";
      //echo"{$row['name']}<br>";
      //echo"{$row['email']}<br>";
    }
  
  ?>
 
</table>

</body>
</html>
</div>

<div id="Doctors" class="tabcontent">
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
  
<br>
<br>
<br>
<br>
<h3>Searching Tab</h3>
<form action="" method="post" class="container">

  
    <label for="date"><b>Date</b></label>
    <input type="date" placeholder="Enter Date" name="date" required>
    <br>
    <br>
    <label for="specialization"><b>Specialization</b></label>
    <select name="specialization" id="specialization">
    <option value="Cardiology">Cardiology</option>
    <option value="Neurology">Neurology</option>
    <option value="Orthopedics">Orthopedics</option>
    <option value="Psychiatrist">Psychiatrist</option>
    <option value="Medincine">Medicine</option>
    <option value="Dermatology">Dermatology</option>
    </select>
    
    <button type="submit"  name="doc" >Search</button>
    
  

</form>



<br>
<br>
<br>
<br>


<h3>Available Doctor</h3>
<?php
if(isset($_POST['doc'])){
  ?>
<table id="customers">
  <tr>
    <th>Doctor Name</th>
    <th>Type</th>
    <th>Contact</th>
    <th>Action</th>
  </tr>
  <?php
    
    //echo "<td> $_SESSION['result'] </td>";
    //echo $_SESSION['res'];
    $specialization = $_POST['specialization'];
    $booked_date = $_POST['date'];
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'hospital_management');
    $doctor_search = "SELECT name, specialization, email FROM doctor WHERE specialization = '$specialization' ";
    $result = mysqli_query($con, $doctor_search);
    $pemail=$_SESSION['email'];

    while($row = mysqli_fetch_assoc($result)){
      $link_address = "book_doctor.php?demail={$row['email']}&pemail=$pemail&booked_date=$booked_date";
      echo"<tr><td>{$row['name']}</td><td>{$row['specialization']}</td><td>{$row['email']}</td><td><a href='$link_address'>Book</a></td></tr>";
      //echo"{$row['name']}<br>";
      //echo"{$row['email']}<br>";
    }
  

    echo $_POST['date'];
}
  ?>
    
  
  
</table>
<br>
<br>
<br>
<br>
<br>
</body>
</html>

</div>

<div id="Facilities" class="tabcontent">
<br>
  <br>
  <h1>Available Facilities:</h1>
  
  <br>
  <br>
  <br>
  <br>
  <br>
  <div id ="ICU" align="center" border = '1px'>
  <button class="tablink2" onclick="location.href='icu.php'" >ICU</button>
  </div>
  <br>
  <br>
  <br>
  <div id ="Blood_bank" align="center" border = '1px'>
  <button class="tablink3" onclick="location.href='Blood_bank.php'">Blood Bank</button>
  </div>
</div>
</div>

<div id="Sign_out" class="tabcontent">
  

  <a href='logout.php'>logout</a>
  
</div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 

