
<?php
include_once "db.php";

$bag_id = $_POST['bag_id'];
$booking_email = $_POST["email"]; 

$sql = "UPDATE Blood_bank SET Availability = '1' WHERE Bag_ID = '$bag_id '";
if (mysqli_query($con, $sql)) {
    /*echo "Record updated successfully";*/

}

$query = "INSERT INTO blood_bank_book (Bag_ID, Booking_email) VALUES('$bag_id ', '$booking_email')";

mysqli_query($con, $query);

echo"<h3>Booking Successful</h3>";
$link_address = "index.php";
echo '<a href="'.$link_address.'">GO back to the Website</a>';
?>