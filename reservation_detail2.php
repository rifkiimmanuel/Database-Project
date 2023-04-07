<?php
include_once("config.php");

// // get ID from URL parameter
// $reservation_id = $_GET['id'];

// // retrieve reservation data from database based on reservation ID
// $result = mysqli_query($conn, "SELECT * FROM reservation WHERE reservation_id = '$reservation_id'");
// $row = mysqli_fetch_assoc($result);

// // display reservation details
// echo "Reservation ID: " . $row['reservation_id'] . "<br>";
// echo "Name: " . $row['Name_cust'] . "<br>";
// echo "Date: " . $row['reservation_date'] . "<br>";
// echo "Time: " . $row['reservation_time'] . "<br>";
// echo "Number of guests: " . $row['number_of_guests'] . "<br>";
// echo "Table number: " . $row['table_id'] . "<br>";

// include_once("config.php");

// // check if ID parameter is set
// if(isset($_GET['id'])){
//     // get ID from URL parameter
//     $reservation_id = $_GET['id'];

//     // retrieve reservation data from database based on reservation ID
//     $result = mysqli_query($conn, "SELECT * FROM reservation WHERE reservation_id = '$reservation_id'");
//     $row = mysqli_fetch_assoc($result);

//     // display reservation details
//     echo "Reservation ID: " . $row['reservation_id'] . "<br>";
//     echo "Name: " . $row['Name_cust'] . "<br>";
//     echo "Date: " . $row['reservation_date'] . "<br>";
//     echo "Time: " . $row['reservation_time'] . "<br>";
//     echo "Number of guests: " . $row['number_of_guests'] . "<br>";
//     echo "Table number: " . $row['table_id'] . "<br>";
// } else {
//     // display error message if ID parameter is not set
//     echo "ID parameter not set.";
// }


?>





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
        <a href= "reservation_detail.php">Check Your reservation</a>
    </li>
    <li>
        <a href= "indexfood.php">Check Menu</a>
    </li> 
    <li>
        <a href= "indexreservation.php">Daftar Reservation</a>
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

if (isset($_POST['submit'])) {
  // get ID from form input
  $reservation_id = $_POST['reservation_id'];

  // retrieve reservation data from database based on reservation ID
  $result = mysqli_query($conn, "SELECT * FROM reservation WHERE reservation_id = '$reservation_id'");
  $row = mysqli_fetch_assoc($result);

  if (!$row) {
    echo "Reservation not found.";
  } else {
    // display reservation details
    echo "Reservation ID: " . $row['reservation_id'] . "<br>";
    echo "Name: " . $row['Name_cust'] . "<br>";
    echo "Date: " . $row['reservation_date'] . "<br>";
    echo "Time: " . $row['reservation_time'] . "<br>";
    echo "Number of guests: " . $row['number_of_guests'] . "<br>";
    echo "Table number: " . $row['table_id'] . "<br>";

    // check if 'reservation_status' key exists in $row array
    if (isset($row['reservation_status'])) {
      echo "Status: " . $row['reservation_status'] . "<br>";
    } else {
     
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Detail</title>
</head>
<body>
  <h1>Reservation Detail</h1>
  <form method="post">
    <label for="reservation_id">Reservation ID:</label>
    <input type="text" name="reservation_id" id="reservation_id">
    <input type="submit" name="submit" value="Check Status">
  </form>
</body>
</html>