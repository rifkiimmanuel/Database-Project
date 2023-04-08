<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel ="stylesheet" href="style.css">
 <title>Reservation Restaurant App </title>
</head>


    <body> 
    <nav>
    <label class = "logo">Reservation</label>

    <ul> 
    <li>
        <a class+ "active" href= "indexowner.php">Home</a>
    </li>
    <li>
    <a href= "indexcustomer.php">Check Customer</a>
    </li>
    <li>
        <a href= "indexreservation.php"> check Reservation</a>
    </li> 
    <li>
    <a href= "indexfoodcat.php">Category Menu</a>
    </li>
    <li>
        <a href= "indexfoodowner.php">Menu</a>
    </li> 
    <li>
        <a href= "indexpayment.php">Payment</a>
    </li>
    <li>
        <a href= "indexorderdetail.php">Order</a>
    </li>
    </ul>
    </nav>
    

    </body>
</html>




<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM order_detail ");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST RESERVATION</title>
</head>
<body>

    <table border="1">
        <tr>
            <th>Order Detail ID</th>

            <th>Total Order</th>

            <th>Order Unit Price</th>

            <th>Order Id</th>

            <th>Food Id</th>
         
        </tr>

<?php
        while ($order_detail = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $order_detail['order_id'] . "</td>";
            echo "<td>" . $order_detail['total_order'] . "</td>";
            echo "<td>" . $order_detail['order_unit_price'] . "</td>";
            echo "<td>" . $order_detail['order_id'] . "</td>";
            echo "<td>" . $order_detail['food_id'] . "</td>";
            echo "<td><a href='editorderdetail.php?ID=" . $order_detail['order_id'] . "'>Edit</a> |
                  <a href='delete.php?ID=" . $order_detail['order_id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
?>

    </table>
    
</body>
</html>
