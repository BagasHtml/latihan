<?php 
$local = "localhost";
$username = "root";
$password = "";
$db = "belajarUkom";

$sql = new mysqli($local, $username, $password, $db);

if ($sql->connect_error) {
    die("KONEKSI ERROR");
    exit();
}
?>