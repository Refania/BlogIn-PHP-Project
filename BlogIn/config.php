<?php
$host = 'localhost'; // Veritabanı sunucu adresi
$user = 'root';      // Veritabanı kullanıcı adı
$password = 'rootsifre';      // Veritabanı şifresi (boşsa da olabilir)
$database = 'blog';  // Veritabanı adı

$mysqli = new mysqli($host, $user, $password, $database);

// Bağlantıyı kontrol et
if ($mysqli->connect_error) {
    die("Bağlantı hatası: " . $mysqli->connect_error);
}
?>
