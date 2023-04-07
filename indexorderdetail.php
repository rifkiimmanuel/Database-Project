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
    <a href="add.php">reservation now</a><br><br>
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
           // echo "<td><a href='edit.php?ID=" . $reservation['ID'] . "'>Edit</a> |
             //     <a href='delete.php?ID=" . $reservation['ID'] . "'>Delete</a></td>";
            //echo "</tr>";
        }
?>

    </table>
    
</body>
</html>
