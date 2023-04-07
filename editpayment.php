<?php

// create database using config file
include_once("config.php");

// check if form is submitted
if (isset($_POST['update'])) {
    $payment_id = $_POST['payment_id'];
    $payment_method = $_POST['payment_method'];
    $total_payment_bill = $_POST['total_payment_bill'];
    $payment_date = $_POST['payment_date'];
    $order_id = $_POST['order_id'];

    // update customer data in database
    $result = mysqli_query($conn, "UPDATE payment SET payment_method='$payment_method', total_payment_bill='$total_payment_bill', payment_date='$payment_date', order_id='$order_id' WHERE payment_id=$payment_id");

    // redirect to homepage
    header("Location: addpayment.php");
}

// get customer ID from URL
$payment_id = $_GET['ID'];

// fetch customer data from database
$result = mysqli_query($conn, "SELECT * FROM payment WHERE payment_id=$payment_id");

while ($payment = mysqli_fetch_array($result)) {
    $payment_method = $payment['payment_method'];
    $total_payment_bill = $payment['total_payment_bill'];
    $payment_date = $payment['payment_date'];
    $order_id = $payment['order_id'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit customer</title>
</head>
<body>
    <a href="indexpayment.php">customer</a><br><br>

    <form name="update_payment" method="post" action="editpayment.php">
        <table border="0">
            <!-- <tr>
                <td> payment method</td>
                <td><input type="text" name="name" value="<?php echo $payment_method;?>"></td>
            </tr> -->
            <tr>
                <td>Payment Method</td>
            
              <td> <select name="payment_method">
                <option value="bankjago">BNI </option>
                <option value="mandiri">Mandiri</option>
                <option value="gopay">Gopay</option>
                <option value="ovo">Ovo</option>
                <option value="dana">Dana</option>
                <option value="bca">BCA</option>
              </select>
              </td>
              <td><input type="text" name="name" value="<?php echo $payment_method;?>"></td>
            </tr>
            <tr>
                <td>Total payment bill</td>
                <td><input type="text" name="phone_number" value="<?php echo $total_payment_bill;?>"></td>
            </tr>
            <tr>
                <td>Payment Date</td>
                <td><input type="date" name="payment_id" value="<?php echo $payment_date;?>"></td>
            </tr>
            <tr>
                <td>order_id</td>
                <td><input type="text" name="order_id" value="<?php echo $order_id;?>"></td>
                
            </tr>
            <tr>
                <td><input type="hidden" name="payment_id" value="<?php echo $_GET['ID'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
