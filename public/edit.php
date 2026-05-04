<?php
require '../config/db.php';

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM entries WHERE id = ?");
$stmt->execute([$id]);
$entry = $stmt->fetch();

if (!$entry) {
    die("Entry not found");
}
?>

<h2>Edit Entry</h2>

<form method="POST" action="../actions/updateEntry.php">
    <input type="hidden" name="id" value="<?= $entry['id'] ?>">

    <input type="text" name="name" value="<?= htmlspecialchars($entry['name']) ?>" required>

    <textarea name="message" required><?= htmlspecialchars($entry['message']) ?></textarea>

    <button type="submit">Update</button>
</form>