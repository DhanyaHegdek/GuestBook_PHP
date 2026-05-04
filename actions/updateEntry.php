<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);

    if ($id && $name && $message) {
        $stmt = $pdo->prepare("UPDATE entries SET name = ?, message = ? WHERE id = ?");
        $stmt->execute([$name, $message, $id]);
    }
}

header("Location: ../public/index.php");
exit;