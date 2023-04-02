<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM reservation ");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST RESERVATION</title>
</head>
<body>
    <a href="addreservation.php">reservation now</a><br><br>
    <table border="1">
        <tr>
            <th> Reservation id/th>
            <th> Name Customer </th>
            <th>reservation date  </th>
            <th>reservation time  </th>
            <th>number of guests </th>
            <th>customer id</th>
            <th> table id </th>
         
        </tr>
        <?php
        while ($reservation = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $reservation['reservation_id'] . "</td>";
            echo "<td>" . $reservation['Name_cust'] . "</td>";
            echo "<td>" . $reservation['reservation_time'] . "</td>";
            echo "<td>" . $reservation['number_of_guests'] . "</td>";
            echo "<td>" . $reservation['customer_id'] . "</td>";
            echo "<td>" . $reservation['table_id'] . "</td>";
           // echo "<td><a href='edit.php?ID=" . $reservation['ID'] . "'>Edit</a> |
             //     <a href='delete.php?ID=" . $reservation['ID'] . "'>Delete</a></td>";
            //echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
