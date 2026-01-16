<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    @vite('resources/css/responsable.css')
    @vite('resources/js/responsable.js')
</head>

<body>
    <div class="container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <h2 class="logo">ᔕEᖇᐯE</h2>

            <ul class="menu">
                <li class="active" data-target="dashboard">Dashboard</li>
                <li data-target="resource">Resource</li>
                <li data-target="customers">Customers</li>
                <li data-target="income">Income</li>
                <li data-target="promote">Promote</li>
                <li data-target="help">Help</li>
                <li><a href="{{route('logout')}}" class="btn"><button>Logout</button></a></li>
            </ul>

            <div class="upgrade">
                <p>Upgrade to PRO<br />to get access all Features!</p>
                <button>Get Pro Now</button>
            </div>

            <div class="user">
                <img src="https://i.pravatar.cc/40" alt="user" />
                <div>
                    <strong>Evano</strong>
                    <span>Project Manager</span>
                </div>
            </div>
        </aside>

        <!-- MAIN -->
        <main class="main">
            <!-- Dashboard Section -->
            <div class="content-section active" id="dashboard">
                <h1>Hello Evano 👋</h1>
                <div class="stats">
                    <div class="card">
                        <p>Total Customers</p>
                        <h2>5,423</h2>
                        <span class="green">+16% this month</span>
                    </div>
                    <div class="card">
                        <p>Members</p>
                        <h2>1,893</h2>
                        <span class="red">-1% this month</span>
                    </div>
                    <div class="card">
                        <p>Active Now</p>
                        <h2>189</h2>
                    </div>
                </div>
            </div>

            <!-- Resource Section -->
            <div class="content-section" id="resource">
                <h1>All Resources</h1>
                <ul class="resources-menu">
                    <li class="active-resource" data-target="servers">Servers</li>
                    <li data-target="virtualMachines">virtualMachines</li>
                    <li data-target="networks">Networks</li>
                    <li data-target="storages">Storages</li>
                </ul>
                <div class="table-box resource-table active" id="servers">
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
                        <tbody>
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
                                <td><span class="status active">{{$server->status}}</span></td>
                                <td>{{$server->quantity_available}}</td>
                                <td>{{$server->description}}</td>
                                <td><button data-target="modify-server" data-id="{{ $server->id }}"
                                        data-name="{{ $server->name }}"
                                        data-brand="{{ $server->brand }}"
                                        data-cpu="{{ $server->cpu }}"
                                        data-ram="{{ $server->ram }}"
                                        data-storage="{{ $server->storage }}"
                                        data-storage_type="{{ $server->storage_type }}"
                                        data-os="{{ $server->os }}"
                                        data-location="{{ $server->location }}"
                                        data-status="{{ $server->status }}"
                                        data-quantity="{{ $server->quantity_available }}"
                                        data-description="{{ $server->description }}"
                                        data-action="{{ route('validate-modification', ['type' => 'server', 'id' => $server->id]) }}" class="modify-btn">Modifier</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-box resource-table" id="virtualMachines">
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
                            <td><span class="status active">{{$vm->status}}</span></td>
                            <td>{{$vm->quantity_available}}</td>
                            <td>{{$vm->description}}</td>
                            <td><button data-target="modify-vm" data-target="modify-vm"
                                    data-id="{{ $vm->id }}"
                                    data-name="{{ $vm->name }}"
                                    data-cpu="{{ $vm->cpu }}"
                                    data-ram="{{ $vm->ram }}"
                                    data-storage="{{ $vm->storage }}"
                                    data-storage_type="{{ $vm->storage_type }}"
                                    data-os="{{ $vm->os }}"
                                    data-ip="{{ $vm->ip_address }}"
                                    data-server="{{ $vm->server_hote }}"
                                    data-status="{{ $vm->status }}"
                                    data-quantity="{{ $vm->quantity_available }}"
                                    data-description="{{ $vm->description }}"
                                    data-action="{{ route('validate-modification', ['type' => 'vm', 'id' => $vm->id]) }}" class="modify-btn">Modifier</button></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <div class="table-box resource-table" id="networks">
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
                            <td><span class="status active">{{$network->status}}</span></td>
                            <td>{{$network->quantity_available}}</td>
                            <td>{{$network->description}}</td>
                            <td><button data-target="modify-network" data-target="modify-network"
                                    data-id="{{ $network->id }}"
                                    data-name="{{ $network->name }}"
                                    data-brand="{{ $network->brand }}"
                                    data-type="{{ $network->type }}"
                                    data-model="{{ $network->model }}"
                                    data-port="{{ $network->port_number }}"
                                    data-speed="{{ $network->speed }}"
                                    data-status="{{ $network->status }}"
                                    data-quantity="{{ $network->quantity_available }}"
                                    data-description="{{ $network->description }}"
                                    data-action="{{ route('validate-modification', ['type' => 'network', 'id' => $network->id]) }}" class="modify-btn">Modifier</button></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <div class="table-box resource-table" id="storages">
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
                            <td><span class="status active">{{$storage->status}}</span></td>
                            <td>{{$storage->quantity_available}}</td>
                            <td>{{$storage->description}}</td>
                            <td><button data-target="modify-storage" data-target="modify-storage"
                                    data-id="{{ $storage->id }}"
                                    data-name="{{ $storage->name }}"
                                    data-brand="{{ $storage->brand }}"
                                    data-capacity="{{ $storage->capacity }}"
                                    data-type="{{ $storage->type }}"
                                    data-speed="{{ $storage->speed }}"
                                    data-status="{{ $storage->status }}"
                                    data-quantity="{{ $storage->quantity_available }}"
                                    data-description="{{ $storage->description }}"
                                    data-action="{{ route('validate-modification', ['type' => 'storage', 'id' => $storage->id]) }}" class="modify-btn">Modifier</button></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <!-- <div class="table-box resource-table active" id="servers">
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
                        <tbody>
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
                                <td><span class="status active">{{$server->status}}</span></td>
                                <td>{{$server->quantity_available}}</td>
                                <td>{{$server->description}}</td>
                                <td><a href="{{route('modify-resource', ['type' => 'server','id' => $server->id])}}" class="btn">Modifier</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-box resource-table" id="virtualMachines">
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
                            <td><span class="status active">{{$vm->status}}</span></td>
                            <td>{{$vm->quantity_available}}</td>
                            <td>{{$vm->description}}</td>
                            <td><a href="{{route('modify-resource', ['type' => 'vm','id' => $vm->id])}}" class=" btn">Modifier</a></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <div class="table-box resource-table" id="networks">
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
                            <td><span class="status active">{{$network->status}}</span></td>
                            <td>{{$network->quantity_available}}</td>
                            <td>{{$network->description}}</td>
                            <td><a href="{{route('modify-resource', ['type' => 'network','id' => $network->id])}}" class="btn">Modifier</a></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <div class="table-box resource-table" id="storages">
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
                            <td><span class="status active">{{$storage->status}}</span></td>
                            <td>{{$storage->quantity_available}}</td>
                            <td>{{$storage->description}}</td>
                            <td><a href="{{route('modify-resource', ['type' => 'storage','id' => $storage->id])}}" class="btn">Modifier</a></td>
                        </tr>
                        @endforeach

                    </table>
                </div> -->

                <div class="modify-form table-box" id="modify-server">
                    <form id="modify-server-form" method="post">
                        @csrf
                        <h1>Serveur</h1>
                        <input type="hidden" name="id" id="server-id">
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
                                <td><input type="text" name="name" id="server-name"></td>
                                <td><input type="text" name="brand" id="server-brand"></td>
                                <td><input type="number" name="cpu" id="server-cpu"></td>
                                <td><input type="number" name="ram" id="server-ram"></td>
                                <td><input type="number" name="storage" id="server-storage"></td>
                                <td><input type="text" name="storage_type" id="server-storage-type"></td>
                                <td><input type="text" name="os" id="server-os"></td>
                                <td><input type="text" name="location" id="server-location"></td>
                                <td><input type="text" name="status" id="server-status"></td>
                                <td><input type="number" name="quantity_available" id="server-quantity"></td>
                                <td><input type="text" name="description" id="server-description"></td>
                                <td><button class="btn" type="submit">Valider</button></td>
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
                                <td><input type="text" name="name" id="vm-name"></td>
                                <td><input type="number" name="cpu" id="vm-cpu"></td>
                                <td><input type="number" name="ram" id="vm-ram"></td>
                                <td><input type="number" name="storage" id="vm-storage"></td>
                                <td><input type="text" name="storage_type" id="vm-storage-type"></td>
                                <td><input type="text" name="os" id="vm-os"></td>
                                <td><input type="text" name="ip_address" id="vm-ip"></td>
                                <td><input type="text" name="server_hote" id="vm-server"></td>
                                <td><input type="text" name="status" id="vm-status"></td>
                                <td><input type="number" name="quantity_available" id="vm-quantity"></td>
                                <td><input type="text" name="description" id="vm-description"></td>
                                <td><button class="btn" type="submit">Valider</button></td>
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
                                <td><input type="text" name="name" id="network-name"></td>
                                <td><input type="text" name="brand" id="network-brand"></td>
                                <td><input type="text" name="type" id="network-type"></td>
                                <td><input type="text" name="model" id="network-model"></td>
                                <td><input type="number" name="port_number" id="network-port"></td>
                                <td><input type="text" name="speed" id="network-speed"></td>
                                <td><input type="text" name="status" id="network-status"></td>
                                <td><input type="number" name="quantity_available" id="network-quantity"></td>
                                <td><input type="text" name="description" id="network-description"></td>
                                <td><button class="btn" type="submit">Valider</button></td>
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
                                <td><button class="btn" type="submit">Valider</button></td>
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

            <!-- Customers Section -->
            <div class="content-section" id="customers">
                <h1>All Customers</h1>
                <div class="table-box">
                    <table>
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jane Cooper</td>
                                <td>Microsoft</td>
                                <td>(225) 555-0118</td>
                                <td>jane@microsoft.com</td>
                                <td>United States</td>
                                <td><span class="status active">Active</span></td>
                            </tr>
                            <tr>
                                <td>Floyd Miles</td>
                                <td>Yahoo</td>
                                <td>(205) 555-0100</td>
                                <td>floyd@yahoo.com</td>
                                <td>Kiribati</td>
                                <td><span class="status inactive">Inactive</span></td>
                            </tr>
                            <tr>
                                <td>Ronald Richards</td>
                                <td>Adobe</td>
                                <td>(302) 555-0107</td>
                                <td>ronald@adobe.com</td>
                                <td>Israel</td>
                                <td><span class="status inactive">Inactive</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Other Sections -->
            <div class="content-section" id="income">
                <h1>Income Section</h1>
                <p>Here you can view your income reports.</p>
            </div>
            <div class="content-section" id="promote">
                <h1>Promote Section</h1>
                <p>Marketing and promotion tools go here.</p>
            </div>
            <div class="content-section" id="help">
                <h1>Help Section</h1>
                <p>Support and FAQs.</p>
            </div>
        </main>
    </div>
</body>

</html>