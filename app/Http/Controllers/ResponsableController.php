<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\ResourceCategory;
use App\Models\Servers;
use App\Models\Storage;
use App\Models\VirtualMachines;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    function afficherResources()
    {
        $servers = Servers::all();
        $virtualMachines = VirtualMachines::all();
        $networks = Network::all();
        $storages = Storage::all();

        return view('Responsable.responsable', compact('servers', 'virtualMachines', 'networks', 'storages'));
    }

    function modifyResource($type, $id)
    {
        $type = $type;
        if ($type === 'server') {
            $resource = Servers::where('id', $id)->first();
        }
        if ($type === 'vm') {
            $resource = VirtualMachines::where('id', $id)->first();
        }
        if ($type === 'network') {
            $resource = Network::where('id', $id)->first();
        }
        if ($type === 'storage') {
            $resource = Storage::where('id', $id)->first();
        }
        return view('Responsable.modifier', compact('resource', 'type'));
    }


    function validateModification(Request $request, $type, $id)
    {
        if ($type === 'server') {
            $valideted = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'cpu' => 'required|numeric',
                'ram' => 'required|numeric',
                'storage' => 'required',
                'storage_type' => 'required',
                'os' => 'required',
                'location' => 'required',
                'status' => 'required',
                'quantity_available' => 'required|numeric',
                'description' => 'nullable',
            ]);
            $resource = Servers::findOrFail($id);
            $resource->update($valideted);
        }
        if ($type === 'vm') {
            $valideted = $request->validate([
                'name' => 'required',
                'cpu' => 'required|numeric',
                'ram' => 'required|numeric',
                'storage' => 'required',
                'storage_type' => 'required',
                'os' => 'required',
                'ip_address' => 'required',
                'server_hote' => 'required',
                'status' => 'required',
                'quantity_available' => 'required|numeric',
                'description' => 'nullable',
            ]);
            $resource = VirtualMachines::findOrFail($id);
            $resource->update($valideted);
        }
        if ($type === 'network') {
            $valideted = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'type' => 'required',
                'model' => 'required',
                'port_number' => 'required|numeric',
                'speed' => 'required',
                'status' => 'required',
                'quantity_available' => 'required|numeric',
                'description' => 'nullable',
            ]);
            $resource = Network::findOrFail($id);
            $resource->update($valideted);
        }
        if ($type === 'storage') {
            $valideted = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'capacity' => 'required',
                'type' => 'required',
                'speed' => 'required',
                'status' => 'required',
                'quantity_available' => 'required|numeric',
                'description' => 'nullable',
            ]);
            $resource = Storage::findOrFail($id);
            $resource->update($valideted);
        }
        return redirect()->route('responsable')->with('success', 'Modification avec succes');
    }

    function createResource($type)
    {
        return view('Responsable.create', compact('type'));
    }
    function validateCreation(Request $request, $type)
    {
        if ($type === 'server') {
            $id = ResourceCategory::where('name', 'Servers')->value('id');
            $valideted = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'cpu' => 'required|numeric',
                'ram' => 'required|numeric',
                'storage' => 'required',
                'storage_type' => 'required',
                'os' => 'required',
                'location' => 'required',
                'status' => 'required',
                'quantity_available' => 'required|numeric',
                'description' => 'nullable',
            ]);
            $valideted['id_categorie'] = $id;
            Servers::create($valideted);
        }
        if ($type === 'vm') {
            $id = ResourceCategory::where('name', 'Virtual Machines')->value('id');
            $valideted = $request->validate([
                'name' => 'required',
                'cpu' => 'required|numeric',
                'ram' => 'required|numeric',
                'storage' => 'required',
                'storage_type' => 'required',
                'os' => 'required',
                'ip_address' => 'required',
                'server_hote' => 'required',
                'status' => 'required',
                'quantity_available' => 'required|numeric',
                'description' => 'nullable',
            ]);
            $valideted['id_categorie'] = $id;
            VirtualMachines::create($valideted);
        }
        if ($type === 'network') {
            $id = ResourceCategory::where('name', 'Networking equipment')->value('id');
            $valideted = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'type' => 'required',
                'model' => 'required',
                'port_number' => 'required|numeric',
                'speed' => 'required',
                'status' => 'required',
                'quantity_available' => 'required|numeric',
                'description' => 'nullable',
            ]);
            $valideted['id_categorie'] = $id;
            Network::create($valideted);
        }
        if ($type === 'storage') {
            $id = ResourceCategory::where('name', 'Storage')->value('id');
            $valideted = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'capacity' => 'required',
                'type' => 'required',
                'speed' => 'required',
                'status' => 'required',
                'quantity_available' => 'required|numeric',
                'description' => 'nullable',
            ]);

            $valideted['id_categorie'] = $id;
            Storage::create($valideted);
        }

        return redirect()->route('responsable')->with('success', 'Modification avec succes');
    }
}
