<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $message = trim($_POST['message']);

    if ($name && $message) {
        $stmt = $pdo->prepare("INSERT INTO entries (name, message) VALUES (?, ?)");
        $stmt->execute([$name, $message]);
    }
}

header("Location: ../public/index.php");
exit;