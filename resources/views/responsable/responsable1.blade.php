<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsable</title>
    @vite('resources/css/responsable1.css')
</head>

<body>
    <div id="h2">
        <h1>Welcome <br><br>Mr.{{auth()->user()->name}} Vous etes maintenant responsable</span>
    </div>
    <br>

    <div id="ressources" class="ressources">
        @if(session()->has('success'))
        <h3>{{session('success')}}</h3>
        @endif


        <div id="serveurs">
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
                    <th><a href="{{route('create-resource',['type'=>'server'])}}" class="btn">Ajouter</a></th>
                </tr>
                @foreach($servers as $server)
                <tr>
                    <td>{{$server->name}}</td>
                    <td>{{$server->brand}}</td>
                    <td>{{$server->cpu}}</td>
                    <td>{{$server->ram}}</td>
                    <td>{{$server->storage}}</td>
                    <td>{{$server->storage_type}}</td>
                    <td>{{$server->os}}</td>
                    <td>{{$server->location}}</td>
                    <td>{{$server->status}}</td>
                    <td>{{$server->quantity_available}}</td>
                    <td>{{$server->description}}</td>
                    <td><a href="{{route('modify-resource', ['type' => 'server','id' => $server->id])}}" class="btn">Modifier</a></td>
                </tr>
                @endforeach

            </table>
        </div>
        <div id="virtualMachines">
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
                    <th><a href="{{route('create-resource',['type'=>'vm'])}}" class="btn">Ajouter</a></th>
                </tr>
                @foreach($virtualMachines as $vm)
                <tr>
                    <td>{{$vm->name}}</td>
                    <td>{{$vm->cpu}}</td>
                    <td>{{$vm->ram}}</td>
                    <td>{{$vm->storage}}</td>
                    <td>{{$vm->storage_type}}</td>
                    <td>{{$vm->os}}</td>
                    <td>{{$vm->ip_address}}</td>
                    <td>{{$vm->server_hote}}</td>
                    <td>{{$vm->status}}</td>
                    <td>{{$vm->quantity_available}}</td>
                    <td>{{$vm->description}}</td>
                    <td><a href="{{route('modify-resource', ['type' => 'vm','id' => $vm->id])}}" class=" btn">Modifier</a></td>
                </tr>
                @endforeach

            </table>
        </div>
        <div id="networks">
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
                    <th><a href="{{route('create-resource',['type'=>'network'])}}" class="btn">Ajouter</a></th>
                </tr>
                @foreach($networks as $network)
                <tr>
                    <td>{{$network->name}}</td>
                    <td>{{$network->brand}}</td>
                    <td>{{$network->type}}</td>
                    <td>{{$network->model}}</td>
                    <td>{{$network->port_number}}</td>
                    <td>{{$network->speed}}</td>
                    <td>{{$network->status}}</td>
                    <td>{{$network->quantity_available}}</td>
                    <td>{{$network->description}}</td>
                    <td><a href="{{route('modify-resource', ['type' => 'network','id' => $network->id])}}" class="btn">Modifier</a></td>
                </tr>
                @endforeach

            </table>
        </div>
        <div id="storages">
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
                    <th><a href="{{route('create-resource',['type'=>'storage'])}}" class="btn">Ajouter</a></th>
                </tr>
                @foreach($storages as $storage)
                <tr>
                    <td>{{$storage->name}}</td>
                    <td>{{$storage->brand}}</td>
                    <td>{{$storage->capacity}}</td>
                    <td>{{$storage->type}}</td>
                    <td>{{$storage->speed}}</td>
                    <td>{{$storage->status}}</td>
                    <td>{{$storage->quantity_available}}</td>
                    <td>{{$storage->description}}</td>
                    <td><a href="{{route('modify-resource', ['type' => 'storage','id' => $storage->id])}}" class="btn">Modifier</a></td>
                </tr>
                @endforeach

            </table>
        </div>

    </div>
    <a href="{{route('logout')}}" class="btn"><button>Logout</button></a>
</body>

</html>