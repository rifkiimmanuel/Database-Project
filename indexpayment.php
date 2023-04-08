<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel ="stylesheet" href="style.css">
 <title>Reservation Restaurant App </title>
</head>


    <body> 
    <nav>
    <label class = "logo">Reservation</label>

    <ul> 
    <li>
        <a class+ "active" href= "indexowner.php">Home</a>
    </li>
    <li>
    <a href= "indexcustomer.php">Check Customer</a>
    </li>
    <li>
        <a href= "indexreservation.php"> check Reservation</a>
    </li> 
    <li>
    <a href= "indexfoodcat.php">Category Menu</a>
    </li>
    <li>
        <a href= "indexfoodowner.php">Menu</a>
    </li> 
    <li>
        <a href= "indexpayment.php">Payment</a>
    </li>
    <li>
        <a href= "indexorderdetail.php">Order</a>
    </li>
    </ul>
    </nav>
    

    </body>
</html>



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

    // check if any of the fields are empty
    if (empty($payment_id) || empty($payment_method) || empty($total_payment_bill) || empty($payment_date) || empty($order_id)) {
        echo '<script type ="text/JavaScript">';  
            echo 'alert("Please fill all the fields")';  
            echo'</script>';
    } else {
        // insert customer data into table
        $result = mysqli_query($conn, "INSERT INTO payment (payment_id, payment_method, total_payment_bill, payment_date, order_id)
        VALUES('$payment_id','$payment_method','$total_payment_bill','$payment_date','$order_id')");

        // Show message when customer added
        echo "Payment added successfully. <a href='index.php'>View Payments</a><br><br>";
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment</title>
</head>
<body>
    <a>  add payment data</a>
    <form action="indexpayment.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td> Customer ID</td>
                <td><input type="text" name="payment_id"></td>
            </tr>
            <tr>
                <td>Payment method</td>
            
              <td> <select name="payment_method">
                <option value="bankjago">BNI </option>
                <option value="mandiri">Mandiri</option>
                <option value="gopay">Gopay</option>
                <option value="ovo">Ovo</option>
                <option value="dana">Dana</option>
                <option value="bca">BCA</option>
                <option value="Cash">Cash</option>
              </select>
              </td>
            </tr>
            <tr>
                <td>Total Payment Bill</td>
                <td><input type="text" name="total_payment_bill"></td>
            </tr>
            <tr>
                <td>Payment Date</td>
                <td><input type="date" name="payment_date"></td>
            </tr>
            <tr>
                <td>Order ID</td>
                <td><input type="text" name="order_id"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"  href="indexcustomer.php"></a></td>
            </tr>
        </table>
    </form>
</body>
</html>






<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM payment ");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST RESERVATION</title>
</head>
<body>
    <table border="2">
        <tr>
            <br>
            <th>Payment id  </th>
            <th>Payment method </th>
            <th>Total payment bill  </th>
            <th>Payment date   </th>
            <th>Order id </th>
         
        </tr>
        <?php
        while ($payment = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $payment['payment_id'] . "</td>";
            echo "<td>" . $payment['payment_method'] . "</td>";
            echo "<td>" . $payment['total_payment_bill'] . "</td>";
            echo "<td>" . $payment['payment_date'] . "</td>";
            echo "<td>" . $payment['order_id'] . "</td>";
            echo "<td><a href='editpayment.php?ID=" . $payment['payment_id'] . "'>Edit</a> |
                  <a href='deletepayment.php?ID=" . $payment['payment_id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
