<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    @vite('resources/css/adminHistory.css')
    @vite('resources/js/adminHistory.js')
</head>

<body>

    @include('include.adminHeader')

    <main class="dashboard">


        <!-- STATS -->
        <section class="stats">
            <div class="stat-card">
                <h2>{{ $totalReservationsCount }}</h2>
                <p>Réservations totales</p>
            </div>

            <div class="stat-card active">
                <h2>{{ $reservationsAccepted }}</h2>
                <p>Actives</p>
            </div>

            <div class="stat-card danger">
                <h2>{{ $reservationsRejected }}</h2>
                <p>Rejected</p>
            </div>
        </section>
        <!-- LIST -->
        <section class="reservations-list">
            @foreach($histories as $history)
            <div class="reservation-row">
                <span class="status active">{{ $history->status }}</span>
                <div class="reservation-infos">
                    <h3>{{ $history->resource->name }}</h3>
                    <p><strong>Date de resevation :</strong> {{$history->reservation_date}}</p>

                    <div class="show">
                        <ul>
                            <small><strong>Periode :</strong> {{ $history->start_date }} → {{ $history->end_date }}</small>
                            @if($history->id_category == 1)
                            <li>Brand: {{ $history->resource->name }}</li>
                            <li>CPU : {{ $history->resource->cpu }}</li>
                            <li>RAM : {{ $history->resource->ram }}</li>
                            <li>Stockage : {{ $history->resource->storage }}</li>
                            <li>Disque : {{ $history->resource->storage_type }}</li>
                            <li>OS : {{ $history->resource->os }}</li>
                            <li>Location: {{ $history->resource->location }}</li>
                            @elseif($history->id_category == 2)
                            <li>CPU : {{ $history->resource->cpu }}</li>
                            <li>RAM : {{ $history->resource->ram }}</li>
                            <li>Type : {{ $history->resource->storage }}</li>
                            <li>Disque : {{ $history->resource->storage_type }}</li>
                            <li>Adresse IP : {{ $history->resource->ip_address }}</li>
                            <li>Serveur hote : {{ $history->resource->server_hote }}</li>
                            <li>OS : {{ $history->resource->os }}</li>
                            @elseif($history->id_category == 3)
                            <li>Brand : {{ $history->resource->brand }}</li>
                            <li>Type : {{ $history->resource->type }}</li>
                            <li>Modele : {{ $history->resource->model }}</li>
                            <li>Port : {{ $history->resource->port_number }}</li>
                            <li>Speed : {{ $history->resource->speed }}</li>
                            @elseif($history->id_category == 4)
                            <li>Brand : {{ $history->resource->brand }}</li>
                            <li>Capacity : {{ $history->resource->capacity }}</li>
                            <li>Type : {{ $history->resource->type }}</li>
                            <li>Speed : {{ $history->resource->speed }}</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="btns">
                    <button class="details-btn btn">Details</button>
                </div>
            </div>
            @endforeach

        </section>


    </main>


</body>

</html>