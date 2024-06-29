<?php include 'ustbar.php'; ?>

<div class="container">
    <h1>İletişim</h1>
    
    <h2>Telefon Numaramız</h2>
    <p>+90 000 000 0000</p>
    <br>
    <h2>Harita</h2>
    <div class="map-container">
        <!-- Google Maps iframe -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.788262133221!2d29.06626078466841!3d41.02996667928646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa8b11c621f7f%3A0x1c93e1d67d62b9e4!2sYeditepe+University!5e0!3m2!1sen!2str!4v1627400614316!5m2!1sen!2str"
            width="600"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"></iframe>
    </div>
    <br>
    <h2>Bize Ulaşın</h2>
    <form action="send_message.php" method="POST">
        <label for="name">Adınız:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">E-posta:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="message">Mesajınız:</label>
        <textarea id="message" name="message" rows="5" required></textarea>
        
        <input type="submit" value="Gönder">
    </form>
    
    <br>
    <a href="index.php" class="button">Ana Sayfaya Dön</a>
</div>

</body>
</html>
