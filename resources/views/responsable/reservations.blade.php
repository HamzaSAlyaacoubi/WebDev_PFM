<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations</title>
    @vite('resources/css/reservations.css')
    @vite('resources/js/reservations.js')
</head>

<body>

    @include('include.responsableHeader')

    <main class="dashboard">

        <h1>Réservations</h1>

        <!-- STATS -->
        <section class="stats">
            <div class="stat-card">
                <h2>{{$totalReservationsCount}}</h2>
                <p>Réservations totales</p>
            </div>

            <div class="stat-card">
                <h2>{{$currentReservationsCount}}</h2>
                <p>Current Reservations</p>
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
            <!-- Servers -->
            @if(Auth::user()->id_category == 1)
            @foreach($resources as $resource)
            @if($resource->id == $reservation->id_resource)

            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reservation : {{$reservation->created_at}}</p>
                        <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                    </div>
                    <div class="reservation-btns">
                        <a class="btn accept" href="{{route('reservation.accept', $reservation->id)}}" class="accept-btn">Accepter</a>
                        <a class="btn refuse" href="{{route('reservation.refuse', $reservation->id)}}" class="refuse-btn">Refuser</a>
                        <button class="details-btn btn">Voir Details</button>
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
                        <li>Qty : {{$resource->quantity_available - $resource->quantity_used}}</li>
                    </ul>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            <!-- Virtual Machines -->
            @if(Auth::user()->id_category == 2)
            @foreach($resources as $resource)
            @if($resource->id == $reservation->id_resource)
            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reservation : {{$reservation->created_at}}</p>
                        <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                    </div>
                    <div class="reservation-btns">
                        <a class="btn accept" href="{{route('reservation.accept', $reservation->id)}}" class="accept-btn">Accepter</a>
                        <a class="btn refuse" href="{{route('reservation.refuse', $reservation->id)}}" class="refuse-btn">Refuser</a>
                        <button class="details-btn btn">Voir Details</button>
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
                        <li>Qty : {{$resource->quantity_available - $resource->quantity_used}}</li>
                    </ul>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            <!-- Networks -->
            @if(Auth::user()->id_category == 3)
            @foreach($resources as $resource)
            @if($resource->id == $reservation->id_resource)
            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reservation : {{$reservation->created_at}}</p>
                        <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                    </div>
                    <div class="reservation-btns">
                        <a class="btn accept" href="{{route('reservation.accept', $reservation->id)}}" class="accept-btn">Accepter</a>
                        <a class="btn refuse" href="{{route('reservation.refuse', $reservation->id)}}" class="refuse-btn">Refuser</a>
                        <button class="details-btn btn">Voir Details</button>
                    </div>

                </div>
                <div class="details">
                    <ul>
                        <li>Brand : {{$resource->brand}}</li>
                        <li>Type : {{$resource->type}}</li>
                        <li>Modele : {{$resource->model}}</li>
                        <li>Nombre de ports : {{$resource->port_number}}</li>
                        <li>Vitesse : {{$resource->speed}}</li>
                        <li>Qty : {{$resource->quantity_available - $resource->quantity_used}}</li>
                    </ul>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            <!-- Storages -->
            @if(Auth::user()->id_category == 4)
            @foreach($resources as $resource)
            @if($resource->id == $reservation->id_resource)
            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reservation : {{$reservation->created_at}}</p>
                        <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                    </div>
                    <div class="reservation-btns">
                        <a class="btn accept" href="{{route('reservation.accept', $reservation->id)}}" class="accept-btn">Accepter</a>
                        <a class="btn refuse" href="{{route('reservation.refuse', $reservation->id)}}" class="refuse-btn">Refuser</a>
                        <button class="details-btn btn">Voir Details</button>
                    </div>

                </div>
                <div class="details">
                    <ul>
                        <li>Brand : {{$resource->brand}}</li>
                        <li>Capacite : {{$resource->capacity}}</li>
                        <li>Type : {{$resource->type}}</li>
                        <li>Vitesse : {{$resource->speed}}</li>
                        <li>Qty : {{$resource->quantity_available - $resource->quantity_used}}</li>
                    </ul>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            @endforeach
        </section>

    </main>


</body>

</html>