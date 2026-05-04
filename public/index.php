<?php require '../config/db.php'; ?>
<?php include '../templates/header.php'; ?>

<form method="POST" action="../actions/addEntry.php">
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
    echo "<small>" . $row['created_at'] . "</small><br>";

    // NEW ACTION BUTTONS
    echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";

    echo "<form method='POST' action='../actions/deleteEntry.php' style='display:inline;'>
            <input type='hidden' name='id' value='" . $row['id'] . "'>
            <button type='submit' onclick=\"return confirm('Delete this entry?')\">Delete</button>
          </form>";

    echo "</div><hr>";
}
?>

<?php include '../templates/footer.php'; ?>