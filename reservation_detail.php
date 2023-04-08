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
        <a class+ "active" href= "">Home </a>
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
include_once("config.php");

// check if ID parameter is set
if(isset($_GET['id'])){
    // get ID from URL parameter
    $reservation_id = $_GET['id'];

    // retrieve reservation data from database based on reservation ID
    $result = mysqli_query($conn, "SELECT * FROM reservation WHERE reservation_id = '{$reservation_id}'");
    $row = mysqli_fetch_assoc($result);

    // display reservation details if row is not null
    if ($row) {
     echo "This is your reservation detail : " . "<br>";
     echo "Reservation ID: " . $row['reservation_id'] . "<br>";
     echo "Name: " . $row['Name_cust'] . "<br>";
     echo "Date: " . $row['reservation_date'] . "<br>";
     echo "Time: " . $row['reservation_time'] . "<br>";
     echo "Number of guests: " . $row['number_of_guests'] . "<br>";
     echo "Table number: " . $row['table_id'] . "<br>";
    } else {
        echo "No reservation found with ID {$reservation_id}.";
    }
} else {
    // display error message if ID parameter is not set
    echo "ID parameter not set.";
}
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

<a href= addorderdetail.php> click next to next reservation step</a>

 
</body>
</html>
