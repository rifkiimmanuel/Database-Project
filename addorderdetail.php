<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<nav>
    <label class = "logo">Reservation</label>

    <ul> 
    <li>
        <a class+ "active" href= "index.php">Home </a>
    </li>
    <li>
        <a href= "addcust.php">Reservation</a>
        </li>
        <li>
        <a href= "reservation_detail2.php">Check Your reservation</a>
    </li>
    <li>
        <a href= "indexfood.php">Check Menu</a>
    </li> 
    <li>
        <a href= "indexreservation2.php">Daftar Reservation</a>
    </li>
    </ul>
    </nav>
</body>
</html>


<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $total = $_POST['total_order'];
    $food_id = $_POST['food_id'];

    // include database connection file
    include_once("config.php");

    // check if 'total_order' is empty
    if (empty($total)) {
        echo 'please fill the column';  
    } else {
        // retrieve food price from database based on food id
        $result = mysqli_query($conn, "SELECT food_price FROM food WHERE food_id='$food_id'");
        $row = mysqli_fetch_assoc($result);
        $food_price = $row['food_price'];

        // convert values to numbers
        $food_price = floatval($food_price);
        $total = floatval($total);

        // calculate order unit price
        $order_unit_price = $food_price * $total;

        // insert order detail data into table
        $result = mysqli_query($conn, "INSERT INTO order_detail (total_order, order_unit_price, food_id)
        VALUES('$total','$order_unit_price','$food_id')");
        $new_order_detail = mysqli_insert_id($conn);

        if ($result) {
            // Show message when order detail added
            echo "Order detail added successfully. <a href='indexorderdetail.php'>View Order Details</a><br><br>";
            header('Location: order_detail.php?id=' . $new_order_detail);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
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

    <form action="addorderdetail.php" method="post" name="form1">
        <table width="25%" border="0">
           <!-- <tr>
                <td>Order detail iD</td>
                <td><input type="text" name="order_id"></td>
            </tr> -->
            <!-- <tr>
                <td>Order unit price</td>
                <td><input type="text" name="order_unit_price"></td>
            </tr> -->
            <!-- <tr>
                <td>Order id</td>
                <td><input type="text" name="order_id"></td> -->
                <!-- <td>
                <select name="food_id">
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
                <option value="5">Risol Mayo </option>
                <option value="6">Key lime pie  </option>
                <option value="7">Tater tots</option>
                <option value="8">Jerky </option>
                <option value="9">Samosas</option>
                <option value="10">Aloo Gobi</option>
                <option value="11">Matar Paneer </option>
                <option value="12">Rogan Josh </option>
                <option value="13">Tandoori Chicken </option>
                <option value="14">Pulihora</option>
                <option value="15">Masala Dosa </option>
                <option value="16">Gulab Jamun</option>
                <option value="17">Fajitas</option>
                <option value="18">Byrek</option>
                <option value="19">Escudella</option>
                <option value="20">Croissant</option>
                </select>
            </td>
            </tr>
            
            <tr>
                <td>How many servings of food </td>
                <td><input type="text" name="total_order"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>
