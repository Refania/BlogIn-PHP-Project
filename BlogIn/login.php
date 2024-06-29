<?php
session_start();
include 'config.php';
include 'ustbar.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL sorgusu hazırlanıyor
    $stmt = $mysqli->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Giriş başarılı
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Geçersiz e-posta veya şifre.";
        }
    } else {
        $error = "Geçersiz e-posta veya şifre.";
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Giriş Yap</h1>
        <form action="login.php" method="post">
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Giriş Yap">
        </form>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>