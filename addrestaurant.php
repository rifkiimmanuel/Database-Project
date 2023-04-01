<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $restaurant_id = $_POST['restaurant_id'];
    $restaurant_name = $_POST['restaurant_name'];
    $restaurant_address = $_POST['restaurant_address'];
    $restaurant_phone_number = $_POST['restaurant_phone_number'];

    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO restaurant (restaurant_id, restaurant_name, restaurant_address, restaurant_phone_number)
    VALUES('$restaurant_id','$restaurant_name','$restaurant_address','$restaurant_phone_number')");

    // Show message when customer added
    echo "Customer added successfully. <a href='index.php'>View Customers</a><br><br>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add restaurant (admin) </title>
</head>
<body>
    <a href="index_restaurant.php">GO To Home</a><br><br>
    <form action="addrestaurant.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td>Restaurant ID</td>
                <td><input type="text" name="restaurant_id"></td>
            </tr>
            <tr>
                <td>Restaurant name </td>
                <td><input type="text" name="restaurant_name"></td>
            </tr>
            <tr>
                <td>Restaurant address</td>
                <td><input type="text" name="restaurant_address"></td>
            </tr>
            <tr>
                <td>Restaurant Phone Number</td>
                <td><input type="text" name="restaurant_phone_number"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="addcust" <a href="indexcustomer.php"></a>></td>
            </tr>
        </table>
    </form>
</body>
</html>
