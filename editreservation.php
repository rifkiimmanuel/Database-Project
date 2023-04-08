<?php




// create database connection using config file
include_once("config.php");

// check if form is submitted
if (isset($_POST['update'])) {
    $reservation_id = $_POST['reservation_id'];
    $Name_cust = $_POST['Name_cust'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $customer_id = $_POST['customer_id'];
    $table_id = $_POST['table_id'];
    

    // update food data in database
    $result = mysqli_query($conn, "UPDATE reservation SET Name_cust='$Name_cust', reservation_date ='$reservation_date', reservation_time = '$reservation_time', number_of_guests ='$number_of_guests', customer_id ='$customer_id', table_id = '$table_id'  WHERE reservation_id=$reservation_id");

    // redirect to homepage
    header("Location: indexreservation.php");
}

// get food ID from URL
$reservation_id = $_GET['reservation_id'];

// fetch food data from database
$result = mysqli_query($conn, "SELECT * FROM reservation WHERE reservation_id=$reservation_id");

while ($reservation = mysqli_fetch_array($result)) {
 
    $Name_cust= $reservation['Name_cust'];
    $reservation_date= $reservation['reservation_date'];
    $reservation_time= $reservation['reservation_time'];
    $number_of_guests= $reservation['number_of_guests'];
    $customer_id= $reservation['customer_id'];
    $table_id= $reservation['table_id'];
}
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
</head>
<body>

    <form name="update_reservation" method="post" action="editreservation.php">
        <table border="0">
        <tr>
                <td>Name Customer  </td>
                <td><input type="text" name="Name_cust" value="<?php echo $Name_cust;?>"></td>
            <tr>
            <tr>
                <td>Reservation Date  </td>
                <td><input type="text" name="reservation_date" value="<?php echo $reservation_date;?>"></td>
            <tr>
            <tr>
                <td>Reservation Time  </td>
                <td><input type="text" name="reservation_time" value="<?php echo $reservation_time;?>"></td>
            <tr>
            <tr>
                <td> Number Of guests </td>  
                <td><input type="text" name="number_of_guests" value="<?php echo $number_of_guests;?>"></td>
            <tr>
            <tr>
                <td> Customer ID </td>
                <td><input type="text" name="customer_id" value="<?php echo $customer_id;?>"></td>
            <tr>


            <tr>
                <td>table id</td>
                <td><input type="text" name="table_id" value="<?php echo $table_id;?>"></td>
            </tr>
                <td><input type="hidden" name="reservation_id" value="<?php echo $reservation_id;?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
