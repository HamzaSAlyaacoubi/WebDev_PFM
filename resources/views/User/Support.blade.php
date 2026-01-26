<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/Report.css')
    <title>Data Center</title>
</head>

<body>
    <header>
        <span>ᔕEᖇᐯE</span>

        <nav>
            <ul>
                <li><a href="{{route('dashboard')}}">Ressources</a></li>
                <li><a href="{{route('vosreservations')}}">Vos reservations</a></li>
                <li><a href="{{route('history')}}">Historique</a></li>
                <li><a href="{{route('support')}}" class="active">Support</a></li>
                <li><a href=#contact>Contact</a></li>
            </ul>
        </nav>

        <a href="../guest/home_guest.php">Se deconnecter</a>
    </header>

    <main>

        <section>
            <form method="POST" action="{{ route('reclamations.store') }}">
                @csrf
                <input type="hidden" name="reservation_id" value="{{ $history->id }}">
                <h1>Reclamation</h1>
                <p>Veuillez signaler un problème et le decrire.</p>
                <h3>{{ $history->resource->name }}</h3>
                <label for="probleme">Problème rencontré: </label>
                <input type="text" placeholder="Probleme rencontree" id="probleme" name="problem_type"><br><br>
                <label for="area">Description:</label>
                <textarea name="description" id="area" placeholder="Veuillez Decrire votre probleme"></textarea>

                <button type="submit">Envoyer</button>
            </form>

        </section>
    </main>

    @include('include.footer')

</body>

</html>