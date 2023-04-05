<?php
// include database connection file
// include database connection file
include_once("config.php");

//Get id from URL to delete that customer
$table_id = $_GET['ID'];

// delete customer row from table based on given ID
$result = mysqli_query($conn, "DELETE FROM `table_restaurant` WHERE table_id = '$table_id'");

// After delete redirect to Home, so that latest customer list will be displayed
header("Location:indextable.php");




?>