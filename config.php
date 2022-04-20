<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "pijarcamp";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
//cek koneksi ke Database
if (!$koneksi) { 
    die("Tidak dapat terkoneksi ke database");
}
?>