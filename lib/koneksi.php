<?php
$host = "localhost";
$username = "root";
$password = "albira12345";
$dbname = "rumahsakit";


try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "koneksi berhasil!";
} catch (PDOexception $e) {
    echo "koneksi gagal: " . $e->getMessage();
}
?>