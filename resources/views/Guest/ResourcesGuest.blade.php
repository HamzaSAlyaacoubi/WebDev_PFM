<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ressources disponibles</h1>
    <table border=1>
        <tr>
            <th>Resource Name</th>
            <th>Description</th>
            <th>cpu</th>
            <th>Storage</th>
            <th>Location</th>
            <th>Status</th>
        </tr>
        @foreach($ressources as $ressource)
        <tr>
            <td>{{ $ressource->name }}</td>
            <td>{{ $ressource->description }}</td>
            <td>{{ $ressource->cpu }}</td>
            <td>{{ $ressource->storage }}</td>
            <td>{{ $ressource->location }}</td>
            <td>{{ $ressource->status }}</td>
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