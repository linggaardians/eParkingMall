<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eparkingmall";

// Membuat koneksi
$con = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>
