<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Blog Ekle - BlogIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'ustbar.php'; ?>
    
    <div class="container">
        <h1>Yeni Blog Ekle</h1>
        
        <form action="add_post_pr.php" method="POST">
            <label for="title">Başlık:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="content">İçerik:</label>
            <textarea id="content" name="content" rows="5" required></textarea>
            
            <input type="submit" value="Blog Ekle">
        </form>
    </div>
</body>
</html>
