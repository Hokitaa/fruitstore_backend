<?php
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pastikan key yang dikirim Flutter ('nama_buah', 'harga') sesuai
    $nama = $_POST['nama_buah'] ?? '';
    $harga = $_POST['harga'] ?? 0;

    if (!empty($nama)) {
        $stmt = $pdo->prepare("INSERT INTO stok_buah (nama_buah, harga) VALUES (?, ?)");
        $stmt->execute([$nama, $harga]);
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Nama kosong"]);
    }
}
?>