<?php
header("Content-Type: application/json"); // Wajib ada ini
require 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM stok_buah");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data); // JSON murni
} catch (Exception $e) {
    echo json_encode([]); // Jika error, kirim array kosong agar aplikasi tidak crash
}
?>