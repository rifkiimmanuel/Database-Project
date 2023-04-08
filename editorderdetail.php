
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




// create database connection using config file
include_once("config.php");

// check if form is submitted
if (isset($_POST['update'])) {
    $order_id = $_POST['order_id'];
    $total_order = $_POST['total_order'];
    $order_unit_price = $_POST['order_unit_price'];
    $food_id = $_POST['food_id'];
    

    // update food data in database
    $result = mysqli_query($conn, "UPDATE order_detail SET total_order='$total_order', order_unit_price='$order_unit_price', food_id ='$food_id' WHERE order_id=$order_id");

    // redirect to homepage
    header("Location: indexorderdetail.php");
}

// get food ID from URL
$order_id = $_GET['ID'];

// fetch food data from database
$result = mysqli_query($conn, "SELECT * FROM order_detail WHERE order_id=$order_id");

while ($order_detail = mysqli_fetch_array($result)) {
    $total_order = $order_detail['total_order'];
    $order_unit_price = $order_detail['order_unit_price'];
    $food_id = $order_detail['food_id'];
}
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food Category</title>
</head>
<body>

    <form name="update_food" method="post" action="editorderdetail.php">
        <table border="0">
        <tr>
                <td>order Id </td>
                <td><input type="text" name="order_id" value="<?php echo $order_id;?>"></td>
            <tr>
            <tr>
                <td>Total order  </td>
                <td><input type="text" name="total_order" value="<?php echo $total_order;?>"></td>
            <tr>
            <tr>
                <td>Order Unit Price </td>
                <td><input type="text" name="order_unit_price" value="<?php echo $order_unit_price;?>"></td>
            <tr>
            <tr>
                <td>food id</td>
                <td><input type="text" name="food_id" value="<?php echo $food_id;?>"></td>
            </tr>
                <td><input type="hidden" name="order_id" value="<?php echo $order_id;?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
