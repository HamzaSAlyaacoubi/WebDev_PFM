<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/Message.css')
    <title>Data Center</title>
</head>

<body>
    <header>
        <span>ᔕEᖇᐯE</span>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Ressources</a></li>
                <li><a href="{{ route('vosreservations') }}">Vos reservations</a></li>
                <li><a href="{{ route('history') }}">Historique</a></li>
                <li><a href="{{ route('support') }}">Support</a></li>
                <li><a href=#contact>Contact</a></li>
            </ul>
        </nav>

        <a href="../guest/home_guest.php">Se deconnecter</a>
    </header>

    <main>

        <section>
            <form method="POST" action="{{ route('support.message.store') }}">
                @csrf
                <h1>Support & Avis</h1>
                <p>Votre avis nous aide à améliorer la plateforme.</p>


                <div>
                    <label>Votre message / réclamation</label>
                    <textarea name="message" rows="5" cols="200" placeholder="N'hésitez pas à décrire votre problème ou suggestion..." required></textarea>
                </div>

                <button type="submit">Envoyer</button>
            </form>

        </section>
    </main>

    @include('include.footer')

</body>

</html>