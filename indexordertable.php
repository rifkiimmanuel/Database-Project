<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM order_table ");

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
            <th> order id  </th>
            <th>order date </th>
            <th>order bill  </th>
            <th>order status  </th>
            <th>reservation id </th>
         
        </tr>
        <?php
        while ($order_table = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $order_table['order_id'] . "</td>";
            echo "<td>" . $order_table['order_date'] . "</td>";
            echo "<td>" . $order_table['order_bill'] . "</td>";
            echo "<td>" . $order_table['order_status'] . "</td>";
            echo "<td>" . $order_table['reservation_id'] . "</td>";
           // echo "<td><a href='edit.php?ID=" . $order_table['ID'] . "'>Edit</a> |
             //     <a href='delete.php?ID=" . $order_table['ID'] . "'>Delete</a></td>";
            //echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
