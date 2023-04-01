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
            <th> payment id  </th>
            <th>payment method </th>
            <th>total payment bill  </th>
            <th>payment date   </th>
            <th>order id </th>
         
        </tr>
        <?php
        while ($payment = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $payment['payment_id'] . "</td>";
            echo "<td>" . $payment['payment_method'] . "</td>";
            echo "<td>" . $payment['total_payment_bill'] . "</td>";
            echo "<td>" . $payment['payment_date'] . "</td>";
            echo "<td>" . $payment['order_id'] . "</td>";
           // echo "<td><a href='edit.php?ID=" . $order_table['ID'] . "'>Edit</a> |
             //     <a href='delete.php?ID=" . $order_table['ID'] . "'>Delete</a></td>";
            //echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
