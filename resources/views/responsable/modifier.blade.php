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
    <form action="{{route('validate-modification', ['type' => 'server','id' => $resource->id])}}" method="post">
        @csrf
        <h1>Serveur</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Brand</th>
                <th>Cpu</th>
                <th>Ram</th>
                <th>Stockage</th>
                <th>Type de Stockage</th>
                <th>OS</th>
                <th>Location</th>
                <th>Status</th>
                <th>Quantite</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><input type="text" name="name" value="{{ old('name', $resource->name) }}"></td>
                <td><input type="text" name="brand" value="{{ old('brand', $resource->brand) }}"></td>
                <td><input type="number" name="cpu" value="{{ old('cpu', $resource->cpu) }}"></td>
                <td><input type="number" name="ram" value="{{ old('ram', $resource->ram) }}"></td>
                <td><input type="number" name="storage" value="{{ old('storage', $resource->storage) }}"></td>
                <td><input type="text" name="storage_type" value="{{ old('storage_type', $resource->storage_type) }}"></td>
                <td><input type="text" name="os" value="{{ old('os', $resource->os) }}"></td>
                <td><input type="text" name="location" value="{{ old('location', $resource->location) }}"></td>
                <td><input type="text" name="status" value="{{ old('status', $resource->status) }}"></td>
                <td><input type="number" name="quantity_available" value="{{ old('quantity_available', $resource->quantity_available) }}"></td>
                <td><input type="text" name="description" value="{{ old('description', $resource->description) }}"></td>
                <td><button class="btn" type="submit">Valider</button></td>
            </tr>
        </table>
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
        @endif
    </form>
    @endif
    @if($type === 'vm')
    <form action="{{route('validate-modification', ['type' => 'vm','id' => $resource->id])}}" method="post">
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
                <td><input type="text" name="name" value="{{ old('name', $resource->name) }}"></td>
                <td><input type="number" name="cpu" value="{{ old('cpu', $resource->cpu) }}"></td>
                <td><input type="number" name="ram" value="{{ old('ram', $resource->ram) }}"></td>
                <td><input type="number" name="storage" value="{{ old('storage', $resource->storage) }}"></td>
                <td><input type="text" name="storage_type" value="{{ old('storage_type', $resource->storage_type) }}"></td>
                <td><input type="text" name="os" value="{{ old('os', $resource->os) }}"></td>
                <td><input type="text" name="ip_address" value="{{ old('ip_address', $resource->ip_address) }}"></td>
                <td><input type="text" name="server_hote" value="{{ old('server_hote', $resource->server_hote) }}"></td>
                <td><input type="text" name="status" value="{{ old('status', $resource->status) }}"></td>
                <td><input type="number" name="quantity_available" value="{{ old('quantity_available', $resource->quantity_available) }}"></td>
                <td><input type="text" name="description" value="{{ old('description', $resource->description) }}"></td>
                <td><button class="btn" type="submit">Valider</button></td>
            </tr>
        </table>
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
        @endif
    </form>
    @endif
    @if($type === 'network')
    <form action="{{route('validate-modification', ['type' => 'network','id' => $resource->id])}}" method="post">
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
                <td><input type="text" name="name" value="{{ old('name', $resource->name) }}"></td>
                <td><input type="text" name="brand" value="{{ old('brand', $resource->brand) }}"></td>
                <td><input type="text" name="type" value="{{ old('type', $resource->type) }}"></td>
                <td><input type="text" name="model" value="{{ old('model', $resource->model) }}"></td>
                <td><input type="text" name="port_number" value="{{ old('port_number', $resource->port_number) }}"></td>
                <td><input type="text" name="speed" value="{{ old('speed', $resource->speed) }}"></td>
                <td><input type="text" name="status" value="{{ old('status', $resource->status) }}"></td>
                <td><input type="number" name="quantity_available" value="{{ old('quantity_available', $resource->quantity_available) }}"></td>
                <td><input type="text" name="description" value="{{ old('description', $resource->description) }}"></td>
                <td><button class="btn" type="submit">Valider</button></td>
            </tr>
        </table>
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
        @endif
    </form>
    @endif
    @if($type === 'storage')
    <form action="{{route('validate-modification', ['type' => 'storage','id' => $resource->id])}}" method="post">
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
                <td><input type="text" name="name" value="{{ old('name', $resource->name) }}"></td>
                <td><input type="text" name="brand" value="{{ old('brand', $resource->brand) }}"></td>
                <td><input type="text" name="capacity" value="{{ old('capacity', $resource->capacity) }}"></td>
                <td><input type="text" name="type" value="{{ old('type', $resource->type) }}"></td>
                <td><input type="text" name="speed" value="{{ old('speed', $resource->speed) }}"></td>
                <td><input type="text" name="status" value="{{ old('status', $resource->status) }}"></td>
                <td><input type="text" name="quantity_available" value="{{ old('quantity_available', $resource->quantity_available) }}"></td>
                <td><input type="text" name="description" value="{{ old('description', $resource->description) }}"></td>
                <td><button class="btn" type="submit">Valider</button></td>
            </tr>
        </table>
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
        @endif
    </form>
    @endif

</body>

</html>