<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $order_id = $_POST['order_id'];
    $order_date = $_POST['order_date'];
    $order_bill = $_POST['order_bill'];
    $order_status = $_POST['order_status'];
    $reservation_id = $_POST['reservation_id'];

    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO order_table (order_id, order_date, order_bill, order_status, reservation_id)
    VALUES('$order_id','$order_date','$order_bill','$order_status', '$reservation_id')");

    // Show message when customer added
    echo "Customer added successfully. <a href='index.php'>View Customers</a><br><br>";
    header('Location: addorderdetail.php');
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
    <a href="indexordertable.php">GO To Home</a><br><br>
    <form action="addordertable.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td>Order ID</td>
                <td><input type="text" name="order_id"></td>
            </tr>
            <tr>
                <td>Order date </td>
                <td><input type="date" name="order_date"></td>
            </tr>
            <tr>
                <td>Order bill</td>
                <td><input type="text" name="order_bill"></td>
            </tr>
            <tr>
                <td>Order status</td>
                <td><input type="text" name="order_status"></td>
            </tr>
            <tr>
                <td>Reservation_id</td>
                <td><input type="text" name="reservation_id"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"  href="indexcustomer.php"></a></td>
            </tr>
        </table>
    </form>
</body>
</html>
