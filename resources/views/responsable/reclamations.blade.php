<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamations</title>
    @vite('resources/css/reservations.css')
    @vite('resources/js/reservations.js')
</head>

<body>
    @include('include.responsableHeader')

    <div class="dashboard">

        <h1>Reclamations</h1>
        <section class="reservations-list">

            @foreach($reclamations as $reclamation)
            @foreach($resources as $resource)
            @if($resource->id == $reclamation->history->id_resource)
            <div>
                <div class="reservation-row">

                    <div class="reservation-infos">
                        <h3>User Name : {{$reclamation->user->name}}</h3>
                        <h3>{{$resource->name}}</h3>
                        <p>Date de reclamation : {{$reclamation->created_at}}</p>
                    </div>
                    <div class="reservation-btns">
                        <button class="btn details-btn">Voir Details</button>
                    </div>

                </div>
                <div class="details">
                    <p><strong>Problem :</strong> {{$reclamation->problem_type}}</p>
                    <p><strong>Description :</strong> {{$reclamation->description}}</p>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </section>
    </div>
</body>

</html>