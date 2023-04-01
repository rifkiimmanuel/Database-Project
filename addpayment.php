<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $payment_id = $_POST['payment_id'];
    $payment_method = $_POST['payment_method'];
    $total_payment_bill = $_POST['total_payment_bill'];
    $payment_date = $_POST['payment_date'];
    $order_id = $_POST['order_id'];

    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO payment (payment_id, payment_method, total_payment_bill, payment_date, order_id)
    VALUES('$payment_id','$payment_method','$total_payment_bill','$payment_date','$order_id')");

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
    <a href="indexpayment.php">GO TO HOME</a><br><br>
    <form action="addpayment.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td>ID</td>
                <td><input type="text" name="payment_id"></td>
            </tr>
            <tr>
                <td>payment method</td>
            
              <td> <select name="payment_method">
                <option value="bca">BNI </option>
               <option value="mandiri">Mandiri</option>
               <option value="gopay">Gopay</option>
              <option value="ovo">Ovo</option>
              <option value="dana">Dana</option>
              <option value="bca">BCA</option>
              </select>
              </td>
            </tr>
            <tr>
                <td>Total Payment Bill</td>
                <td><input type="text" name="total_payment_bill"></td>
            </tr>
            <tr>
                <td>Payment date</td>
                <td><input type="text" name="payment_date"></td>
            </tr>
            <tr>
                <td>order id</td>
                <td><input type="text" name="order_id"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="addcust" <a href="indexcustomer.php"></a>></td>
            </tr>
        </table>
    </form>
</body>
</html>
