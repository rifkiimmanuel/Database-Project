<?php
include_once("config.php");
?>





<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel ="stylesheet" href="style.css">
 <title>Document</title>
</head>
<body>


<nav>
    <label class = "logo">Reservation</label>

    <ul> 
    <li>
        <a class+ "active" href= "index.php">Home </a>
    </li>
    <li>
        <a href= "addcust.php">Reservation</a>
        </li>
        <li>
        <a href= "reservation_detail.php">Check Your reservation</a>
    </li>
    <li>
        <a href= "indexfood.php">Check Menu</a>
    </li> 
    <li>
        <a href= "indexreservation.php">Daftar Reservation</a>
    </li>
    <li>
        <a href= "">Feedback </a>
    </li>
    </ul>
    </nav>
 <a> do you want to continue to reservation food? or buying food in Restauran?</a>
 <a href="addorderdetail.php">yes </a>
 <a href ="index.php">no </a>
 <a> check your reservation</a>
 
 
</body>
</html>



<?php
include_once("config.php");

// check if ID parameter is set
if(isset($_GET['id'])){
    // get ID from URL parameter
    $order_id = $_GET['id'];

    // retrieve reservation data from database based on reservation ID
    $result = mysqli_query($conn, "SELECT * FROM order_detail WHERE order_id = '{$order_id}'");
    $row = mysqli_fetch_assoc($result);

    // display reservation details if row is not null
    if ($row) {
        echo "Order ID: " . $row['order_id'] . "<br>";
        echo "total order: " . $row['total_order'] . "<br>";
        echo "Price: " . $row['order_unit_price'] . "<br>";
        echo "food_id " . $row['food_id'] . "<br>";
    } else {
        echo "No reservation found with ID {$order_id}.";
    }
} else {
    // display error message if ID parameter is not set
    echo "ID parameter not set.";
}
?>
