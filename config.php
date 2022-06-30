<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_portfolio";

$mysqli = new mysqli($hostname, $username, $password, $dbname);

// cek koneksi 

if (!$mysqli) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
