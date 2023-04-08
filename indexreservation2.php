<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel ="stylesheet" href="style.css">
 <title>Reservation Restaurant </title>
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

echo "<br> </br>";

?>


<?php

// create database using config file
include_once("config.php");

// fetch all user data from database
$result = mysqli_query($conn, "SELECT * FROM reservation ORDER BY reservation_date ASC");


// Query untuk mencari data
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $query = "SELECT * FROM reservation WHERE Name_cust LIKE '%$cari%'";
} else {
    $query = "SELECT * FROM reservation ORDER BY reservation_date ASC";
}

?>

<!-- Tampilkan form pencarian -->
<form action="" method="get">
    <input type="text" name="cari" placeholder="Cari data...">
    <button type="submit">Cari</button>
</form>

<!-- Tampilkan hasil pencarian -->
<?php
if(isset($_GET['cari'])){
    $result = mysqli_query($conn, $query);
    $jumlah = mysqli_num_rows($result);
    echo "<p>Hasil pencarian untuk keyword '".$_GET['cari']."' : ".$jumlah." data ditemukan</p>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST RESERVATION</title>
</head>

<body>
    <table border="1">
        <tr>
            <!-- <th>Reservation Id</th> -->

            <th>Name Customer </th>

            <th>Reservation Date</th>

            <th>Reservation Time</th>

            <!-- <th>Number Of Guests</th>

            <th>Customer Id</th>

            <th>Table Id</th> -->
         
        </tr>
<?php
        while ($reservation = mysqli_fetch_array($result)) {
            echo "<tr>";
            // echo "<td>" . $reservation['reservation_id'] . "</td>";
            echo "<td>" . $reservation['Name_cust'] . "</td>";
            echo "<td>" . $reservation['reservation_date'] . "</td>";
            echo "<td>" . $reservation['reservation_time'] . "</td>";
            // echo "<td>" . $reservation['number_of_guests'] . "</td>";
            // echo "<td>" . $reservation['customer_id'] . "</td>";
            // echo "<td>" . $reservation['table_id'] . "</td>";
            echo "</tr>";
        }
?>

    </table>
</body>
</html>
