<?php

// create database using config file
include_once("config.php");

// check if form is submitted
if (isset($_POST['update'])) {
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // update customer data in database
    $result = mysqli_query($conn, "UPDATE customer SET name='$name', phone_number='$phone_number', email='$email', address='$address' WHERE customer_id=$customer_id");

    // redirect to homepage
    header("Location: index.php");
}

// get customer ID from URL
$customer_id = $_GET['ID'];

// fetch customer data from database
$result = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id=$customer_id");

while ($customer = mysqli_fetch_array($result)) {
    $name = $customer['name'];
    $phone_number = $customer['phone_number'];
    $email = $customer['email'];
    $address = $customer['address'];
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
    <a href="indexcustomer.php">customer</a><br><br>

    <form name="update_customer" method="post" action="editcustomer.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Phone number</td>
                <td><input type="text" name="phone_number" value="<?php echo $phone_number;?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $address;?>"></td> //address dihapus
                
            </tr>
            <tr>
                <td><input type="hidden" name="customer_id" value="<?php echo $_GET['ID'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
