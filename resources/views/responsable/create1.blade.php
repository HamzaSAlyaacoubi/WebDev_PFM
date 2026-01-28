<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du {{$type}}</title>
    @vite('resources/css/responsable.css')
</head>

<body class="creation-body">

    @if($type === 'server')
    <form class="creation-form" action="{{ route('validate-creation',['type' => 'server']) }}" method="post">
        @csrf
        <h1>Serveur</h1>
        <table>
            <tr>
                <th>Nom</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>Brand</th>
                <td><input type="text" name="brand"></td>
            </tr>
            <tr>
                <th>Cpu</th>
                <td><input type="number" name="cpu"></td>
            </tr>
            <tr>
                <th>Ram</th>
                <td><input type="number" name="ram"></td>
            </tr>
            <tr>
                <th>Stockage</th>
                <td><input type="number" name="storage"></td>
            </tr>
            <tr>
                <th>Type de Stockage</th>
                <td><input type="text" name="storage_type"></td>
            </tr>
            <tr>
                <th>OS</th>
                <td><input type="text" name="os"></td>
            </tr>
            <tr>
                <th>Location</th>
                <td><input type="text" name="location"></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><input type="text" name="status"></td>
            </tr>
            <tr>
                <th>Quantite</th>
                <td><input type="number" name="quantity_available"></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <th>Action</th>
                <td><button class="btn" type="submit">Valider</button></td>
            </tr>
        </table>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
        @endif
    </form>
    @endif


    @if($type === 'vm')
    <form class="creation-form" action="{{ route('validate-creation', ['type' => 'vm']) }}" method="post">
        @csrf
        <h1>Virtual Machine</h1>
        <table>
            <tr>
                <th>Nom</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>CPU</th>
                <td><input type="number" name="cpu"></td>
            </tr>
            <tr>
                <th>RAM</th>
                <td><input type="number" name="ram"></td>
            </tr>
            <tr>
                <th>Stockage</th>
                <td><input type="number" name="storage"></td>
            </tr>
            <tr>
                <th>Type de Stockage</th>
                <td><input type="text" name="storage_type"></td>
            </tr>
            <tr>
                <th>OS</th>
                <td><input type="text" name="os"></td>
            </tr>
            <tr>
                <th>IP Address</th>
                <td><input type="text" name="ip_address"></td>
            </tr>
            <tr>
                <th>Serveur Hôte</th>
                <td><input type="text" name="server_hote"></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><input type="text" name="status"></td>
            </tr>
            <tr>
                <th>Quantité</th>
                <td><input type="number" name="quantity_available"></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <th>Action</th>
                <td><button class="btn" type="submit">Valider</button></td>
            </tr>
        </table>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
        @endif
    </form>
    @endif


    @if($type === 'network')
    <form class="creation-form" action="{{ route('validate-creation', ['type' => 'network']) }}" method="post">
        @csrf
        <h1>Network</h1>
        <table>
            <tr>
                <th>Nom</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>Brand</th>
                <td><input type="text" name="brand"></td>
            </tr>
            <tr>
                <th>Type</th>
                <td><input type="text" name="type"></td>
            </tr>
            <tr>
                <th>Model</th>
                <td><input type="text" name="model"></td>
            </tr>
            <tr>
                <th>Port Number</th>
                <td><input type="number" name="port_number"></td>
            </tr>
            <tr>
                <th>Speed</th>
                <td><input type="text" name="speed"></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><input type="text" name="status"></td>
            </tr>
            <tr>
                <th>Quantité</th>
                <td><input type="number" name="quantity_available"></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <th>Action</th>
                <td><button class="btn" type="submit">Valider</button></td>
            </tr>
        </table>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
        @endif
    </form>
    @endif


    @if($type === 'storage')
    <form class="creation-form" action="{{ route('validate-creation', ['type' => 'storage']) }}" method="post">
        @csrf
        <h1>Storage</h1>
        <table>
            <tr>
                <th>Nom</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>Brand</th>
                <td><input type="text" name="brand"></td>
            </tr>
            <tr>
                <th>Capacity</th>
                <td><input type="text" name="capacity"></td>
            </tr>
            <tr>
                <th>Type</th>
                <td><input type="text" name="type"></td>
            </tr>
            <tr>
                <th>Speed</th>
                <td><input type="text" name="speed"></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><input type="text" name="status"></td>
            </tr>
            <tr>
                <th>Quantité</th>
                <td><input type="number" name="quantity_available"></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <th>Action</th>
                <td><button class="btn" type="submit">Valider</button></td>
            </tr>
        </table>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
        @endif
    </form>
    @endif

</body>

</html>