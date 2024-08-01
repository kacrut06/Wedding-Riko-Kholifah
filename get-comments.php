<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil komentar dari database
$result = $conn->query("SELECT author, comment, attendance FROM comments ORDER BY id DESC");

// Tampilkan komentar
while ($row = $result->fetch_assoc()) {
    echo "<div class='comment'>";
    echo "<p><strong>" . htmlspecialchars($row['author']) . "</strong> (" . htmlspecialchars($row['attendance']) . ")</p>";
    echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
    echo "</div>";
}

$result->close();
$conn->close();
?>
