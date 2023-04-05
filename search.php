<?php
// Koneksi ke database
include_once("config.php");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mencari data
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $query = "SELECT * FROM customer WHERE name LIKE '%$cari%'";
} else {
    $query = "SELECT * FROM customer";
}

// Eksekusi query
$result = mysqli_query($conn, $query);

?>

<!-- Tampilkan form pencarian -->
<form action="" method="get">
    <input type="text" name="cari" placeholder="Cari data...">
    <button type="submit">Cari</button>
</form>

<!-- Tampilkan hasil pencarian -->
<?php
if(isset($_GET['cari'])){
    $jumlah = mysqli_num_rows($result);
    echo "<p>Hasil pencarian untuk keyword '".$_GET['cari']."' : ".$jumlah." data ditemukan</p>";
}
?>

<!-- Tampilkan data dari database -->
<table border ="1" >
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while($customer = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$customer['name']."</td>";
            echo "<td>".$customer['email']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Tutup koneksi database
mysqli_close($conn);
?>
