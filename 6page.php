<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Contact - Nissan Hub</title>
    <link rel="stylesheet" href="css/6page.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="background">
        <img src="image/dealer1.jpg" alt="Background">
    </div>

    <header>
        <h1>Nissan Hub</h1>
        <nav>
            <ul>
                <li><a href="index.php">Acasă</a></li>
                <li><a href="2page.php">Despre</a></li>
                <li><a href="3page.php">Modele</a></li>
                <li><a href="4page.php">Servicii</a></li>
                <li><a href="5page.php">Galerie</a></li>
                <li><a href="6page.php" class="active">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Contactează-ne</h2>
        <form id="contactForm" class="contact-form">
    <input type="text" name="name" placeholder="Numele tău" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="message" placeholder="Mesajul tău" rows="6" required></textarea>
    <button type="submit">Trimite Mesaj</button>
</form>

        <!-- Mesajul de succes/eroare -->
        <div id="messageBox" style="display:none;"></div>

        <div class="contact-info">
            <h3>Informații de Contact:</h3>
            <p><strong>Adresă:</strong> Str. Nissan, nr. 123, Chisinau</p>
            <p><strong>Telefon:</strong> +373 69 999 999</p>
            <p><strong>Email:</strong> contact@nissanhub.md</p>
        </div>
    </main>
    <script src="js/contact.js"></script>
</body>
</html>
