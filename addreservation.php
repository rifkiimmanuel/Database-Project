<?php
include_once("config.php");

// check if form submitted
if (isset($_POST['Submit'])) {
    $reservation_id = $_POST['reservation_id'];
    $Name_cust = $_POST['Name_cust'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $customer_id = $_POST['customer_id'];
    $table_id = $_POST['table_id'];

    // check if all required fields are filled
    if (!$Name_cust || !$reservation_date || !$reservation_time || !$number_of_guests || !$customer_id || !$table_id) {
        echo "Please fill in all required fields.";  
    } else {
        //condition to avoid duplicate reservation
        $q = mysqli_query($conn, "SELECT * FROM reservation WHERE reservation_date ='$reservation_date' AND reservation_time ='$reservation_time' AND table_id ='$table_id'");
        $cek = mysqli_num_rows($q);

        if($cek == 0) {
            $result = mysqli_query($conn, "INSERT INTO reservation (reservation_id, Name_cust, reservation_date, reservation_time, number_of_guests, customer_id, table_id)
            VALUES('NULL','$Name_cust','$reservation_date','$reservation_time', '$number_of_guests', '$customer_id', '$table_id')");
            echo "Reservation added successfully.";
            header('Location: addorderdetail.php');

        } else {
            echo '<script type ="text/JavaScript">';  
       echo 'alert("The table is not available at the selected time")';  
       echo '</script>';
            // echo "The table is not available at the selected time.";
        }
    }
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
            <td>
                <select name="reservation_time">
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                </select>
            </td>
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
                <td>Table id</td>
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
