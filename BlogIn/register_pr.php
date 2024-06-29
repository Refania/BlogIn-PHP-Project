<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Şifreler eşleşmiyor. Lütfen tekrar deneyin.");
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $mysqli->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    if (!$stmt) {
        die("SQL sorgusu hazırlanamadı: " . $mysqli->error);
    }
    $stmt->bind_param("ss", $email, $password_hash);

    if ($stmt->execute()) {
        echo "Kayıt başarılı. <a href='login.php'>Giriş yapın</a>";
    } else {
        echo "Kayıt sırasında bir hata oluştu: " . $mysqli->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
