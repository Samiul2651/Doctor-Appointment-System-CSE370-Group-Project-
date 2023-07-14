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
  padding: 20px 16px;
  font-size: 17px;
  width: 100%;
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
#ICU {background-color: #F7F9F9;}
#Blood_Bank {background-color: #F7F9F9;}

</style>
</head>
<body>

<button class="tablink" onclick="openPage('Dashboard', this, '#1D8348')"id="defaultOpen">ICU Booking</button>

<div id="Dashboard" class="tabcontent">
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
input[type=radio] {
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

input[type=radio]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}



</style>
<?php
include_once "db.php";

?>

<h3>Contact</h3>
<div class="container">
<form  method="post">  

    <label for="search"><b>ICU Type</b></label>
    <select name="search" id="search">
    <option value="General">General</option>
    <option value="Specialized">Specialized</option>
    </select>

    <label for="email"><b>Enter your email to book</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
    <br>
    <input type="submit" name="submit">
    
</form>
</div>
<br>
<br>
<?php
$booking_email = $_POST['email'];
//echo"$booking_email";
$room_query = "SELECT * FROM ICU";
$rooms_result = mysqli_query($con, $room_query);

if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    if (!isset($_POST["radio"])) {
        if(empty($str)){
            $room_query = "SELECT * FROM ICU";
            $rooms_result = mysqli_query($con, $room_query);
        }
        else{
            $room_query = "SELECT * FROM ICU WHERE ICU_type = '$str'";
            $rooms_result = mysqli_query($con, $room_query);
        }
    //}
    //else if(isset($_POST["radio"])){
        //if (empty($str)){
            //$room_query = "SELECT * FROM ICU WHERE Availability = 0";
            //$rooms_result = mysqli_query($con, $room_query);
        //}
        //else{
            //$room_query = "SELECT * FROM ICU WHERE ICU_type = '$str' AND Availability = 0";
            //$rooms_result = mysqli_query($con, $room_query);
        //}
    }
    
}
//else {
    //$room_query = "SELECT * FROM ICU";
    //$rooms_result = mysqli_query($con, $room_query);
//}


?>


<table table align = "center" border = '1px'  id="customers">
                        
    <tr>
        <th>ICU ID</th>
        <th>ICU Type</th>
        <th>Room No</th>
        <th>Floor</th>
        <th>Availability</th>
    </tr>
                        
	<?php
    //$ICU_id = $rooms['ICU_ID'];
		 if (isset($_POST["submit"])){
      if (mysqli_num_rows($rooms_result) > 0) {
        while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
            <tr>
                <td><?php echo $rooms['ICU_ID'] ?></td>
                <td><?php echo $rooms['ICU_type'] ?></td>
      <td><?php echo $rooms['Room_no']?></td>
      <td><?php echo $rooms['Floor']?></td>
      <td>
      <?php
                    if ($rooms['Availability'] == 0) {
                      /*echo '<form method="post"><input type="submit" value="Book ICU" name="book_icu"><form>';
                      */echo '<a href="ICU_Book.php?&ICU_id=' . $rooms['ICU_ID'] . '&booking_email=' . $booking_email . '  " class="btn btn-success" style="border-radius:0%""><input type="submit" value="Book" name="book"></a>';
                  
                      /*if(isset($_POST['book_icu'])){
                        header('Location:ICU_Book.php?&ICU_id=' . $rooms['ICU_ID'] . '');
                        exit();
                      }
                        /*
                        echo '<a href="ICU_Book.php?&ICU_id=' . $rooms['ICU_ID'] . '" class="btn btn-success" style="border-radius:0%"">Book Room</a>';
                        */
                    } else {
                        echo '<input type="submit" value="Booked" name="booked">';
                    }
                ?>
      </td>
    </tr>
<?php
  }
}

     }	
        
		?>				
</table>


<h2>
<div id="Sign_out" class="tabcontent">
  

  <a href='Blood_bank.php'>logout</a>
  
</div>
</h2>                

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