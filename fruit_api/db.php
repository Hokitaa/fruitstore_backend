<?php
$host = 'localhost';
$db   = 'fruit_store_db';
$user = 'root';
$pass = '';

try {
    // Menambahkan charset=utf8mb4 agar koneksi lebih stabil
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Koneksi berhasil!"; // Hapus atau komentar ini setelah test
} catch (PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}
?>