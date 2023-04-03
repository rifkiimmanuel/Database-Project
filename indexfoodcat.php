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
    <a href="add.php">reservation now</a>
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

            echo "<td><a href='edit.php?ID=" . $food_category['category_id'] . "'>Edit</a> |
                  <a href='deletefoodcat.php?ID=" . $food_category['category_id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
?>

    </table>
    
</body>
</html>
