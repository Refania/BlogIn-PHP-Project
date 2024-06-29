<?php
session_start();
include 'config.php'; // Veritabanı bağlantısını içe aktar

// Blog ID'sini al
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($post_id > 0) {
    // Blog gönderisini veritabanından al
    $sql = "SELECT posts.title, posts.content, posts.created_at, users.email 
            FROM posts 
            LEFT JOIN users ON posts.author_id = users.id 
            WHERE posts.id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>Blog gönderisi bulunamadı.</p>";
        exit;
    }
} else {
    echo "<p>Geçersiz blog ID'si.</p>";
    exit;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['title']); ?> - BlogIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'ustbar.php'; ?>
    
    <div class="container">
        <h1><?php echo htmlspecialchars($row['title']); ?></h1>
        <p><strong>Tarih:</strong> <?php echo htmlspecialchars($row['created_at']); ?></p>
        <p><em>Yazar: <?php echo htmlspecialchars($row['email']); ?></em></p>
        
        <div class="blog-content">
            <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
        </div>
    </div>
</body>
</html>
