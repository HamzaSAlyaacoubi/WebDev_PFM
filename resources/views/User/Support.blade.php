<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/Report.css')
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
            <form method="POST" action="{{ route('reclamations.store') }}">
            @csrf
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            <h1>Reclamation</h1>
            <p>Veuillez signaler un problème et le decrire.</p>
            <h3>{{ $reservation->resource->name }}</h3>
            <label for="probleme">Problème rencontré: </label>
            <input type="text" placeholder="Probleme rencontree" id="probleme" name="Problem_type"><br><br>
            <label for="area">Description:</label><br>
            <textarea name="description" id="area" placeholder="Veuillez Decrire votre probleme"></textarea>

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