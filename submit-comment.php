<?php
// Ambil data dari form
$author = $_POST['author'];
$comment = $_POST['comment'];
$attendance = $_POST['attendance'];

// Validasi input
if (!empty($author) && !empty($comment) && !empty($attendance)) {
    // Koneksi ke database (MySQL sebagai contoh)
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Masukkan data ke database
    $stmt = $conn->prepare("INSERT INTO comments (author, comment, attendance) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $author, $comment, $attendance);

    if ($stmt->execute()) {
        echo "Komentar berhasil dikirim!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Semua field harus diisi!";
}
?>
