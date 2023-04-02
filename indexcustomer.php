<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM customer ");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST customer</title>
</head>
<body>
    <a href="index.php">Customer</a><br><br>
    <table border="1">
        <tr>
            <th>Customer ID</th>

            <th>Name</th>

            <th>Phone number </th>

            <th>Email</th>

            <th>Address</th>

            <th>Delete</th>
           
        </tr>

<?php
        while ($customer = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $customer['customer_id'] . "</td>";
            echo "<td>" . $customer['name'] . "</td>";
            echo "<td>" . $customer['phone_number'] . "</td>";
            echo "<td>" . $customer['email'] . "</td>";
            echo "<td>" . $customer['address'] . "</td>";
            echo "<td><a href='editcustomer.php?ID=" . $customer['customer_id'] . "'>Edit</a> |
            <a href='deletecustomer.php?ID=" . $customer['customer_id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
?>
    </table>
</body>
</html>
