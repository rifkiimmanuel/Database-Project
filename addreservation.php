<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $reservation_id = $_POST['reservation_id'];
    $Name_cust = $_POST['Name_cust'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $customer_id = $_POST['customer_id'];
    $table_id = $_POST['table_id'];

    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO reservation (reservation_id, Name_cust, reservation_date, reservation_time, number_of_guests, customer_id, table_id)
    VALUES('$reservation_id','$Name_cust','$reservation_date','$reservation_time', '$number_of_guests', '$customer_id', '$table_id')");

    // Show message when customer added
    echo "Customer added successfully. <a href='index.php'>View Customers</a><br><br>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add reservation </title>
</head>
<body>
    <a href="index.php">Go To Home</a><br><br>
    <a href ="indexreservation.php"> check info </a>
    <form action="addreservation.php" method="post" name="form1">
        <table width="25%" border="0">
           <tr>
                <td>Reservation ID</td>
                <td><input type="text" name="reservation_id"></td>
            </tr>
            <tr>
                <td>Name  cust</td>
                <td><input type="text" name="Name_cust"></td>
            </tr>
            <tr>
                <td>Reservation date</td>
                <td><input type="date" name="reservation_date"></td>
            </tr>
            <tr>
                <td>Reservation time</td>
                <td><input type="text" name="reservation_time"></td>
            </tr>
            <tr>
                <td>Total guests</td>
                <td><input type="text" name="number_of_guests"></td>
            </tr>
            <tr>
                <td>Customer Id</td>
                <td><input type="text" name="customer_id"></td>
            </tr>
            <tr>
                <td>Restaurant Phone Number</td>
                <td><input type="text" name="table_id"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"  href="indexcustomer.php"></a></td>
            </tr>
        </table>
    </form>
</body>
</html>
