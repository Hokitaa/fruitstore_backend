<?php
require 'db.php';
if (isset($_POST['id'])) {
    $stmt = $pdo->prepare("DELETE FROM stok_buah WHERE id = ?");
    $stmt->execute([$_POST['id']]);
}