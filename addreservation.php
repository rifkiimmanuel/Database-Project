<?php 


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
    
<nav>
    <label class = "logo">Reservation</label>

    <ul> 
    <li>
        <a class+ "active" href= "index.php">Home </a>
    </li>
    <li>
        <a href= "addreservation.php">Reservation</a>
        </li>
        <li>
        <a href= "reservation_detail.php">Check Your reservation</a>
    </li>
    <li>
        <a href= "indexfood.php">Check Menu</a>
    </li> 
    <li>
        <a href= "indexpayment.php">Daftar Reservation</a>
    </li>
    <li>
        <a href= "">Feedback </a>
    </li>
    </ul>
    </nav>
    
</body>
</html>



<?php 
include_once("config.php");
if(isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // retrieve reservation data from database based on reservation ID
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$customer_id'");
    $row = mysqli_fetch_assoc($result);

    // display reservation details
    echo "this is your customer id, enter this number in column customer id : " . $row['customer_id'] . "<br>";
}

?>
<?php  
// check if form submitted
if (isset($_POST['Submit'])) {
   // $reservation_id = $_POST['reservation_id'];
    $Name_cust = $_POST['Name_cust'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $customer_id = $_POST['customer_id'];
    $table_id = $_POST['table_id'];
    //mengambil data dari add customer


    // check if all required fields are filled
    if (!$Name_cust || !$reservation_date || !$reservation_time || !$number_of_guests || !$customer_id || !$table_id) { 
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Please fill in all required fields ")';  
        echo '</script>';
    } else {
        // check if the customer_id exists in the customer table
        $customer_check = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$customer_id'");
        if (mysqli_num_rows($customer_check) == 0) {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Invalid customer ID, check your customer id ")';  
            echo '</script>';
            exit;
        }
        
        // condition to avoid duplicate reservation
        $q = mysqli_query($conn, "SELECT * FROM reservation WHERE reservation_date ='$reservation_date' AND reservation_time ='$reservation_time' AND table_id ='$table_id'");
        $cek = mysqli_num_rows($q);

        if($cek == 0) {
            $result = mysqli_query($conn, "INSERT INTO reservation (reservation_id, Name_cust, reservation_date, reservation_time, number_of_guests, customer_id, table_id)
            VALUES('NULL','$Name_cust','$reservation_date','$reservation_time', '$number_of_guests', '$customer_id', '$table_id')");
             $new_reservation_id = mysqli_insert_id($conn);
             header('Location: reservation_detail.php?id=' . $new_reservation_id);
            //header('Location: addorderdetail.php');
            exit;
        } else {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("The table is not available at the selected time")';  
            echo '</script>';
        }
    }
}
?>







<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="style.css">
    
    <title>Add reservation </title>
</head>
<body>



    <br></br>
    <form action="addreservation.php" method="post" name="form1">
        <table width="25%" border="0">
           <!-- <tr>
                <td>Reservation ID</td>
                <td><input type="text" name="reservation_id"></td>
            </tr> -->
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
                <td>Table Number</td>
                <td>
                <select name="table_id">
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

                </select>
            </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"  href="indexcustomer.php"></a></td>
            </tr>
            
        </table>
    </form>
</body>
</html>
