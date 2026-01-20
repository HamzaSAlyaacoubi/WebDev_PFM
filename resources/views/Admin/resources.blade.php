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
    <header>
        <span>ᔕEᖇᐯE</span>

        <nav>
            <ul>
                <li><a href="{{route('responsable')}}">Ressources</a></li>
                <li><a href="{{route('responsable.reservations')}}">Reservations</a></li>
                <li><a href="{{route('responsable.hitory')}}">Historique</a></li>
                <li><a href="{{route('responsable.reclamations')}}">Reclamations</a></li>
                <li><a href="{{route('responsable.support')}}">Support</a></li>
            </ul>
        </nav>

        <a href="{{route('logout')}}">Se deconnecter</a>
    </header>


    <main>
        <fieldset>
            <form method="GET" action="{{ route('responsable.search') }}">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher">
                <select name="brand">
                    <option value="">All brands</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                        {{ $brand }}
                    </option>
                    @endforeach
                </select>
                <button type="submit">Search</button>
            </form>

        </fieldset>

        <!-- <div id="h2"><span>Welcome <br><br>Mr.{{auth()->user()->name}} Vous etes maintenant responsable</span></div> -->

        <div class="content-section" id="ressources">
            <!-- Liste des ressources disponible -->
            <ul class="resources-menu">
                <li class="active-resource" data-target="servers">Servers</li>
                <li data-target="virtualMachines">Virtual Machines</li>
                <li data-target="networks">Networks</li>
                <li data-target="storages">Storages</li>
            </ul>

            <!-- affichage des ressources -->
            <div class="resource-table active" id="servers">
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
                    @if($resource->id_categorie == 1)
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
            <div class="resource-table" id="virtualMachines">
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
                    @if($resource->id_categorie == 2)
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
            <div class="resource-table" id="networks">
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
                    @if($resource->id_categorie == 3)
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
            <div class="resource-table" id="storages">
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
                    @if($resource->id_categorie == 4)
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

            <!-- modification des resources -->
            <div class="modify-form table-box" id="modify-server">
                <form id="modify-server-form" method="post">
                    @csrf
                    <h1>Serveur</h1>
                    <input type="hidden" name="id" id="server-id">
                    <table>
                        <tr>
                            <th>Nom</th>
                            <td><input type="text" name="name" id="server-name"></td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td><input type="text" name="brand" id="server-brand"></td>
                        </tr>
                        <tr>
                            <th>CPU</th>
                            <td><input type="number" name="cpu" id="server-cpu"></td>
                        </tr>
                        <tr>
                            <th>RAM</th>
                            <td><input type="number" name="ram" id="server-ram"></td>
                        </tr>
                        <tr>
                            <th>Stockage</th>
                            <td><input type="number" name="storage" id="server-storage"></td>
                        </tr>
                        <tr>
                            <th>Type de Stockage</th>
                            <td><input type="text" name="storage_type" id="server-storage-type"></td>
                        </tr>
                        <tr>
                            <th>OS</th>
                            <td><input type="text" name="os" id="server-os"></td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td><input type="text" name="location" id="server-location"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><input type="text" name="status" id="server-status"></td>
                        </tr>
                        <tr>
                            <th>Quantité</th>
                            <td><input type="number" name="quantity_available" id="server-quantity"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><input type="text" name="description" id="server-description"></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><button class="btn" type="submit">Valider</button><button class="cancel-btn btn">Annuler</button></td>
                        </tr>
                    </table>

                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                    @endif
                </form>
            </div>
            <div class="modify-form table-box" id="modify-vm">
                <form id="modify-vm-form" method="post">
                    @csrf
                    <h1>Virtual Machine</h1>
                    <input type="hidden" name="id" id="vm-id">
                    <table>
                        <tr>
                            <th>Nom</th>
                            <td><input type="text" name="name" id="vm-name"></td>
                        </tr>
                        <tr>
                            <th>Cpu</th>
                            <td><input type="number" name="cpu" id="vm-cpu"></td>
                        </tr>
                        <tr>
                            <th>Ram</th>
                            <td><input type="number" name="ram" id="vm-ram"></td>
                        </tr>
                        <tr>
                            <th>Stockage</th>
                            <td><input type="number" name="storage" id="vm-storage"></td>
                        </tr>
                        <tr>
                            <th>Type de Stockage</th>
                            <td><input type="text" name="storage_type" id="vm-storage-type"></td>
                        </tr>
                        <tr>
                            <th>OS</th>
                            <td><input type="text" name="os" id="vm-os"></td>
                        </tr>
                        <tr>
                            <th>IP Address</th>
                            <td><input type="text" name="ip_address" id="vm-ip"></td>
                        </tr>
                        <tr>
                            <th>Serveur Hote</th>
                            <td><input type="text" name="server_hote" id="vm-server"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><input type="text" name="status" id="vm-status"></td>
                        </tr>
                        <tr>
                            <th>Quantite</th>
                            <td><input type="number" name="quantity_available" id="vm-quantity"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><input type="text" name="description" id="vm-description"></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><button class="btn" type="submit">Valider</button><button class="cancel-btn btn">Annuler</button></td>
                        </tr>
                    </table>
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                    @endif
                </form>
            </div>
            <div class="modify-form table-box" id="modify-network">
                <form id="modify-network-form" method="post">
                    @csrf
                    <h1>Network</h1>
                    <input type="hidden" name="id" id="network-id">
                    <table>
                        <tr>
                            <th>Nom</th>
                            <td><input type="text" name="name" id="network-name"></td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td><input type="text" name="brand" id="network-brand"></td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td><input type="text" name="type" id="network-type"></td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td><input type="text" name="model" id="network-model"></td>
                        </tr>
                        <tr>
                            <th>Port Number</th>
                            <td><input type="number" name="port_number" id="network-port"></td>
                        </tr>
                        <tr>
                            <th>Speed</th>
                            <td><input type="text" name="speed" id="network-speed"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><input type="text" name="status" id="network-status"></td>
                        </tr>
                        <tr>
                            <th>Quantite</th>
                            <td><input type="number" name="quantity_available" id="network-quantity"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><input type="text" name="description" id="network-description"></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><button class="btn" type="submit">Valider</button><button class="cancel-btn btn">Annuler</button></td>
                        </tr>
                    </table>
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                    @endif
                </form>
            </div>
            <div class="modify-form table-box" id="modify-storage">
                <form id="modify-storage-form" method="post">
                    @csrf
                    <h1>Storage</h1>
                    <input type="hidden" name="id" id="storage-id">
                    <table>
                        <tr>
                            <th>Nom</th>
                            <td><input type="text" name="name" id="storage-name"></td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td><input type="text" name="brand" id="storage-brand"></td>
                        </tr>
                        <tr>
                            <th>Capacity</th>
                            <td><input type="text" name="capacity" id="storage-capacity"></td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td><input type="text" name="type" id="storage-type"></td>
                        </tr>
                        <tr>
                            <th>Speed</th>
                            <td><input type="text" name="speed" id="storage-speed"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><input type="text" name="status" id="storage-status"></td>
                        </tr>
                        <tr>
                            <th>Quantite</th>
                            <td><input type="number" name="quantity_available" id="storage-quantity"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><input type="text" name="description" id="storage-description"></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><button class="btn" type="submit">Valider</button><button class="cancel-btn btn">Annuler</button></td>
                        </tr>
                    </table>
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