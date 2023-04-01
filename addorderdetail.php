<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $order_detail_id = $_POST['order_detail_id'];
    $total_order = $_POST['total_order'];
    $order_unit_price = $_POST['order_unit_price'];
    $order_id = $_POST['order_id'];
    $food_id = $_POST['food_id'];

    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO order_detail (order_detail_id, total_order, order_unit_price, order_id, food_id)
    VALUES('$order_detail_id','$total_order','$order_unit_price','$order_id', '$food_id')");

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
    <a href="indexorderdetail.php">GO To Home</a><br><br>
    <form action="addorderdetail.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td>order detail iD</td>
                <td><input type="text" name="order_detail_id"></td>
            </tr>
            <tr>
                <td> total order </td>
                <td><input type="text" name="total_order"></td>
            </tr>
            <tr>
                <td>order unit price</td>
                <td><input type="text" name="order_unit_price"></td>
            </tr>
            <tr>
                <td>order id</td>
                <td><input type="text" name="order_id"></td>
            </tr>
            <tr>
                <td>food id</td>
                <td><input type="text" name="food_id"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="addcust" <a href="indexcustomer.php"></a>></td>
            </tr>
        </table>
    </form>
</body>
</html>
