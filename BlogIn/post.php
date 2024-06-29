<?php
session_start();
include 'config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Geçersiz blog ID'si.");
}

$post_id = intval($_GET['id']);

// Veritabanından blog yazısını çekme
$sql = "SELECT posts.title, posts.content, posts.created_at, posts.image_url, users.email 
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
    die("Blog yazısı bulunamadı.");
}

$stmt->close();
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
        <?php if (!empty($row['image_url'])): ?>
            <div class="blog-image">
                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Blog Resmi">
            </div>
        <?php endif; ?>
        <div class="blog-content">
            <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
        </div>
        <p><em>Yazar: <?php echo htmlspecialchars($row['email']); ?></em></p>
    </div>
</body>
</html>
