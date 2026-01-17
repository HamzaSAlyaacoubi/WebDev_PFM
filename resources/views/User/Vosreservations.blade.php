@vite('resources/css/Vosreservations.css')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos réservations</title>
</head>
<body>

<header>
    <span>ᔕEᖇᐯE</span>

    <nav>
        <ul>
            <li><a href="home_user.php">Accueil</a></li>
            <li><a href="{{ route('dashboard') }}">Ressources</a></li>
            <li><a href="{{ route('vosreservations') }}" class="active">Vos reservations</a></li>
            <li><a href="{{ route('history') }}">Historique</a></li>
            <li><a href="{{ route('support') }}">Support</a></li>
        </ul>
    </nav>

    <a href="../guest/home_guest.php">Se deconnecter</a>
</header>

<main class="dashboard">

    <h1>Vos réservations</h1>

    <!-- STATS -->
    <section class="stats">
        <div class="stat-card">
            <h2>{{ $total }}</h2>
            <p>Réservations totales</p>
        </div>

        <div class="stat-card">
            <h2>{{ $actives }}</h2>
            <p>Actives</p>
        </div>

        <div class="stat-card">
            <h2>{{ $maintenance }}</h2>
            <p>En maintenance</p>
        </div>

        <div class="stat-card danger">
            <h2>{{ $expirees }}</h2>
            <p>Expirées</p>
        </div>
    </section>

    <!-- LIST -->
    <section class="reservations-list">
        @foreach($vosreservations as $reservation)
        <div class="reservation-row">
            <span class="status active">{{ $reservation->status }}</span>
            <div>
                <h3>{{ $reservation->resource->name }}</h3>
                <small>{{ $reservation->start_date }} → {{ $reservation->end_date }}</small>

                <div class="show">
                <ul>
                        <li>Capacité : 1 To</li>
                        <li>Type : HDD</li>
                        <li>Accès : Réseau</li>
                </ul>
            </div>
            </div>

            

            <div class="btn">
                <button type="button"onclick="window.location.href='{{ route('support.reclamer', $reservation->id) }}'">Reclamer</button>
                <button class="details">Details</button>
            </div>
        </div>
        @endforeach

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
    <script src="{{ Vite::asset('resources/js/Vosreservations.js') }}"></script>
</body>
</html>