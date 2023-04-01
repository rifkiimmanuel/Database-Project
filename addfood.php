<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_description = $_POST['food_description'];
    $food_price = $_POST['food_price'];
    $category_id = $_POST['category_id'];

    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO food (food_id, food_name, food_description, food_price,  category_id)
    VALUES('$food_id','$food_name','$food_description','$food_price','$category_id')");

    // Show message when customer added
    echo "Customer added successfully. <a href='index.php'>View Customers</a><br><br>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sekarang</title>
</head>
<body>
    <a href="indexfood.php">GO To Home</a><br><br>
    <form action="addfood.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td>Food Id</td>
                <td><input type="text" name="food_id"></td>
            </tr>
            <tr>
                <td>Food Name </td>
                <td><input type="text" name="food_name"></td>
            </tr>
            <tr>
                <td>Food description</td>
                <td><input type="text" name="food_description"></td>
            </tr>
            <tr>
                <td>Food Price</td>
                <td><input type="text" name="food_price"></td>
            </tr>
            <tr>
                <td>Category id</td>
                <td><input type="text" name="category_id"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="addcust" <a href="indexcustomer.php"></a>></td>
            </tr>
        </table>
    </form>
</body>
</html>
