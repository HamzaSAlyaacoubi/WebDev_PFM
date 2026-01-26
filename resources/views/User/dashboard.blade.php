<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Center</title>
    @vite('resources/css/dashboard.css')
    @vite('resources/js/dashboard.js')
</head>

<body>
    <header>
        <span>ᔕEᖇᐯE</span>

        <nav>
            <ul>
                <li><a href="">Ressources</a></li>
                <li><a href="{{ route('vosreservations') }}">Vos reservations</a></li>
                <li><a href="{{ route('history') }}">Historique</a></li>
                <li><a href="{{ route('support') }}">Support</a></li>
                <li><a href=#contact>Contact</a></li>
            </ul>
        </nav>

        <a href="{{route('logout')}}">Se deconnecter</a>
    </header>

    <body>

        <main class="resources">
            <h1>Nos ressources</h1>
            <form method="GET" action="{{ route('dashboard') }}">

                <input type="text" placeholder="Search" name="search" value="{{ request('search') }}">
                <!-- Filtre par type -->
                <select name="filter">
                    <option value="all">All Categories</option>

                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('filter') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach

                </select>

                <select name="brand">
                    <option value="all">All brands</option>

                    @foreach($brands as $brand)
                    <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                        {{ $brand }}
                    </option>
                    @endforeach
                </select>

                <button type="submit">Chercher</button>
            </form>

            <div class="resources-container">
                <!-- juste example je pense l'ajout d'autres ressources peut etre fait par laravel avec la base de données -->
                @foreach($ressources as $ressource)
                <div class="resource-infos">
                    <h3>{{ $ressource->name }}</h3>
                    <ul class="infos-list">
                        @if($ressource->id_category == 1)
                        <li>Brand : {{ $ressource->brand }}</li>
                        <li>CPU : {{ $ressource->cpu }} cœurs</li>
                        <li>RAM : {{ $ressource->ram }} Go</li>
                        <li>Stockage : {{ $ressource->storage }} To</li>
                        <li>Type stockage : {{ $ressource->storage_type }}</li>
                        <li>OS : {{ $ressource->os }}</li>
                        <li>Localisation : {{ $ressource->location }}</li>
                        <li>Quantité disponible : {{ $ressource->quantity_available }}</li>
                        @endif

                        @if($ressource->id_category == 2)
                        <li>CPU : {{ $ressource->cpu }} vCPU</li>
                        <li>RAM : {{ $ressource->ram }} Go</li>
                        <li>Stockage : {{ $ressource->storage }} Go</li>
                        <li>Type stockage : {{ $ressource->storage_type }}</li>
                        <li>OS : {{ $ressource->os }}</li>
                        <li>IP : {{ $ressource->ip_address }}</li>
                        <li>Serveur hôte : {{ $ressource->server_hote }}</li>
                        <li>Quantité disponible : {{ $ressource->quantity_available }}</li>
                        @endif

                        @if($ressource->id_category == 3)
                        <li>Marque : {{ $ressource->brand }}</li>
                        <li>Type : {{ $ressource->type }}</li>
                        <li>Modèle : {{ $ressource->model }}</li>
                        <li>Ports : {{ $ressource->port_number }}</li>
                        <li>Vitesse : {{ $ressource->speed }}</li>
                        <li>Quantité disponible : {{ $ressource->quantity_available }}</li>
                        @endif

                        @if($ressource->id_category == 4)
                        <li>Marque : {{ $ressource->brand }}</li>
                        <li>Capacité : {{ $ressource->capacity }} To</li>
                        <li>Type : {{ $ressource->type }}</li>
                        <li>Vitesse : {{ $ressource->speed }}</li>
                        <li>Quantité disponible : {{ $ressource->quantity_available }}</li>
                        @endif
                    </ul>
                    <a href="{{ route('reservation.create', ['id_category' => $ressource->id_category, 'id' => $ressource->id ]) }}" class="reserve-btn">Réserver</a> <!-- disabled car indisponible-->
                </div>
                @endforeach
            </div>
        </main>

        @include('include.footer')

    </body>

</html>