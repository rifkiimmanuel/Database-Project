<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM payment ");

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
    <table border="2">
        <tr>
            <th>Payment id  </th>
            <th>Payment method </th>
            <th>Total payment bill  </th>
            <th>Payment date   </th>
            <th>Order id </th>
         
        </tr>
        <?php
        while ($payment = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $payment['payment_id'] . "</td>";
            echo "<td>" . $payment['payment_method'] . "</td>";
            echo "<td>" . $payment['total_payment_bill'] . "</td>";
            echo "<td>" . $payment['payment_date'] . "</td>";
            echo "<td>" . $payment['order_id'] . "</td>";
            echo "<td><a href='editpayment.php?ID=" . $payment['payment_id'] . "'>Edit</a> |
                  <a href='deletepayment.php?ID=" . $payment['payment_id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
