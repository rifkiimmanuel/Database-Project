<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM table_restaurant ");

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
            <th>table id </th>
            <th>table number  </th>
            <th>table capacity</th>
            <th>table avaibility</th>
            <th>restaurant id</th>
           
           
        </tr>
        <?php
        while ($table_restaurant = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $table_restaurant['table_id'] . "</td>";
            echo "<td>" . $table_restaurant['table_number'] . "</td>";
            echo "<td>" . $table_restaurant['table_capacity'] . "</td>";
            echo "<td>" . $table_restaurant['table_availibility'] . "</td>";
            echo "<td>" . $table_restaurant['restaurant_id'] . "</td>";
           // echo "<td><a href='edit.php?ID=" . $restaurant['ID'] . "'>Edit</a> |
             //     <a href='delete.php?ID=" . $restaurant['ID'] . "'>Delete</a></td>";
            //echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
