<?php
session_start();
?>

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
  background-color: #5D6D7E ;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #85929E ;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 10px 10px;
  height: 100%;
}

#Dashboard {background-color: #F7F9F9;}
#add_facilities {background-color: #F7F9F9;}
#Patient_reports {background-color: #F7F9F9;}
#Facilities {background-color: #F7F9F9;}
#Sign_out {background-color: #F7F9F9;}

</style>
</head>
<body>
<center><h3>Admin Dashboard</h3></center>
<center><a href='admin_login.php'>Log out</a></center>

<br>
<button class="tablink" onclick="openPage('Dashboard', this, '#34495E')"id="defaultOpen">Doctor Profile</button>
<button class="tablink" onclick="openPage('add_facilities', this, '#34495E')">Add ICU/Blood Bag</button>
<button class="tablink" onclick="openPage('Patient_reports', this, '#34495E')">Patient Reports</button>
<button class="tablink" onclick="openPage('Facilities', this, '#34495E')">Facilities</button>

<div id="Dashboard" class="tabcontent">
    <!DOCTYPE html>
    <html>
    <style>
    input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type=email], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    
    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
    </style>
    <body>
    
    <h3>Create A Doctor's Profile Using This Form</h3>
    
    <div>
      <form action="add_doctor.php" method="post">
        <label for="name">Doctor's Name</label>
        <input type="text" id="name" name="name" placeholder="Doctor's name.." required>
    
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Email" required>

        <label for="password">Password</label>
        <input type="text" id="password" name="password" placeholder="Password" required>
        
        <label for="degree">Degree</label>
        <input type="text" id="degree" name="degree" placeholder="Doctor's degree.." required>
        
        <label for="id">Doctor's ID</label>
        <input type="text" id="id" name="id" placeholder="Doctor's ID" required>

        <label for="specialization">Specialization</label>
        <select id="specialization" name="specialization">
          <option value="Cardilogy">Cardiology</option>
          <<option value="Neurology">Neurology</option>
          <option value="Orthopedics">Orthopedics</option>
          <option value="Psychiatrist">Psychiatrist</option>
          <option value="Medincine">Medicine</option>
          <option value="Dermatology">Dermatology</option>
        </select>
      
        <input type="submit" value="Submit">
      </form>
    </div>
    
    </body>
    </html>
    
    
    
</div>

<div id="add_facilities" class="tabcontent">
    <body>
    
        <h3>Add ICU</h3>
        
        <div>
          <form action="add_icu.php" method="post">
            <label for="icu_id">ICU Id</label>
            <input type="text" id="icu_id" name="icu_id" placeholder="ICU**" required>
        
            <label for="icu_type">ICU Type</label>
              <select id="icu_type" name="icu_type">
              <option value="General">General</option>
              <option value="Specialized">Specialized</option>
            </select>
            <label for="room_no">Room no.</label>
            <input type="text" id="room_no" name="room_no" placeholder="Room no" required>
            
            <label for="floor">Floor</label>
            <input type="text" id="floor" name="floor" placeholder="Floor" required>

            <input type="hidden" id="availability" name="availability" value="0">

            <input type="submit" value="Submit">
          </form>
        </div>
        <br>
        
        <h3>Add to Blood Bank</h3>
        
        <div>
          <form action="add_blood_bag.php" method="post">
            <label for="bag_id">Bag Id</label>
            <input type="text" id="bag_id" name="bag_id" placeholder="B..." required>
        
            <label for="blood_type">Blood group</label>
              <select id="blood_type" name="blood_type">
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>
            <label for="donor_name">Donor Name</label>
            <input type="text" id="donor_name" name="donor_name" placeholder="Name" required>
            <br>
            <label for="expiration">Expiration Date</label>
            <br>
            <input type="date" id="expiration" name="expiration" required>
            <br>
            <input type="hidden" name="availability" value="0">
            <input type="hidden" name="doctor_id" value="D1">
            <input type="hidden" name="patient_email" value="sadiul@gmail.com">
            <input type="submit" value="Submit">
          </form>
        </div>
        
        </body>
</div>

<div id="Patient_reports" class="tabcontent">
    <h3>Create Patient Report</h3>
        
        <div>
          <form action="add_report.php" method="post">
            
            <label for="pemail">Patient's Email</label>
            <input type="email" id="pemail" name="pemail" placeholder="Enter Email" required>
            
            <label for="preport">Report</label>
            <input type="text" id="preport" name="preport" placeholder="Report" report>
            
            <input type="submit" value="Submit">
        </form>
      </div>  
</div>

<div id="Facilities" class="tabcontent">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
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
<table id="customers">
  <tr>
    <th>ICU ID</th>
    <th>Booking Emails</th>
  </tr>
  <?php
    echo"<br>";
    echo"<br>";
    echo"<br>";
    echo"<center><h3>Booked ICUs</h3></center>";


    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'hospital_management');
    $icu_query = "SELECT * from icu_booking";
    $icu_result = mysqli_query($con, $icu_query);
    

    while($row = mysqli_fetch_assoc($icu_result)){
      
      echo"<tr><td>{$row['ICU_ID']}</td><td>{$row['Email']}</td></tr>";
      //echo"{$row['name']}<br>";
      //echo"{$row['email']}<br>";
    }
    
    ?>


<table id="customers">
  <tr>
    <th>Blood Bag ID</th>
    <th>Booking Emails</th>
  </tr>
  <?php
    echo"<br>";
    echo"<br>";
    echo"<br>";
    echo"<center><h3>Booked Blood Bags</h3></center>";

    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'hospital_management');
    $bag_query = "SELECT * from blood_bank_book";
    $bag_result = mysqli_query($con, $bag_query);
    

    while($row = mysqli_fetch_assoc($bag_result)){
      
      echo"<tr><td>{$row['Bag_ID']}</td><td>{$row['Booking_email']}</td></tr>";
      //echo"{$row['name']}<br>";
      //echo"{$row['email']}<br>";
    }
    ?>
</div>


<div id="Sign_out" class="tabcontent">
  <h3>dsfoiaofh;oi</h3>
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
