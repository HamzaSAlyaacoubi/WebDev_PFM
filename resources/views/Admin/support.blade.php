<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
    @vite('resources/css/adminSupport.css')
    @vite('resources/js/adminSupport.js')
</head>

<body>
    @include('include.adminHeader')


    <div class="dashboard">

        <h1>Supports</h1>
        <section class="reservations-list">

            @foreach($supports as $support)
            <div>
                <div class="reservation-row">
                    <div class="reservation-infos">
                        <h3>User Name : {{$support->user->name}}</h3>
                        <p>Date de support : {{$support->created_at}}</p>
                    </div>

                    <div class="reservation-btns">
                        <button class="details-btn btn">Voir Details</button>
                    </div>
                </div>

                <div class="details">
                    <p><strong>Message :</strong> {{$support->message}}</p>
                    <!-- <button class="btn">Auto Reponse</button> -->
                </div>
            </div>
            @endforeach
        </section>
    </div>

</body>

</html>