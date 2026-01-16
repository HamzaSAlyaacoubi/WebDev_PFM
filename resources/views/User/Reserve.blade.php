@vite('resources/css/Reserve.css')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Data Center - Réservation</title>
</head>
<body>
    <header>
        <span>ᔕEᖇᐯE</span>  

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
    <h1>Demande de réservation</h1>

    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf

        <!-- ID de la ressource caché -->
        <input type="hidden" name="Category_id" value="{{ $resource->id_categorie }}">
        <input type="hidden" name="resource_id" value="{{ $resource->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <fieldset>
            <legend>Ressource</legend>

            <h3>{{ $resource->name }}</h3>

            <ul>
                @if($resource->id_categorie == 1)
                <li>Catégorie : {{ $resource->brand }}</li>
                <li>CPU : {{ $resource->cpu ?? '—' }}</li>
                <li>RAM : {{ $resource->ram ?? '—' }}</li>
                <li>Stockage : {{ $resource->storage ?? '—' }}</li>
                <li>Disque : {{ $resource->storage_type ?? '—' }}</li>
                <li>OS : {{ $resource->os ?? '—' }}</li>
                <li>Location: {{ $resource->location ?? '—' }}</li>
                <li>Quantity Available: {{ $resource->quantity_available ?? '—' }}</li>
                @elseif($resource->id_categorie == 2)
                <li>Name : {{ $resource->name }}</li>
                <li>CPU : {{ $resource->cpu ?? '—' }}</li>
                <li>RAM : {{ $resource->ram ?? '—' }}</li>
                <li>Storage : {{ $resource->storage ?? '—' }}</li>
                <li>Storage Type : {{ $resource->storage_type ?? '—' }}</li>
                <li>OS : {{ $resource->os ?? '—' }}</li>
                <li>IP Address : {{ $resource->ip_address ?? '—' }}</li>
                <li>Server Hote: {{ $resource->server_hote ?? '—' }}</li>
                <li>Quantity Available: {{ $resource->quantity_available ?? '—' }}</li>
                @elseif($resource->id_categorie == 3)
                <li>Brand: {{ $resource->brand ?? '—' }}</li>
                <li>Type: {{ $resource->type ?? '—' }}</li>
                <li>Model: {{ $resource->model ?? '—' }}</li>
                <li>Port: {{ $resource->port_number ?? '—' }}</li>
                <li>Speed: {{ $resource->speed ?? '—' }}</li>
                <li>Quantity Available: {{ $resource->quantity_available ?? '—' }}</li>
                @elseif($resource->id_categorie == 4)
                <li>Brand: {{ $resource->brand ?? '—' }}</li>
                <li>Capacity: {{ $resource->capacity ?? '—' }}</li>
                <li>Type: {{ $resource->type ?? '—' }}</li>
                <li>Speed: {{ $resource->speed ?? '—' }}</li>
                <li>Quantity Available: {{ $resource->quantity_available ?? '—' }}</li>
                @endif
            </ul>
        </fieldset>

        <fieldset>
            <legend>Période de réservation</legend>

            <label>Date de début :</label>
            <input type="date" name="start_date" required>

            <label>Date de fin :</label>
            <input type="date" name="end_date" required>
        </fieldset>

        <fieldset>
            <legend>Justification</legend>

            <textarea name="reason" required></textarea>
        </fieldset>

        <button type="submit">Confirmer</button>
    </form>
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
