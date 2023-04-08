<?php

// create database connection using config file
include_once("config.php");

// check if form is submitted
if (isset($_POST['update'])) {
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_description = $_POST['food_description'];
    $food_price = $_POST['food_price'];

    // update food data in database
    $result = mysqli_query($conn, "UPDATE food SET food_name='$food_name', food_description='$food_description', food_price='$food_price' WHERE food_id=$food_id");

    // redirect to homepage
    header("Location: indexfoodowner.php");
}

// get food ID from URL
$food_id = $_GET['ID'];

// fetch food data from database
$result = mysqli_query($conn, "SELECT * FROM food WHERE food_id=$food_id");

while ($food = mysqli_fetch_array($result)) {
    $food_name = $food['food_name'];
    $food_description = $food['food_description'];
    $food_price = $food['food_price'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food</title>
</head>
<body>
    <a href="indexfood.php">Back to Food List</a><br><br>

    <form name="update_food" method="post" action="editfood.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="food_name" value="<?php echo $food_name;?>"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="food_description" value="<?php echo $food_description;?>"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="food_price" value="<?php echo $food_price;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="food_id" value="<?php echo $food_id;?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
