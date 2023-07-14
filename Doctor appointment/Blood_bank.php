<?php
include_once "db.php";

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

<button class="tablink" onclick="openPage('Dashboard', this, '#1D8348')"id="defaultOpen">Blood Bank</button>

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

.customer1 {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.customer1:hover {
  background-color: #45a049;
}

</style>






<h1>Bags Available per Blood Type:</h1>
<table table align = "center" id="customers">
                        
    <tr>
        <th>Blood Type</th>
        <th>Available Bags</th>
        
    </tr>
    <?php
    $room_query = "SELECT Distinct Blood_type AS bt,Count(Blood_type) AS ct From Blood_bank Group BY Blood_type;";
    $rooms_result = mysqli_query($con, $room_query);
    $i = 0;
    if (mysqli_num_rows($rooms_result) > 0) {
        while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>   
	        <tr>
                <td>
                    <?php echo $rooms['bt'] ?>
                </td>
                <td>
                <form method="post">
                    <button name="type" type="submit" value="<?php echo $rooms['bt'] ?>"  id="customers1"><?php echo $rooms['ct'] ?></button>
                </form>
                </td>
	        </tr>

    <?php
        $i = $i + $rooms['ct'];
        }
    }
    ?>
    <tr>
        <?php
        
        ?>
        <td>ALL</td>
        <td>
            <form method="post">
                <button name="type2" type="submit" value="ALL"><?php echo $i ?></button>
            </form>
        </td>    
    </tr>
						
</table>

<?php
$room_query = "SELECT * FROM Blood_bank";
$rooms_result = mysqli_query($con, $room_query);

if (isset($_POST["type"])) {
    $str = $_POST["type"];
    if(!isset($_POST["type2"])){
        $room_query = "SELECT * FROM Blood_bank WHERE Blood_type = '$str'";
        $rooms_result = mysqli_query($con, $room_query);
    }
    else{
        $room_query = "SELECT * FROM Blood_bank";
        $rooms_result = mysqli_query($con, $room_query);
    }
}
else{
    $room_query = "SELECT * FROM Blood_bank";
    $rooms_result = mysqli_query($con, $room_query);
}
?>
<br>
<br>
<br>
<h1>All Bags info:</h1>
<table table align = "center" id="customers">
                        
    <tr>
        <th>Bag ID</th>
        <th>Blood Type</th>
        <th>Expiration Date</th>
        <th>Availability</th>
        
    </tr>
    <?php
    if (mysqli_num_rows($rooms_result) > 0) {
        while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>   
	        <tr>
                <td><?php echo $rooms['Bag_ID'] ?></td>
                <td><?php echo $rooms['Blood_type'] ?></td>
                <td><?php echo $rooms['Expiration_date'] ?></td>
                <td>
                <?php
                    if ($rooms['Availability'] == 0) {
                      

                      echo '<a href="Blood_bank_Book.php?&Bag_id=' . $rooms['Bag_ID'] . '" class="btn btn-success" style="border-radius:0%""><input type="submit" value="Book" name="book"></a>';
                            
                    } else {
                        echo '<input type="submit" value="Booked" name="booked">';
                    }
                ?>
                </td>
                
	        </tr>
            
    <?php
        }
    }
    ?>
						
</table>


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