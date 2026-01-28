<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Data Center - Réservation</title>
    @vite('resources/css/create.css')
</head>

<body>
    @include('include.responsableHeader')
    <main>
        <section>

            <form class="creation-form" method="POST" action="{{ route('validate-creation',['type' => 'server']) }}">
                @csrf

                @if($type === 'server')
                <h1>Nouveau Serveur</h1>

                <label>Nom</label>
                <input type="text" name="name">

                <label>Brand</label>
                <input type="text" name="brand">

                <label>CPU</label>
                <input type="number" name="cpu">

                <label>RAM</label>
                <input type="number" name="ram">

                <label>Stockage</label>
                <input type="number" name="storage">

                <label>Type de Stockage</label>
                <input type="text" name="storage_type">

                <label>OS</label>
                <input type="text" name="os">

                <label>Location</label>
                <input type="text" name="location">

                <label>Status</label>
                <input type="text" name="status">

                <label>Quantité</label>
                <input type="number" name="quantity_available">

                <label>Description</label>
                <input type="text" name="description">

                <button class="btn" type="submit">Valider</button>

                @if($errors->any())
                @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
                @endif
                @endif

                @if($type === 'vm')
                <h1>Nouvelle Virtual Machine</h1>

                <label>Nom</label>
                <input type="text" name="name">

                <label>CPU</label>
                <input type="number" name="cpu">

                <label>RAM</label>
                <input type="number" name="ram">

                <label>Stockage</label>
                <input type="number" name="storage">

                <label>Type de Stockage</label>
                <input type="text" name="storage_type">

                <label>OS</label>
                <input type="text" name="os">

                <label>IP Address</label>
                <input type="text" name="ip_address">

                <label>Serveur Hôte</label>
                <input type="text" name="server_hote">

                <label>Status</label>
                <input type="text" name="status">

                <label>Quantité</label>
                <input type="number" name="quantity_available">

                <label>Description</label>
                <input type="text" name="description">

                <button class="btn" type="submit">Valider</button>

                @if($errors->any())
                @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
                @endif
                @endif

                @if($type === 'network')
                <h1>Nouveau Network</h1>

                <label>Nom</label>
                <input type="text" name="name">

                <label>Brand</label>
                <input type="text" name="brand">

                <label>Type</label>
                <input type="text" name="type">

                <label>Model</label>
                <input type="text" name="model">

                <label>Port Number</label>
                <input type="number" name="port_number">

                <label>Speed</label>
                <input type="text" name="speed">

                <label>Status</label>
                <input type="text" name="status">

                <label>Quantité</label>
                <input type="number" name="quantity_available">

                <label>Description</label>
                <input type="text" name="description">

                <button class="btn" type="submit">Valider</button>

                @if($errors->any())
                @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
                @endif
                @endif

                @if($type === 'storage')
                <h1>Nouveau Storage</h1>

                <label>Nom</label>
                <input type="text" name="name">

                <label>Brand</label>
                <input type="text" name="brand">

                <label>Capacity</label>
                <input type="text" name="capacity">

                <label>Type</label>
                <input type="text" name="type">

                <label>Speed</label>
                <input type="text" name="speed">

                <label>Status</label>
                <input type="text" name="status">

                <label>Quantité</label>
                <input type="number" name="quantity_available">

                <label>Description</label>
                <input type="text" name="description">

                <button class="btn" type="submit">Valider</button>

                @if($errors->any())
                @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
                @endif
                @endif



            </form>
        </section>
    </main>

</body>

</html>