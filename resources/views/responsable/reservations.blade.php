<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos réservations</title>
    @vite('resources/css/reservations.css')
    @vite('resources/js/reservations.js')
</head>

<body>

    <header>
        <span>ᔕEᖇᐯE</span>

        <nav>
            <ul>
                <li><a href="{{route('responsable')}}">Ressources</a></li>
                <li><a href="{{route('responsable.reservations')}}">Reservations</a></li>
                <li><a href="{{route('responsable.hitory')}}">Historique</a></li>
                <li><a href="{{route('responsable.reclamations')}}">Reclamations</a></li>
                <li><a href="{{route('responsable.support')}}">Support</a></li>
            </ul>
        </nav>

        <a href="{{route('logout')}}">Se deconnecter</a>
    </header>

    <main class="dashboard">

        <h1>Vos réservations</h1>

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
            @if($reservation->Category_id == 1)
            @foreach($resources as $resource)
            @if($resource->id_categorie == $reservation->Category_id && $resource->id == $reservation->resource_id)
            <div class="reservation-row">
                <div>
                    <h3>{{$resource->name}}</h3>
                    <p>Date de reservation : {{$reservation->created_at}}</p>
                    <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                </div>
                <button class="details-btn">Voir Details</button>
                <a href="{{route('reservation.accept', $reservation->id)}}" class="accept-btn">Accepter</a>
                <a href="{{route('reservation.refuse', $reservation->id)}}" class="refuse-btn">Refuser</a>

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
            @endif
            @endforeach
            @endif
            <!-- Virtual Machines -->
            @if($reservation->Category_id == 2)
            @foreach($resources as $resource)
            @if($resource->id_categorie == $reservation->Category_id && $resource->id == $reservation->resource_id)
            <div class="reservation-row">
                <div>
                    <h3>{{$resource->name}}</h3>
                    <p>Date de reservation : {{$reservation->created_at}}</p>
                    <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                </div>
                <button class="details-btn">Voir Details</button>
                <a href="{{route('reservation.accept', $reservation->id)}}" class="accept-btn">Accepter</a>
                <a href="{{route('reservation.refuse', $reservation->id)}}" class="refuse-btn">Refuser</a>

            </div>
            <div class="details">
                <ul>
                    <li>Brand : {{$resource->brand}}</li>
                    <li>Cpu : {{$resource->cpu}}</li>
                    <li>Ram : {{$resource->ram}}</li>
                    <li>Storage : {{$resource->storage}}</li>
                    <li>Storage type : {{$resource->storage_type}}</li>
                    <li>Os : {{$resource->os}}</li>
                    <li>IP : {{$resource->ip_address}}</li>
                    <li>Qty : {{$resource->quantity_available}}</li>
                </ul>
            </div>
            @endif
            @endforeach
            @endif
            <!-- Networks -->
            @if($reservation->Category_id == 3)
            @foreach($resources as $resource)
            @if($resource->id_categorie == $reservation->Category_id && $resource->id == $reservation->resource_id)
            <div class="reservation-row">
                <div>
                    <h3>{{$resource->name}}</h3>
                    <p>Date de reservation : {{$reservation->created_at}}</p>
                    <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                </div>
                <button class="details-btn">Voir Details</button>
                <a href="{{route('reservation.accept', $reservation->id)}}" class="accept-btn">Accepter</a>
                <a href="{{route('reservation.refuse', $reservation->id)}}" class="refuse-btn">Refuser</a>

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
            @endif
            @endforeach
            @endif
            <!-- Storages -->
            @if($reservation->Category_id == 4)
            @foreach($resources as $resource)
            @if($resource->id_categorie == $reservation->Category_id && $resource->id == $reservation->resource_id)
            <div class="reservation-row">
                <div>
                    <h3>{{$resource->name}}</h3>
                    <p>Date de reservation : {{$reservation->created_at}}</p>
                    <small>Periode : {{$reservation->start_date}} → {{$reservation->end_date}}</small>
                </div>
                <button class="details-btn">Voir Details</button>
                <a href="{{route('reservation.accept', $reservation->id)}}" class="accept-btn">Accepter</a>
                <a href="{{route('reservation.refuse', $reservation->id)}}" class="refuse-btn">Refuser</a>

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
            @endif
            @endforeach
            @endif
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


</body>

</html>