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
                <li><a href="{{route('dashboard')}}">Ressources</a></li>
                <li><a href="{{route('vosreservations')}}">Vos reservations</a></li>
                <li><a href="{{route('history')}}" class="active">Historique</a></li>
                <li><a href="{{route('support')}}">Support</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>

        <a href="../guest/home_guest.php">Se deconnecter</a>
    </header>

    <main>
        <section class="history">
            <h1>Historique de vos réservations</h1>

            <form method="GET" action="{{ route('history') }}" class="filters">

                <select name="status">
                    <option value="">Tous les statuts</option>
                    <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>
                        Acceptée
                    </option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>
                        Rejetée
                    </option>
                </select>


                <input type="date" name="start_date" value="{{ request('start_date') }}">
                <input type="date" name="end_date" value="{{ request('end_date') }}">

                <button type="submit">Filtrer</button>
            </form>



            <div class="history-list">

                @foreach($history as $item)
                <div class="history-item">
                    <span class="status completed">{{ $item->status }}</span>
                    <h3>{{ $item->resource->name }}</h3>
                    <ul>
                        @if($item->id_category == 1)
                        <li>Date de réservation : {{ $item->reservation_date }}</li>
                        <li>Date de Debut : {{ $item->start_date }}</li>
                        <li>Date de retour : {{ $item->end_date }}</li>
                        <li>Brand: {{ $item->resource->brand }}</li>
                        <li>CPU : {{ $item->resource->cpu }}</li>
                        <li>RAM : {{ $item->resource->ram }}</li>
                        <li>Stockage : {{ $item->resource->storage }}</li>
                        <li>Disque : {{ $item->resource->storage_type }}</li>
                        <li>OS : {{ $item->resource->os }}</li>
                        <li>Location: {{ $item->resource->location }}</li>
                        @elseif($item->id_category == 2)
                        <li>Date de réservation : {{ $item->reservation_date }}</li>
                        <li>Date de Debut : {{ $item->start_date }}</li>
                        <li>Date de retour : {{ $item->end_date }}</li>
                        <li>CPU : {{ $item->resource->cpu }}</li>
                        <li>RAM : {{ $item->resource->ram }}</li>
                        <li>Type : {{ $item->resource->storage }}</li>
                        <li>Disque : {{ $item->resource->storage_type }}</li>
                        <li>Adresse IP : {{ $item->resource->ip_address }}</li>
                        <li>Serveur hote: {{ $item->resource->server_hote }}</li>
                        <li>OS : {{ $item->resource->os }}</li>
                        @elseif($item->id_category == 3)
                        <li>Brand: {{ $item->resource->brand }}</li>
                        <li>Type: {{ $item->resource->type }}</li>
                        <li>Modele: {{ $item->resource->model }}</li>
                        <li>Port: {{ $item->resource->port_number }}</li>
                        <li>Speed: {{ $item->resource->speed }}</li>
                        @elseif($item->id_category == 4)
                        <li>Brand: {{ $item->resource->brand }}</li>
                        <li>Capacity: {{ $item->resource->model }}</li>
                        <li>Type: {{ $item->resource->type }}</li>
                        <li>Speed: {{ $item->resource->speed }}</li>
                        @endif
                    </ul>
                </div>
                @endforeach

                <!-- <div class="history-item">
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
                        <li>Date de réservation : 28 Déce
                            mbre 2025</li>
                        <li>Durée : 2 jours</li>
                        <li>Capacité : 1 To</li>
                        <li>Type : HDD</li>
                    </ul>
                </div> -->
            </div>
        </section>
    </main>

    @include('include.footer')

</body>

</html>