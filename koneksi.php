<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "user"; 
$koneksi = mysqli_connect($server, $username, $password, $db);
//pastikan pengurutan variable sama

//untuk cek jika koneksi gagal ke database
if(mysqli_connect_errno()){
    echo "Koneksi gagal : ".mysqli_connect_error();
}