<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/Message.css')
    <title>Data Center</title>
</head>
<body>
    <header>
        <img src="" alt="Logo">

        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li><a href="{{ route('dashboard') }}">Ressources</a></li>
                <li><a href="{{ route('vosreservations') }}">Vos reservations</a></li>
                <li><a href="{{ route('history') }}">Historique</a></li>
                <li><a href="{{ route('support') }}">Support</a></li>
                <li><a href=#contact>Contact</a></li>
            </ul>
        </nav>

        <a href="../guest/home_guest.php">Se deconnecter</a>
    </header>

    <main>
        
        <section>
            <form method="POST" action="{{ route('support.message.store') }}">
                @csrf
            <h1>Support & Avis</h1>
            <p>Votre avis nous aide à améliorer la plateforme.</p>


                <div>
                    <label>Votre message / réclamation</label>
                    <textarea name="message" rows="5" cols="200" placeholder="N'hésitez pas à décrire votre problème ou suggestion..." required></textarea>
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