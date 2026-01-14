<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Center</title>
</head>
<body>
    <header>
        <img src="" alt="Logo">

        <nav>
            <ul>
                <li><a href="home_user.php">Accueil</a></li>
                <li><a href="ressources_user.php">Ressources</a></li>
                <li><a href="suivis.php">Vos reservations</a></li>
                <li><a href="history.php">Historique</a></li>
                <li><a href="signaler.php">Support</a></li>
                <li><a href=#contact>Contact</a></li>
            </ul>
        </nav>

        <a href="../guest/home_guest.php">Se deconnecter</a>
    </header>

    <main>
        <section>

            <h1>Support & Avis</h1>
            <p>Votre avis nous aide à améliorer la plateforme.</p>

            <form method="POST">

                <div>
                    <label>Votre message / réclamation</label>
                    <textarea name="message" rows="5" cols="200" placeholder="N'hésitez pas à décrire votre problème ou suggestion..." required></textarea>
                </div>

                <!-- optionel -->
                <div>
                    <label>Notez le service</label>

                    <div class="rating">
                        <input type="radio" name="rating" id="star5" value="5">
                        <label for="star5">★</label>

                        <input type="radio" name="rating" id="star4" value="4">
                        <label for="star4">★</label>

                        <input type="radio" name="rating" id="star3" value="3">
                        <label for="star3">★</label>

                        <input type="radio" name="rating" id="star2" value="2">
                        <label for="star2">★</label>

                        <input type="radio" name="rating" id="star1" value="1">
                        <label for="star1">★</label>
                    </div>
                </div>

                <button type="submit">Envoyer</button>
            </form>

        </section>
    </main>

    <footer id="contact">
        <h1>Contact</h1>

        <span>Nos reseaux sociaux</span>
        <ul>
            <!-- deplacer les images au dossier public et utiliser asset() -->
            <li><a href="https://www.instagram.com"><img src="../images/instagram.jpeg" alt="Logo Instagram" width="50" height="50"></a></li>
            <li><a href="https://www.facebook.com"><img src="../images/facebook.jpeg" alt="Logo Facebook" width="50" height="50"></a></li>
            <li><a href="https://www.tiktok.com"><img src="../images/tikTok.jpeg" alt="Logo TikTok" width="50" height="50"></a></li>
            <li><a href="tel:+212660750696"><img src="../images/whatsApp.jpeg" alt="Logo WhatsApp" width="50" height="50"></a></li>
        </ul>

        <p><a href="mailto:contact@datacenter.ma">contact@datacenter.ma</a></p>

        <p>&copy; 2026 Data Center. Tous droits réservés.</p>

    </footer>
    
</body>
</html>