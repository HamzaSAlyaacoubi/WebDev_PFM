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
                <li><a href="{{ route('dashboard') }}">Ressources</a></li>
                <li><a href="{{ route('vosreservations') }}" class="active">Vos reservations</a></li>
                <li><a href="{{ route('history') }}">Historique</a></li>
                <li><a href="{{ route('support') }}">Support</a></li>
            </ul>
        </nav>

        <a href="{{route('logout')}}">Se deconnecter</a>
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

            <div class="stat-card danger">
                <h2>{{ $expirees }}</h2>
                <p>Expirées</p>
            </div>
        </section>
        <!-- LIST -->
        <section class="reservations-list">
            <h1>Demande de reservation</h1>
            @foreach($vosreservations as $reservation)
            <div class="reservation-row">
                <span class="status active">{{ $reservation->status }}</span>
                <div>
                    <h3>{{ $reservation->resource->name }}</h3>
                    <small>{{ $reservation->start_date }} → {{ $reservation->end_date }}</small>

                    <div class="show">
                        <ul>

                            @if($reservation->id_category == 1)
                            <li>Brand: {{ $reservation->resource->name }}</li>
                            <li>CPU : {{ $reservation->resource->cpu }}</li>
                            <li>RAM : {{ $reservation->resource->ram }}</li>
                            <li>Stockage : {{ $reservation->resource->storage }}</li>
                            <li>Disque : {{ $reservation->resource->storage_type }}</li>
                            <li>OS : {{ $reservation->resource->os }}</li>
                            <li>Location: {{ $reservation->resource->location }}</li>
                            @elseif($reservation->id_category == 2)
                            <li>Brand: {{ $reservation->resource->brand }}</li>
                            <li>CPU : {{ $reservation->resource->cpu }}</li>
                            <li>RAM : {{ $reservation->resource->ram }}</li>
                            <li>Type : {{ $reservation->resource->storage }}</li>
                            <li>Disque : {{ $reservation->resource->storage_type }}</li>
                            <li>Adresse IP : {{ $reservation->resource->ip_address }}</li>
                            <li>Serveur hote: {{ $reservation->resource->server_hote }}</li>
                            <li>OS : {{ $reservation->resource->os }}</li>
                            @elseif($reservation->id_category == 3)
                            <li>Brand: {{ $reservation->resource->brand }}</li>
                            <li>Type: {{ $reservation->resource->type }}</li>
                            <li>Modele: {{ $reservation->resource->model }}</li>
                            <li>Port: {{ $reservation->resource->port_number }}</li>
                            <li>Speed: {{ $reservation->resource->speed }}</li>
                            @elseif($reservation->id_category == 4)
                            <li>Brand: {{ $reservation->resource->brand }}</li>
                            <li>Capacity: {{ $reservation->resource->capacity }}</li>
                            <li>Type: {{ $reservation->resource->type }}</li>
                            <li>Speed: {{ $reservation->resource->speed }}</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="btn">
                    <button class="details">Details</button>
                </div>
            </div>
            @endforeach

        </section>
        <br><br>
        <section class="reservations-list">
            <h1>Reservation accepté</h1>
            @foreach($histories as $history)
            @if($history->status == "accepted")
            <div class="reservation-row">
                <span class="status active">{{ $history->status }}</span>
                <div>
                    <h3>{{ $history->resource->name }}</h3>
                    <small>{{ $history->start_date }} → {{ $history->end_date }}</small>

                    <div class="show">
                        <ul>
                            @if($history->id_category == 1)
                            <li>Brand: {{ $history->resource->name }}</li>
                            <li>CPU : {{ $history->resource->cpu }}</li>
                            <li>RAM : {{ $history->resource->ram }}</li>
                            <li>Stockage : {{ $history->resource->storage }}</li>
                            <li>Disque : {{ $history->resource->storage_type }}</li>
                            <li>OS : {{ $history->resource->os }}</li>
                            <li>Location: {{ $history->resource->location }}</li>
                            @elseif($history->id_category == 2)
                            <li>Brand: {{ $history->resource->brand }}</li>
                            <li>CPU : {{ $history->resource->cpu }}</li>
                            <li>RAM : {{ $history->resource->ram }}</li>
                            <li>Type : {{ $history->resource->storage }}</li>
                            <li>Disque : {{ $history->resource->storage_type }}</li>
                            <li>Adresse IP : {{ $history->resource->ip_address }}</li>
                            <li>Serveur hote: {{ $history->resource->server_hote }}</li>
                            <li>OS : {{ $history->resource->os }}</li>
                            @elseif($history->id_category == 3)
                            <li>Brand: {{ $history->resource->brand }}</li>
                            <li>Type: {{ $history->resource->type }}</li>
                            <li>Modele: {{ $history->resource->model }}</li>
                            <li>Port: {{ $history->resource->port_number }}</li>
                            <li>Speed: {{ $history->resource->speed }}</li>
                            @elseif($history->id_category == 4)
                            <li>Brand: {{ $history->resource->brand }}</li>
                            <li>Capacity: {{ $history->resource->capacity }}</li>
                            <li>Type: {{ $history->resource->type }}</li>
                            <li>Speed: {{ $history->resource->speed }}</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="btn">
                    <button class="details">Details</button>
                    <button type="button" onclick="window.location.href='{{ route('support.reclamer', ['history' => $history->id]) }}'">Reclamer</button>

                </div>
            </div>
            @endif
            @endforeach

        </section>
        <br><br>
        <section class="reservations-list">
            <h1>Reservation refusée</h1>
            @foreach($histories as $history)
            @if($history->status == "rejected")
            <div class="reservation-row">
                <span class="status active">{{ $history->status }}</span>
                <div>
                    <h3>{{ $history->resource->name }}</h3>
                    <small>{{ $history->start_date }} → {{ $history->end_date }}</small>

                    <div class="show">
                        <ul>

                            @if($history->id_category == 1)
                            <li>Brand: {{ $history->resource->name }}</li>
                            <li>CPU : {{ $history->resource->cpu }}</li>
                            <li>RAM : {{ $history->resource->ram }}</li>
                            <li>Stockage : {{ $history->resource->storage }}</li>
                            <li>Disque : {{ $history->resource->storage_type }}</li>
                            <li>OS : {{ $history->resource->os }}</li>
                            <li>Location: {{ $history->resource->location }}</li>
                            @elseif($history->id_category == 2)
                            <li>Brand: {{ $history->resource->brand }}</li>
                            <li>CPU : {{ $history->resource->cpu }}</li>
                            <li>RAM : {{ $history->resource->ram }}</li>
                            <li>Type : {{ $history->resource->storage }}</li>
                            <li>Disque : {{ $history->resource->storage_type }}</li>
                            <li>Adresse IP : {{ $history->resource->ip_address }}</li>
                            <li>Serveur hote: {{ $history->resource->server_hote }}</li>
                            <li>OS : {{ $history->resource->os }}</li>
                            @elseif($history->id_category == 3)
                            <li>Brand: {{ $history->resource->brand }}</li>
                            <li>Type: {{ $history->resource->type }}</li>
                            <li>Modele: {{ $history->resource->model }}</li>
                            <li>Port: {{ $history->resource->port_number }}</li>
                            <li>Speed: {{ $history->resource->speed }}</li>
                            @elseif($history->id_category == 4)
                            <li>Brand: {{ $history->resource->brand }}</li>
                            <li>Capacity: {{ $history->resource->capacity }}</li>
                            <li>Type: {{ $history->resource->type }}</li>
                            <li>Speed: {{ $history->resource->speed }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="btn">
                    <button class="details">Details</button>
                    <button type="button" onclick="window.location.href='{{ route('support.reclamer', ['history' => $history->id]) }}'">Reclamer</button>

                </div>
            </div>
            @endif
            @endforeach
        </section>

    </main>

    @include('include.footer')

</body>

</html>