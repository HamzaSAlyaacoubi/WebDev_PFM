<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ressources disponibles</h1>

<table border="1">

@foreach($ressources as $ressource)

    <!-- Pour Afficher les Headers une seule fois -->
    @if($loop->first)

        @if($ressource->id_categorie == 1)
        <tr>
            <th>Resource Name</th>
            <th>Brand</th>
            <th>CPU</th>
            <th>RAM</th>
            <th>Storage</th>
            <th>Storage Type</th>
            <th>OS</th>
            <th>Location</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>

        @elseif($ressource->id_categorie == 2)
        <tr>
            <th>Resource Name</th>
            <th>CPU</th>
            <th>RAM</th>
            <th>Storage</th>
            <th>Storage Type</th>
            <th>OS</th>
            <th>IP Address</th>
            <th>Server Hôte</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>

        @elseif($ressource->id_categorie == 3)
        <tr>
            <th>Resource Name</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Model</th>
            <th>Port</th>
            <th>Speed</th>
            <th>Status</th>
            <th>Quantity</th>
        </tr>

        @elseif($ressource->id_categorie == 4)
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Capacity</th>
            <th>Type</th>
            <th>Speed</th>
            <th>Status</th>
            <th>Quantity</th>
        </tr>
        @endif

    @endif

    {{-- LIGNES --}}
    <tr>
        @if($ressource->id_categorie == 1)
            <td>{{ $ressource->name }}</td>
            <td>{{ $ressource->brand }}</td>
            <td>{{ $ressource->cpu }}</td>
            <td>{{ $ressource->ram }}</td>
            <td>{{ $ressource->storage }}</td>
            <td>{{ $ressource->storage_type }}</td>
            <td>{{ $ressource->os }}</td>
            <td>{{ $ressource->location }}</td>
            <td>{{ $ressource->quantity_available }}</td>
            <td>{{ $ressource->status }}</td>

        @elseif($ressource->id_categorie == 2)
            <td>{{ $ressource->name }}</td>
            <td>{{ $ressource->cpu }}</td>
            <td>{{ $ressource->ram }}</td>
            <td>{{ $ressource->storage }}</td>
            <td>{{ $ressource->storage_type }}</td>
            <td>{{ $ressource->os }}</td>
            <td>{{ $ressource->ip_address }}</td>
            <td>{{ $ressource->server_hote }}</td>
            <td>{{ $ressource->quantity_available }}</td>
            <td>{{ $ressource->status }}</td>

        @elseif($ressource->id_categorie == 3)
            <td>{{ $ressource->name }}</td>
            <td>{{ $ressource->brand }}</td>
            <td>{{ $ressource->type }}</td>
            <td>{{ $ressource->model }}</td>
            <td>{{ $ressource->port_number }}</td>
            <td>{{ $ressource->speed }}</td>
            <td>{{ $ressource->status }}</td>
            <td>{{ $ressource->quantity_available }}</td>

        @elseif($ressource->id_categorie == 4)
            <td>{{ $ressource->name }}</td>
            <td>{{ $ressource->brand }}</td>
            <td>{{ $ressource->capacity }}</td>
            <td>{{ $ressource->type }}</td>
            <td>{{ $ressource->speed }}</td>
            <td>{{ $ressource->status }}</td>
            <td>{{ $ressource->quantity_available }}</td>
        @endif
    </tr>

@endforeach

</table><br><br><br>
    <div><h2>Règles d’utilisation</h2>
        
        <details>
            <summary><strong>Accès aux ressources</strong></summary>
            <ul>
                <li>Les invités peuvent consulter les ressources en lecture seule.</li>
                <li>Un compte est obligatoire pour effectuer une réservation.</li>
            </ul>
        </details>
        
        <details>
            <summary><strong>Conditions d’utilisation</strong></summary>
            <ul>
                <li>Les ressources sont réservées à un usage pédagogique et de recherche.</li>
                <li>Toute modification ou utilisation abusive est interdite.</li>
            </ul>
        </details>
        
        <details>
            <summary><strong>Sécurité et responsabilité</strong></summary>
            <ul>
                <li>Les données hébergées doivent être sauvegardées par l’utilisateur.</li>
                <li>Le Data Center n’est pas responsable des pertes de données.</li>
            </ul>
        </details>
    </div>
</body>
</html>