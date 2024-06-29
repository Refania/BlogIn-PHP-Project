<?php
session_start();
include 'config.php';

// Form verilerini al
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
$author_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

// Verilerin doğruluğunu kontrol et
if (empty($title) || empty($content) || $author_id == 0) {
    echo "Başlık, içerik ve kullanıcı ID'si gereklidir.";
    exit;
}

// SQL sorgusunu hazırla
$sql = "INSERT INTO posts (title, content, author_id) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ssi', $title, $content, $author_id);

if ($stmt->execute()) {
    // Başarıyla eklendikten sonra ana sayfaya yönlendir
    header('Location: index.php');
    exit;
} else {
    echo "Blog yazısı eklenirken bir hata oluştu: " . $mysqli->error;
}

$stmt->close();
$mysqli->close();
?>
