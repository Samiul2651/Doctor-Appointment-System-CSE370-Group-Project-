
<?php
$bag_id = $_GET['Bag_id'];

?>
<h2>To confirm booking enter you email</h2>
<form action="Blood_bank_book_2.php", method = "post">
<label for="email">Email:</label><br>
<input type="email" name="email" value=""><br><br>
<input type="hidden" name="bag_id" value="<?php echo $bag_id; ?>">
<input type="submit" value="Confirm Booking">
</form>




