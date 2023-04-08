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
$result = mysqli_query($conn, "SELECT * FROM food_category");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST RESERVATION</title>
</head>


<body>
    <br></br>

    <table border="1">

        <tr>
            <th>category_id</th>

            <th>name category </th>
        </tr>

<?php
        while ($food_category = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $food_category['category_id'] . "</td>";
            echo "<td>" . $food_category['name_category'] . "</td>";

            echo "<td><a href='editfoodcat.php?ID=" . $food_category['category_id'] . "'>Edit</a> |
                  <a href='deletefoodcat.php?ID=" . $food_category['category_id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
?>

    </table>
    <a href="addfoodcat.php" class="button">Add new Food</a>
    
</body>
</html>
