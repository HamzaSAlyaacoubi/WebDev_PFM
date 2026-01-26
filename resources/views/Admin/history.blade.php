<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    @vite('resources/css/reservations.css')
    @vite('resources/js/reservations.js')
</head>

<body>

    <header>
        <span>ᔕEᖇᐯE</span>

        <nav>
            <ul>
                <li><a href="{{route('admin')}}">Ressources</a></li>
                <li><a href="{{route('admin.users')}}">Users</a></li>
                <li><a href="{{route('admin.hitory')}}">Historique</a></li>
                <li><a href="{{route('admin.statistics')}}">Statistiques</a></li>
                <li><a href="{{route('admin.support')}}">Support</a></li>
            </ul>
        </nav>

        <a href="{{route('logout')}}">Se deconnecter</a>
    </header>

    <main class="dashboard">

        <h1>Historique de Reservations</h1>

        <!-- STATS -->
        <section class="stats">
            <div class="stat-card">
                <h2>{{$totalReservationsCount}}</h2>
                <p>Réservations totales</p>
            </div>

            <div class="stat-card">
                <h2>{{$reservationsAccepted}}</h2>
                <p>Accepte</p>
            </div>

            <div class="stat-card danger">
                <h2>{{$reservationsRefused}}</h2>
                <p>Refuser</p>
            </div>
        </section>

        <!-- LIST -->
        <section class="reservations-list">

            @foreach($reservations as $reservation)
            @foreach($resources as $resource)
            @if($reservation->id_resource == $resource->id && $reservation->id_category == $resource->id_category)
            <!-- Servers -->
            @if($reservation->id_category == 1 && $resource->id_category == 1)
            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reservation : {{$reservation->created_at}}</p>
                        <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                    </div>
                    <div class="reservation-btns">
                        <button class="details-btn">Voir Details</button>
                    </div>

                </div>
                <div class="details">
                    <ul>
                        <li>Brand : {{$resource->brand}}</li>
                        <li>Cpu : {{$resource->cpu}}</li>
                        <li>Ram : {{$resource->ram}}</li>
                        <li>Storage : {{$resource->storage}}</li>
                        <li>Storage type : {{$resource->storage_type}}</li>
                        <li>Os :{{$resource->os}}</li>
                        <li>Qty : {{$resource->quantity_available}}</li>
                    </ul>
                </div>
            </div>
            @endif
            <!-- Virtual Machines -->
            @if($reservation->id_category == 2 && $resource->id_category == 2)
            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reservation : {{$reservation->created_at}}</p>
                        <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                    </div>
                    <div class="reservation-btns">
                        <button class="details-btn">Voir Details</button>
                    </div>

                </div>
                <div class="details">
                    <ul>
                        <li>Cpu : {{$resource->cpu}}</li>
                        <li>Ram : {{$resource->ram}}</li>
                        <li>Storage : {{$resource->storage}}</li>
                        <li>Storage type : {{$resource->storage_type}}</li>
                        <li>Os : {{$resource->os}}</li>
                        <li>IP : {{$resource->ip_address}}</li>
                        <li>Qty : {{$resource->quantity_available}}</li>
                    </ul>
                </div>
            </div>
            @endif
            <!-- Networks -->
            @if($reservation->id_category == 3 && $resource->id_category == 3)
            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reservation : {{$reservation->created_at}}</p>
                        <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                    </div>
                    <div class="reservation-btns">
                        <button class="details-btn">Voir Details</button>
                    </div>

                </div>
                <div class="details">
                    <ul>
                        <li>Brand : {{$resource->brand}}</li>
                        <li>Type : {{$resource->type}}</li>
                        <li>Modele : {{$resource->model}}</li>
                        <li>Nombre de ports : {{$resource->port_number}}</li>
                        <li>Vitesse : {{$resource->speed}}</li>
                        <li>Qty : {{$resource->quantity_available}}</li>
                    </ul>
                </div>
            </div>
            @endif
            <!-- Storages -->
            @if($reservation->id_category == 4 && $resource->id_category == 4)
            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reservation : {{$reservation->created_at}}</p>
                        <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                    </div>
                    <div class="reservation-btns">
                        <button class="details-btn">Voir Details</button>
                    </div>

                </div>
                <div class="details">
                    <ul>
                        <li>Brand : {{$resource->brand}}</li>
                        <li>Capacite : {{$resource->capacity}}</li>
                        <li>Type : {{$resource->type}}</li>
                        <li>Vitesse : {{$resource->speed}}</li>
                        <li>Qty : {{$resource->quantity_available}}</li>
                    </ul>
                </div>
            </div>
            @endif
            @endif
            @endforeach
            @endforeach
        </section>
        <!--  -->

    </main>


</body>

</html>