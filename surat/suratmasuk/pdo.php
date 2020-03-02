<?php
//koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "pkl"; //nama database

$pdo = new PDO('mysql:host='.$server.';dbname='.$database, $username, $password);
//akhir koneksi---------------
?>