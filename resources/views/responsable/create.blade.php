<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du {{$type}}</title>
    @vite('resources/css/responsable.css')
</head>

<body>

    @if($type === 'server')
    <form action="{{ route('validate-creation',['type' => 'server']) }}" method="post">
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
    <form action="{{ route('validate-creation', ['type' => 'vm']) }}" method="post">
        @csrf
        <h1>Virtual Machine</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Cpu</th>
                <th>Ram</th>
                <th>Stockage</th>
                <th>Type de Stockage</th>
                <th>OS</th>
                <th>IP Address</th>
                <th>Serveur Hote</th>
                <th>Status</th>
                <th>Quantite</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><input type="text" name="name"></td>
                <td><input type="number" name="cpu"></td>
                <td><input type="number" name="ram"></td>
                <td><input type="number" name="storage"></td>
                <td><input type="text" name="storage_type"></td>
                <td><input type="text" name="os"></td>
                <td><input type="text" name="ip_address"></td>
                <td><input type="text" name="server_hote"></td>
                <td><input type="text" name="status"></td>
                <td><input type="number" name="quantity_available"></td>
                <td><input type="text" name="description"></td>
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
    <form action="{{ route('validate-creation', ['type' => 'network']) }}" method="post">
        @csrf
        <h1>Network</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Brand</th>
                <th>Type</th>
                <th>Model</th>
                <th>Port Number</th>
                <th>Speed</th>
                <th>Status</th>
                <th>Quantite</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><input type="text" name="name"></td>
                <td><input type="text" name="brand"></td>
                <td><input type="text" name="type"></td>
                <td><input type="text" name="model"></td>
                <td><input type="text" name="port_number"></td>
                <td><input type="text" name="speed"></td>
                <td><input type="text" name="status"></td>
                <td><input type="number" name="quantity_available"></td>
                <td><input type="text" name="description"></td>
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
    <form action="{{ route('validate-creation', ['type' => 'storage']) }}" method="post">
        @csrf
        <h1>Storage</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Brand</th>
                <th>Capacity</th>
                <th>Type</th>
                <th>Speed</th>
                <th>Status</th>
                <th>Quantite</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><input type="text" name="name"></td>
                <td><input type="text" name="brand"></td>
                <td><input type="text" name="capacity"></td>
                <td><input type="text" name="type"></td>
                <td><input type="text" name="speed"></td>
                <td><input type="text" name="status"></td>
                <td><input type="text" name="quantity_available"></td>
                <td><input type="text" name="description"></td>
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