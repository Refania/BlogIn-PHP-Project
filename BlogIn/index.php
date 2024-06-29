<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>BlogIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'ustbar.php'; ?>
    
    <div class="container">
        <h1>Hoş Geldiniz!
            <?php if (isset($_SESSION['username'])): ?>
                <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <?php endif; ?>
        </h1>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="right-align">
                <p><a href="add_post.php" class="new-blog-button">Yeni Blog Ekle</a></p>
            </div>
        <?php endif; ?>
        
        <h2>İşte Son Paylaşılan Yazılar</h2>
        <?php
        $sql = "SELECT posts.id, posts.title, posts.created_at, posts.image_url, users.email 
                FROM posts 
                LEFT JOIN users ON posts.author_id = users.id 
                ORDER BY posts.created_at DESC";
        $result = $mysqli->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='blog-post'>";
                echo "<h3><a href='view_post.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</a></h3>";
                echo "<p><em>Yazar: " . htmlspecialchars($row['email']) . "</em></p>";
                
                if (!empty($row['image_url'])) {
                    echo "<div class='blog-image'><img src='" . htmlspecialchars($row['image_url']) . "' alt='Blog Görseli'></div>";
                }
                
                echo "<p><small>Tarih: " . htmlspecialchars($row['created_at']) . "</small></p>";
                echo "</div>";
            }
        } else {
            echo "<p>Henüz blog gönderisi yok.</p>";
        }
        
        $mysqli->close();
        ?>
    </div>
</body>
</html>
