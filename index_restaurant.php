<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM restaurant ");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant </title>
</head>
<body>
    <a href="index.php">reservation now</a><br><br>
    <table border="1">
        <tr>
            <th>restaurant id</th>
            <th>restaurant name   </th>
            <th>restaurant address   </th>
            <th>restaurant phone number</th>
           
        </tr>
        <?php
        while ($restaurant = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $restaurant['restaurant_id'] . "</td>";
            echo "<td>" . $restaurant['restaurant_name'] . "</td>";
            echo "<td>" . $restaurant['restaurant_address'] . "</td>";
            echo "<td>" . $restaurant['restaurant_phone_number'] . "</td>";
           // echo "<td><a href='edit.php?ID=" . $restaurant['ID'] . "'>Edit</a> |
             //     <a href='delete.php?ID=" . $restaurant['ID'] . "'>Delete</a></td>";
            //echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
