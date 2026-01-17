<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/History.css')
    <title>Historique</title>
</head>
<body>
    <header>
        <span>ᔕEᖇᐯE</span>  

        <nav>
            <ul>
                <li><a href="home_user.php">Accueil</a></li>
                <li><a href="ressources_user.php">Ressources</a></li>
                <li><a href="suivis.php">Vos reservations</a></li>
                <li><a href="historique.html" class="active">Historique</a></li>
                <li><a href="signaler.php">Support</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>

        <a href="../guest/home_guest.php">Se deconnecter</a>
    </header>

    <main>
        <section class="history">
            <h1>Historique de vos réservations</h1>

            <div class="history-list">
                <!-- Example history item -->
                <div class="history-item">
                    <span class="status completed">Terminée</span>
                    <h3>Serveur physique</h3>
                    <ul>
                        <li>Date de réservation : 10 Janvier 2026</li>
                        <li>Durée : 3 jours</li>
                        <li>CPU : 16 cœurs</li>
                        <li>RAM : 64 Go</li>
                    </ul>
                </div>

                <div class="history-item">
                    <span class="status canceled">Annulée</span>
                    <h3>Machine Virtuelle</h3>
                    <ul>
                        <li>Date de réservation : 5 Janvier 2026</li>
                        <li>Durée : 1 jour</li>
                        <li>CPU : 4 vCPU</li>
                        <li>RAM : 8 Go</li>
                    </ul>
                </div>

                <div class="history-item">
                    <span class="status completed">Terminée</span>
                    <h3>Baie de stockage</h3>
                    <ul>
                        <li>Date de réservation : 28 Décembre 2025</li>
                        <li>Durée : 2 jours</li>
                        <li>Capacité : 1 To</li>
                        <li>Type : HDD</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <footer id="contact">
        <h1>Contact</h1>
        <span>Nos reseaux sociaux</span>
        <ul>
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