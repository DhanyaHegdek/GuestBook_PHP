<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM entries WHERE id = ?");
        $stmt->execute([$id]);
    }
}

header("Location: ../public/index.php");
exit;