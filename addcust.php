<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO customer (customer_id, name, phone_number, email, address)
    VALUES('$customer_id','$name','$phone_number','$email','$address')");

    // Show message when customer added
    echo "Customer added successfully. <a href='index.php'>View Customers</a>
    <br><br>";
    header('Location: addreservation.php');
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login now</title>
</head>

<body>
    <a href="indexcustomer.php">GO TO HOME</a>

    <br></br>

    <form action="addcust.php" method="post" name="form1">
        <table width="25%" border="0">

           <tr>
                <td>ID</td>
                <td><input type="text" name="customer_id"></td>
            </tr>

            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>

            <tr>
                <td>Phone Number</td>
                <td><input type="text" name="phone_number"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            
            <tr>
                <td>Address</td>
                <td><input type="text" name="address"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Next" href="indexcustomer.php"></a></td>
            </tr>

        </table>
    </form>
</body>
</html>
