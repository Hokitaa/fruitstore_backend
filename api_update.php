<?php
require 'db.php';
if (isset($_POST['id'])) {
    $stmt = $pdo->prepare("UPDATE stok_buah SET nama_buah = ?, harga = ? WHERE id = ?");
    $stmt->execute([$_POST['nama_buah'], $_POST['harga'], $_POST['id']]);
    echo json_encode(["status" => "success"]);
}