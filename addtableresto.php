<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $table_id = $_POST['table_id'];
    $table_number = $_POST['table_number'];
    $table_capacity = $_POST['table_capacity'];
    $table_avalibility = $_POST['table_availibility'];
    $restaurant_id = $_POST['restaurant_id'];

    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO table_restaurant (table_id, table_number, table_capacity, table_availibility, restaurant_id)
    VALUES('$table_id','$table_number','$table_capacity','$table_availibility', '$restaurant_id')");

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
    <a href="indextablerest.php">GO To Home</a><br><br>
    <form action="addtableresto.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td>Table ID</td>
                <td><input type="text" name="table_id"></td>
            </tr>
            <tr>
                <td>Table number </td>
                <td><input type="text" name="table_number"></td>
            </tr>
            <tr>
                <td>Table capacity</td>
                <td><input type="text" name="table_capacity"></td>
            </tr>
            <tr>
                <td>Table_availibility</td>
                <td><input type="text" name="table_availibility"></td>
            </tr>
            <tr>
                <td>Restaurant_id</td>
                <td><input type="text" name="restaurant_id"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="addcust"  href="indexcustomer.php"></a></td>
            </tr>
        </table>
    </form>
</body>
</html>
