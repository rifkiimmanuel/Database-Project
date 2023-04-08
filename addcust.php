<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    // $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // include database connection file
    include_once("config.php");

    if (!$name || !$phone_number || !$email || !$address) {
        echo "Please fill in all required fields.";
    } else {
        // insert customer data into table
        $result = mysqli_query($conn, "INSERT INTO customer (customer_id, name, phone_number, email, address)
        VALUES('NULL','$name','$phone_number','$email','$address')");

        // Show message when customer added
        echo "Customer added successfully. <a href='index.php'>View Customers</a><br><br>";
        $new_customer_id = mysqli_insert_id($conn);
        $new_customer_id2 = mysqli_insert_id($conn);
        header('Location: addreservation.php?id=' . $new_customer_id);
    }
}


// // check if form submitted
// if (isset($_POST['Submit'])) {
//     // $customer_id = $_POST['customer_id'];
//     $name = $_POST['name'];
//     $phone_number = $_POST['phone_number'];
//     $email = $_POST['email'];
//     $address = $_POST['address'];

//     // include database connection file
//     include_once("config.php");

//     if (!$name || !$phone_number || !$email || !$address) {
//         echo "Please fill in all required fields.";
//     } else {
//         // insert customer data into table
//         $result = mysqli_query($conn, "INSERT INTO customer (name, phone_number, email, address)
//         VALUES('$name','$phone_number','$email','$address')");
        

//         // Show message when customer added
//         echo "Customer added successfully. <a href='index.php'>View Customers</a><br><br>";
//         $new_customer_id = mysqli_insert_id($conn);
//         header('Location: addreservation.php?id=' . $new_customer_id);
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="style.css">
    <title>RESERVATION</title>
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

    <br></br>

    <form action="addcust.php" method="post" name="form1">
        <table width="25%" border="0">

           <!-- <tr>
                <td>ID</td>
                <td><input type="text" name="customer_id"></td>
            </tr> -->

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
