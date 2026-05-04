<?php require '../config/db.php'; ?>
<?php include '../templates/header.php'; ?>

<form method="POST" action="../actions/add_entry.php">
    <input type="text" name="name" placeholder="Your name" required>
    <textarea name="message" placeholder="Your message" required></textarea>
    <button type="submit">Post</button>
</form>

<hr>

<h2>Messages</h2>

<?php
$stmt = $pdo->query("SELECT * FROM entries ORDER BY created_at DESC");

foreach ($stmt as $row) {
    echo "<div class='entry'>";
    echo "<strong>" . htmlspecialchars($row['name']) . "</strong>";
    echo "<p>" . nl2br(htmlspecialchars($row['message'])) . "</p>";
    echo "<small>" . $row['created_at'] . "</small>";
    echo "</div><hr>";
}
?>

<?php include '../templates/footer.php'; ?>