<?php
// include database connection file
// include database connection file
include_once("config.php");

//Get id from URL to delete that customer
$payment_id = $_GET['ID'];

// delete customer row from table based on given ID
$result = mysqli_query($conn, "DELETE FROM `payment` WHERE payment_id = '$payment_id'");

// After delete redirect to Home, so that latest customer list will be displayed
header("Location:indexfood.php");




?>