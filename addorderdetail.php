<?php

// check if form submitted
if (isset($_POST['Submit'])) {
    $order_id = $_POST['order_id'];
    $total = $_POST['total_order'];
    $order_id = $_POST['order_id'];
    $food_id = $_POST['food_id'];

    // include database connection file
    include_once("config.php");

    // retrieve food price from database based on food id
    $result = mysqli_query($conn, "SELECT food_price FROM food WHERE food_id='$food_id'");
    $row = mysqli_fetch_assoc($result);
    $food_price = $row['food_price'];

    // insert order detail data into table
    $order_unit_price = $food_price * $total;
    $result = mysqli_query($conn, "INSERT INTO order_detail (order_id, total_order, order_unit_price, food_id)
    VALUES('$order_id','$total','$order_unit_price','$food_id')");
                 $new_order_detail = mysqli_insert_id($conn);
                 header('Location: order_detail.php?id=' . $new_order_detail);

    if ($result) {
        // Show message when order detail added
        echo "Order detail added successfully. <a href='indexorderdetail.php'>View Order Details</a><br><br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add order detail</title>
</head>
<body>
    <a href="indexorderdetail.php">GO To Home</a><br><br>

    <form action="addorderdetail.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td>Order detail iD</td>
                <td><input type="text" name="order_id"></td>
            </tr>
            <tr>
                <td>Total order </td>
                <td><input type="text" name="total_order"></td>
            </tr>
            <tr>
                <td>Order unit price</td>
                <td><input type="text" name="order_unit_price"></td>
            </tr>
            <tr>
                <td>Order id</td>
                <td><input type="text" name="order_id"></td>
                <td>
                <!-- <select name="food_id">
                <option value="1">001</option>
                <option value="2">002</option>
                <option value="3">003</option>
                <option value="4">004</option>
                <option value="5">005</option>
                <option value="6">006</option>
                <option value="7">007</option>
                <option value="8">008</option>
                <option value="9">009</option>
                <option value="10">010</option>
                <option value="11">011</option>
                <option value="12">012</option>
                <option value="13">013</option>
                <option value="14">014</option>
                <option value="15">015</option>
                <option value="16">016</option>
                <option value="17">017</option>
                <option value="18">018</option>
                <option value="19">019</option>
                <option value="20">020</option>
                </select> -->
            </td>
            </tr>
            <tr>
            <td>Order Food</td>
            <td>
                <select name="food_id">
                <option value="1">Rendang</option>
                <option value="2">Otak-otak</option>
                <option value="3">Nasi Goreng</option>
                <option value="4">Ayam Betutu</option>
                <option value="5">12:00</option>
                <option value="6">13:00</option>
                <option value="7">14:00</option>
                <option value="8">15:00</option>
                <option value="9">16:00</option>
                <option value="10">17:00</option>
                <option value="11">18:00</option>
                <option value="12">19:00</option>
                <option value="13">20:00</option>
                <option value="14">21:00</option>
                <option value="15">21:00</option>
                <option value="16">21:00</option>
                <option value="17">21:00</option>
                <option value="18">21:00</option>
                <option value="19">21:00</option>
                <option value="20">21:00</option>
                </select>
            </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>
