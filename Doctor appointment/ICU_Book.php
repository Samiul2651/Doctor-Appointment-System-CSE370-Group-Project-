<?php
session_start();
include_once "db.php";
?>



<?php
if (isset($_GET['ICU_id'])){
    $get_icu_id = $_GET['ICU_id'];
    $booking_email = $_GET['booking_email'];
    
    ?>
    <h2>
        <?php
            $sql = "UPDATE ICU SET Availability = '1' WHERE ICU_ID = '$get_icu_id'";
            mysqli_query($con, $sql);
                /*echo "Record updated successfully";*/
            
            /*patient_email/doctor_id in $P*/
            //$P = 'p123';
            //$booking_by = '';/*this is checking whether the booking is by patient or doctor*/
            if($booking_email){
                $sql = "INSERT INTO icu_booking (ICU_ID,Email)
                VALUES ('$get_icu_id','$booking_email')";
                if (mysqli_query($con, $sql)) {
                    /*echo "Record updated successfully";*/
                } 

                
            }else{
                $sql = "INSERT INTO ICU_booking_by_Patient (Patient_email,ICU_ID)
                VALUES ('$P','$get_icu_id')";

                if (mysqli_query($con, $sql)) {
                    /*echo "Record updated successfully";*/
                } 
            }
            
            /*$get_room_sql = "SELECT * FROM ICU WHERE ICU_ID = '$get_icu_id'";
            $get_room_result = mysqli_query($con,$get_room_sql);
            $get_room = mysqli_fetch_assoc($get_room_result);

            /*echo $get_room['Availability'];*/
            
                        
}
?>
</h2>
<?php
    if (isset($_GET['ICU_id'])) {
        echo '<a href="index.php" class="btn btn-success" style="border-radius:0%""><input type="submit" value="Confirm Booking" name="booked"></a>';
    }
?>
