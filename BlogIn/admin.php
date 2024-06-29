<?php
session_start();
if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel</h2>
    <form action="add_post.php" method="post">
        Title: <input type="text" name="title" required><br>
        Content: <textarea name="content" required></textarea><br>
        <button type="submit">Add Post</button>
    </form>
</body>
</html>