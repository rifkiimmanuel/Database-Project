<?php

//koneksi ke database
include_once("config.php");


$conn = mysqli_connect($servername, $username, $password, $dbname);

//cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

//query untuk mengambil data reservasi dari database
$sql = "SELECT reservation.reservation_id, reservation.reservation_date, reservation.reservation_time, reservation.number_of_guests, customer.name, table_restaurant.table_number, table_restaurant.table_capacity 
        FROM reservation
        INNER JOIN customer ON reservation.customer_id = customer.customer_id
        INNER JOIN table_restaurant ON reservation.table_id = table_restaurant.table_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "Reservation ID: " . $row["reservation_id"].
     " - Reservation Date: " . $row["reservation_date"]. 
     " - Reservation Time: " . $row["reservation_time"]. " - Number of Guests: " . $row["number_of_guests"]. " - Customer Name: " . $row["name"]. " - Table Number: " . $row["table_number"]. " - Table Capacity: " . $row["table_capacity"]. "<br>";
  }
} else {
  echo "Tidak ada data reservasi";
}

mysqli_close($conn);
?>
