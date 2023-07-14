
<?php
include_once "db.php";

$icu_id = $_POST['icu_id'];
$booking_email = $_POST["email"]; 

$sql = "UPDATE ICU SET Availability = '1' WHERE ICU_ID = '$icu_id '";
if (mysqli_query($con, $sql)) {
    /*echo "Record updated successfully";*/

}

$query = "INSERT INTO icu_booking (ICU_ID, Email) VALUES('$icu_id ', '$booking_email')";

mysqli_query($con, $query);

echo"<h3>Booking Successful</h3>";
$link_address = "index.php";
echo '<a href="'.$link_address.'">GO back to the Website</a>';
?>