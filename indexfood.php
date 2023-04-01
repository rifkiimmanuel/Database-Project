<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM food ");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST RESERVATION</title>
</head>
<body>
    <a href="index.php">reservation now</a><br><br>
    <table border="1">
        <tr>
            <th>food id</th>
            <th>food name  </th>
            <th>food description  </th>
            <th>food price</th>
            <th>category id</th>
           
        </tr>
        <?php
        while ($food = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $food['food_id'] . "</td>";
            echo "<td>" . $food['food_name'] . "</td>";
            echo "<td>" . $food['food_description'] . "</td>";
            echo "<td>" . $food['food_price'] . "</td>";
            echo "<td>" . $food['category_id'] . "</td>";
           // echo "<td><a href='edit.php?ID=" . $food['ID'] . "'>Edit</a> |
             //     <a href='delete.php?ID=" . $food['ID'] . "'>Delete</a></td>";
            //echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
