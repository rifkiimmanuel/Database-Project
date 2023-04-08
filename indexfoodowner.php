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
    <link rel ="stylesheet" href="style.css">
    <title>LIST RESERVATION</title>
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
    </nav>


    <br><br>
    <table border="1">
        <tr>
            <th>food id</th>
            <th> Menu </th>
            <th>Description  </th>
            <th>Price</th>
            <th>category id</th>
            <th> edit </th>
           
        </tr>
        <?php
        while ($food = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $food['food_id'] . "</td>";
            echo "<td>" . $food['food_name'] . "</td>";
            echo "<td>" . $food['food_description'] . "</td>";
            echo "<td>" . $food['food_price'] . "</td>";
            echo "<td>" . $food['category_id'] . "</td>";
            // echo "<td>" . $food['category_id'] . "</td>";
             echo "<td><a href='editfood.php?ID=" . $food['food_id'] . "'>Edit</a> |
                  <a href='deletefood.php?ID=" . $food['food_id'] . "'>Delete</a></td>";
                  // echo "<td><a href='addfood.php?ID=" . $food['food_id'] . "'> add </a></td>";

            echo "</tr>";
        }
        ?>

        
    </table>
    <a href="addfood.php" class="button">Add new Food</a>

</body>
</html>
