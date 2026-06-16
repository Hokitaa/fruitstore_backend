<?php
// db.php
$host = 'localhost';
$db   = 'fruit_store_db';
$user = 'root'; // Sesuaikan dengan username DB kamu
$pass = '';     // Sesuaikan dengan password DB kamu

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}
?>