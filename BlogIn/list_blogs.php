<?php
include 'config.php'; // Veritabanı bağlantısını içe aktar

// Blog başlıklarını ve bilgilerini çekmek için sorgu
$sql = "SELECT posts.id, posts.title, posts.created_at, users.email 
        FROM posts 
        LEFT JOIN users ON posts.author_id = users.id 
        ORDER BY posts.created_at DESC";
$result = $mysqli->query($sql);

// Başlıkları, tarihleri ve yazarları listeleme
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='blog-item'>";
        echo "<h2><a href='view_post.php?id=" . $row["id"] . "'>" . htmlspecialchars($row["title"]) . "</a></h2>";
        echo "<p><strong>Tarih:</strong> " . htmlspecialchars($row["created_at"]) . "</p>";
        echo "<p><em>Yazar: " . htmlspecialchars($row["email"]) . "</em></p>";
        echo "</div>";
    }
} else {
    echo "<p>Hiç blog gönderisi bulunamadı.</p>";
}

$mysqli->close();
?>
