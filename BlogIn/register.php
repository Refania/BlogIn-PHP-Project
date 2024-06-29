<?php include 'ustbar.php'; ?>

<div class="container">
    <h1>Kayıt Ol</h1>
    <form action="register_pr.php" method="POST" class="register-form" onsubmit="return validateForm()">
        <label for="email">E-posta:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required> <br>
        <br>
        <label for="confirm_password">Şifreyi Onaylayın:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        <br>
        <input type="submit" value="Kayıt Ol" class="register-btn">
    </form>
    
    <br>
    <a href="index.php" class="button">Ana Sayfaya Dön</a>
</div>

<script>
function validateForm() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        alert('Şifreler eşleşmiyor. Lütfen tekrar deneyin.');
        return false;
    }
    return true;
}
</script>

</body>
</html>
