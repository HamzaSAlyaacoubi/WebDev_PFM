<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/GuestCategories.css')
    <title>Data Center</title>
</head>
<body>

<header>
    <span>ᔕEᖇᐯE</span>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
<section class="resources">
    <h1>All resources</h1>

    <div class="resources-list">

        @foreach($ressources as $ressource)

        <div class="resource-card">

            {{-- TITRE --}}
            <h3>{{ $ressource->name }}</h3>

            <ul>
                {{-- ===== CATÉGORIE 1 : SERVEURS ===== --}}
                @if($ressource->id_categorie == 1)
                    <li>Brand : {{ $ressource->brand }}</li>
                    <li>CPU : {{ $ressource->cpu }}</li>
                    <li>RAM : {{ $ressource->ram }}</li>
                    <li>Storage : {{ $ressource->storage }} ({{ $ressource->storage_type }})</li>
                    <li>OS : {{ $ressource->os }}</li>
                    <li>Location : {{ $ressource->location }}</li>

                {{-- ===== CATÉGORIE 2 : VM ===== --}}
                @elseif($ressource->id_categorie == 2)
                    <li>CPU : {{ $ressource->cpu }}</li>
                    <li>RAM : {{ $ressource->ram }}</li>
                    <li>Storage : {{ $ressource->storage }} ({{ $ressource->storage_type }})</li>
                    <li>OS : {{ $ressource->os }}</li>
                    <li>IP : {{ $ressource->ip_address }}</li>
                    <li>Serveur hôte : {{ $ressource->server_hote }}</li>

                {{-- ===== CATÉGORIE 3 : SWITCH ===== --}}
                @elseif($ressource->id_categorie == 3)
                    <li>Brand : {{ $ressource->brand }}</li>
                    <li>Type : {{ $ressource->type }}</li>
                    <li>Model : {{ $ressource->model }}</li>
                    <li>Ports : {{ $ressource->port_number }}</li>
                    <li>Speed : {{ $ressource->speed }}</li>

                {{-- ===== CATÉGORIE 4 : STORAGE ===== --}}
                @elseif($ressource->id_categorie == 4)
                    <li>Brand : {{ $ressource->brand }}</li>
                    <li>Capacity : {{ $ressource->capacity }}</li>
                    <li>Type : {{ $ressource->type }}</li>
                    <li>Speed : {{ $ressource->speed }}</li>
                @endif

                <li>Status : {{ $ressource->status }}</li>
                <li>Available : {{ $ressource->quantity_available }}</li>
            </ul>

            {{-- BOUTON --}}
            <a href="{{ route('login') }}">Réserver</a>

        </div>

        @endforeach

    </div>
</section>

{{-- RÈGLES --}}
<div>
<h2>Règles d’utilisation</h2>

<details>
    <summary><strong>Accès aux ressources</strong></summary>
    <ul>
        <li>Les invités peuvent consulter les ressources en lecture seule.</li>
        <li>Un compte est obligatoire pour effectuer une réservation.</li>
    </ul>
</details>

<details>
    <summary><strong>Conditions d’utilisation</strong></summary>
    <ul>
        <li>Usage pédagogique et de recherche uniquement.</li>
        <li>Toute utilisation abusive est interdite.</li>
    </ul>
</details>

<details>
    <summary><strong>Sécurité et responsabilité</strong></summary>
    <ul>
        <li>Sauvegarde à la charge de l’utilisateur.</li>
        <li>Le Data Center n’est pas responsable des pertes.</li>
    </ul>
</details>
</div>

</main>

<footer id="contact">
    <h1>Contact</h1>

    <span>Nos réseaux sociaux</span>
    <ul>
        <li><a href="https://www.instagram.com"><img src="{{ asset('images/instagram.jpeg') }}" width="50"></a></li>
        <li><a href="https://www.facebook.com"><img src="{{ asset('images/facebook.jpeg') }}" width="50"></a></li>
        <li><a href="https://www.tiktok.com"><img src="{{ asset('images/tikTok.jpeg') }}" width="50"></a></li>
        <li><a href="tel:+212660750696"><img src="{{ asset('images/whatsApp.jpeg') }}" width="50"></a></li>
    </ul>

    <p><a href="mailto:contact@datacenter.ma">contact@datacenter.ma</a></p>
    <p>&copy; 2026 Data Center. Tous droits réservés.</p>
</footer>

</body>
</html>
