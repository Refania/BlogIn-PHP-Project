<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kullanıcıyı veritabanında bul
    $stmt = $mysqli->prepare("SELECT id, password FROM users WHERE email = ?");
    if (!$stmt) {
        die("SQL sorgusu hazırlanamadı: " . $mysqli->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Şifreyi kontrol et
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            header("Location: index.php"); // Burada yönlendirme yapılır
            exit();
        } else {
            echo "Geçersiz e-posta veya şifre.";
        }
    } else {
        echo "Geçersiz e-posta veya şifre.";
    }

    $stmt->close();
}

$mysqli->close();
?>