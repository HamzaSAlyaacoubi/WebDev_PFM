<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsable</title>
    <!-- <link rel="stylesheet" href="hometech.css"> -->
    @vite('resources/css/responsable.css')
    @vite('resources/js/responsable.js')
</head>

<body>
    @include('include.responsableHeader')


    <main>


        <!-- <div id="h2"><span>Welcome <br><br>Mr.{{auth()->user()->name}} Vous etes maintenant responsable</span></div> -->

        <div class="content-section" id="ressources">
            <!-- Liste des ressources disponible -->


            <h2>Responsable des {{Auth::user()->category}}</h2>
            <!-- affichage des ressources -->
            @if(Auth::user()->category == 'Servers')
            <div class="resource-table" id="servers">
                @include('include.responsableSearch')
                <table>
                    <thead>
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
                    </thead>
                    @foreach($resources as $resource)
                    @if($resource->id_category == 1)
                    <tbody id="servers-body">
                        <tr>
                            <td>{{$resource->name}}</td>
                            <td>{{$resource->brand}}</td>
                            <td>{{$resource->cpu}}</td>
                            <td>{{$resource->ram}}</td>
                            <td>{{$resource->storage}}</td>
                            <td>{{$resource->storage_type}}</td>
                            <td>{{$resource->os}}</td>
                            <td>{{$resource->location}}</td>
                            <td><span class="status active">{{$resource->status}}</span></td>
                            <td>{{$resource->quantity_available}}</td>
                            <td>{{$resource->description}}</td>
                            <td><button data-target="modify-server" data-id="{{ $resource->id }}"
                                    data-name="{{ $resource->name }}"
                                    data-brand="{{ $resource->brand }}"
                                    data-cpu="{{ $resource->cpu }}"
                                    data-ram="{{ $resource->ram }}"
                                    data-storage="{{ $resource->storage }}"
                                    data-storage_type="{{ $resource->storage_type }}"
                                    data-os="{{ $resource->os }}"
                                    data-location="{{ $resource->location }}"
                                    data-status="{{ $resource->status }}"
                                    data-quantity="{{ $resource->quantity_available }}"
                                    data-description="{{ $resource->description }}"
                                    data-action="{{ route('validate-modification', ['type' => 'server', 'id' => $resource->id]) }}" class="modify-btn">Modifier</button></td>
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
            @endif
            @if(Auth::user()->category == 'Virtual Machines')
            <div class="resource-table" id="virtualMachines">
                @include('include.responsableSearch')
                <table>
                    <thead>
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
                    </thead>
                    @foreach($resources as $resource)
                    @if($resource->id_category == 2)
                    <tbody id="virtualMachines-body">
                        <tr>
                            <td>{{$resource->name}}</td>
                            <td>{{$resource->cpu}}</td>
                            <td>{{$resource->ram}}</td>
                            <td>{{$resource->storage}}</td>
                            <td>{{$resource->storage_type}}</td>
                            <td>{{$resource->os}}</td>
                            <td>{{$resource->ip_address}}</td>
                            <td>{{$resource->server_hote}}</td>
                            <td><span class="status active">{{$resource->status}}</span></td>
                            <td>{{$resource->quantity_available}}</td>
                            <td>{{$resource->description}}</td>
                            <td><button data-target="modify-vm"
                                    data-id="{{ $resource->id }}"
                                    data-name="{{ $resource->name }}"
                                    data-cpu="{{ $resource->cpu }}"
                                    data-ram="{{ $resource->ram }}"
                                    data-storage="{{ $resource->storage }}"
                                    data-storage_type="{{ $resource->storage_type }}"
                                    data-os="{{ $resource->os }}"
                                    data-ip="{{ $resource->ip_address }}"
                                    data-server="{{ $resource->server_hote }}"
                                    data-status="{{ $resource->status }}"
                                    data-quantity="{{ $resource->quantity_available }}"
                                    data-description="{{ $resource->description }}"
                                    data-action="{{ route('validate-modification', ['type' => 'vm', 'id' => $resource->id]) }}" class="modify-btn">Modifier</button></td>
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
            @endif
            @if(Auth::user()->category == 'Networking equipment')
            <div class="resource-table" id="networks">
                @include('include.responsableSearch')
                <table>
                    <thead>
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
                    </thead>
                    @foreach($resources as $resource)
                    @if($resource->id_category == 3)
                    <tbody id="networks-body">
                        <tr>
                            <td>{{$resource->name}}</td>
                            <td>{{$resource->brand}}</td>
                            <td>{{$resource->type}}</td>
                            <td>{{$resource->model}}</td>
                            <td>{{$resource->port_number}}</td>
                            <td>{{$resource->speed}}</td>
                            <td><span class="status active">{{$resource->status}}</span></td>
                            <td>{{$resource->quantity_available}}</td>
                            <td>{{$resource->description}}</td>
                            <td><button data-target="modify-network" data-target="modify-network"
                                    data-id="{{ $resource->id }}"
                                    data-name="{{ $resource->name }}"
                                    data-brand="{{ $resource->brand }}"
                                    data-type="{{ $resource->type }}"
                                    data-model="{{ $resource->model }}"
                                    data-port="{{ $resource->port_number }}"
                                    data-speed="{{ $resource->speed }}"
                                    data-status="{{ $resource->status }}"
                                    data-quantity="{{ $resource->quantity_available }}"
                                    data-description="{{ $resource->description }}"
                                    data-action="{{ route('validate-modification', ['type' => 'network', 'id' => $resource->id]) }}" class="modify-btn">Modifier</button></td>
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
            @endif
            @if(Auth::user()->category == 'Storage')
            <div class="resource-table" id="storages">
                @include('include.responsableSearch')
                <table>
                    <thead>
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
                    </thead>
                    @foreach($resources as $resource)
                    @if($resource->id_category == 4)
                    <tbody id="storages-body">
                        <tr>
                            <td>{{$resource->name}}</td>
                            <td>{{$resource->brand}}</td>
                            <td>{{$resource->capacity}}</td>
                            <td>{{$resource->type}}</td>
                            <td>{{$resource->speed}}</td>
                            <td><span class="status active">{{$resource->status}}</span></td>
                            <td>{{$resource->quantity_available}}</td>
                            <td>{{$resource->description}}</td>
                            <td><button data-target="modify-storage" data-target="modify-storage"
                                    data-id="{{ $resource->id }}"
                                    data-name="{{ $resource->name }}"
                                    data-brand="{{ $resource->brand }}"
                                    data-capacity="{{ $resource->capacity }}"
                                    data-type="{{ $resource->type }}"
                                    data-speed="{{ $resource->speed }}"
                                    data-status="{{ $resource->status }}"
                                    data-quantity="{{ $resource->quantity_available }}"
                                    data-description="{{ $resource->description }}"
                                    data-action="{{ route('validate-modification', ['type' => 'storage', 'id' => $resource->id]) }}" class="modify-btn">Modifier</button></td>
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
            @endif

            <!-- modification des resources -->
            <div class="modify-div table-box" id="modify-server">
                <form class="modify-form" id="modify-server-form" method="post">
                    @csrf
                    <h1>Modification</h1>
                    <input type="hidden" name="id" id="server-id">
                    <label for="server-name">Nom</label>
                    <input type="text" name="name" id="server-name">

                    <label for="server-brand">Brand</label>
                    <input type="text" name="brand" id="server-brand">

                    <label for="server-cpu">CPU</label>
                    <input type="number" name="cpu" id="server-cpu">

                    <label for="server-ram">RAM</label>
                    <input type="number" name="ram" id="server-ram">

                    <label for="server-storage">Stockage</label>
                    <input type="number" name="storage" id="server-storage">

                    <label for="server-storage-type">Type de Stockage</label>
                    <input type="text" name="storage_type" id="server-storage-type">

                    <label for="server-os">OS</label>
                    <input type="text" name="os" id="server-os">

                    <label for="server-location">Location</label>
                    <input type="text" name="location" id="server-location">

                    <label for="server-status">Status</label>
                    <input type="text" name="status" id="server-status">

                    <label for="server-quantity">Quantité</label>
                    <input type="number" name="quantity_available" id="server-quantity">

                    <label for="server-description">Description</label>
                    <input type="text" name="description" id="server-description">

                    <button class="btn" type="submit">Valider</button>
                    <button class="btn cancel-btn">Annuler</button>

                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                    @endif
                </form>
            </div>
            <div class="modify-div table-box" id="modify-vm">
                <form class="modify-form" id="modify-vm-form" method="post">
                    @csrf
                    <h1>Modification</h1>
                    <input type="hidden" name="id" id="vm-id">

                    <label for="vm-name">Nom</label>
                    <input type="text" name="name" id="vm-name">

                    <label for="vm-cpu">CPU</label>
                    <input type="number" name="cpu" id="vm-cpu">

                    <label for="vm-ram">RAM</label>
                    <input type="number" name="ram" id="vm-ram">

                    <label for="vm-storage">Stockage</label>
                    <input type="number" name="storage" id="vm-storage">

                    <label for="vm-storage-type">Type de Stockage</label>
                    <input type="text" name="storage_type" id="vm-storage-type">

                    <label for="vm-os">OS</label>
                    <input type="text" name="os" id="vm-os">

                    <label for="vm-ip">IP Address</label>
                    <input type="text" name="ip_address" id="vm-ip">

                    <label for="vm-server">Serveur Hôte</label>
                    <input type="text" name="server_hote" id="vm-server">

                    <label for="vm-status">Status</label>
                    <input type="text" name="status" id="vm-status">

                    <label for="vm-quantity">Quantité</label>
                    <input type="number" name="quantity_available" id="vm-quantity">

                    <label for="vm-description">Description</label>
                    <input type="text" name="description" id="vm-description">

                    <button class="btn" type="submit">Valider</button>
                    <button class="btn cancel-btn">Annuler</button>

                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                    @endif
                </form>
            </div>
            <div class="modify-div table-box" id="modify-network">
                <form class="modify-form" id="modify-network-form" method="post">
                    @csrf
                    <h1>Modification</h1>
                    <input type="hidden" name="id" id="network-id">
                    <label for="network-name">Nom</label>
                    <input type="text" name="name" id="network-name">

                    <label for="network-brand">Brand</label>
                    <input type="text" name="brand" id="network-brand">

                    <label for="network-type">Type</label>
                    <input type="text" name="type" id="network-type">

                    <label for="network-model">Model</label>
                    <input type="text" name="model" id="network-model">

                    <label for="network-port">Port Number</label>
                    <input type="number" name="port_number" id="network-port">

                    <label for="network-speed">Speed</label>
                    <input type="text" name="speed" id="network-speed">

                    <label for="network-status">Status</label>
                    <input type="text" name="status" id="network-status">

                    <label for="network-quantity">Quantité</label>
                    <input type="number" name="quantity_available" id="network-quantity">

                    <label for="network-description">Description</label>
                    <input type="text" name="description" id="network-description">

                    <button class="btn" type="submit">Valider</button>
                    <button class="btn cancel-btn">Annuler</button>

                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                    @endif
                </form>
            </div>
            <div class="modify-div table-box" id="modify-storage">
                <form class="modify-form" id="modify-storage-form" method="post">
                    @csrf
                    <h1>Modification</h1>
                    <input type="hidden" name="id" id="storage-id">
                    <label for="storage-name">Nom</label>
                    <input type="text" name="name" id="storage-name">

                    <label for="storage-brand">Brand</label>
                    <input type="text" name="brand" id="storage-brand">

                    <label for="storage-capacity">Capacity</label>
                    <input type="text" name="capacity" id="storage-capacity">

                    <label for="storage-type">Type</label>
                    <input type="text" name="type" id="storage-type">

                    <label for="storage-speed">Speed</label>
                    <input type="text" name="speed" id="storage-speed">

                    <label for="storage-status">Status</label>
                    <input type="text" name="status" id="storage-status">

                    <label for="storage-quantity">Quantité</label>
                    <input type="number" name="quantity_available" id="storage-quantity">

                    <label for="storage-description">Description</label>
                    <input type="text" name="description" id="storage-description">

                    <button class="btn" type="submit">Valider</button>
                    <button class="btn cancel-btn">Annuler</button>

                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                    @endif
                </form>
            </div>
        </div>
    </main>

</body>

</html>