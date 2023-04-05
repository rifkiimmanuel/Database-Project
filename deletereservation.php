<?php
// include database connection file
// include database connection file
include_once("config.php");

//Get id from URL to delete that customer
$reservation_id = $_GET['ID'];

// delete customer row from table based on given ID
$result = mysqli_query($conn, "DELETE FROM `reservation` WHERE reservation_id = '$reservation_id'");

// After delete redirect to Home, so that latest customer list will be displayed
header("Location:indexfood.php");




?>