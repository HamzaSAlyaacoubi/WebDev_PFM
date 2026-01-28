<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\Reclamation;
use App\Models\Reservation;
use App\Models\ReservationsHistory;
use App\Models\ResourceCategory;
use App\Models\Servers;
use App\Models\Storage;
use App\Models\VirtualMachines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponsableController extends Controller
{
    function afficherResources()
    {
        // Selection all resources
        $servers = Servers::all();
        $virtualMachines = VirtualMachines::all();
        $networks = Network::all();
        $storages = Storage::all();

        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);
        $brands = $resources->pluck('brand')->filter()->unique()->values();

        return view('Responsable.responsable', compact('resources', 'brands'));
    }

    function search(Request $request)
    {
        // Selection all resources
        $servers = Servers::all();
        $virtualMachines = VirtualMachines::all();
        $networks = Network::all();
        $storages = Storage::all();

        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);

        if ($request->filled('search')) {
            $resources = $resources->filter(function ($ressource) use ($request) {
                return str_contains(strtolower($ressource->name), strtolower($request->search));
            });
        }

        $brands = $resources->pluck('brand')->filter()->unique()->values();

        if ($request->filled('brand') && $request->brand !== 'all') {
            $resources = $resources->where('brand', $request->brand);
        }


        return view('Responsable.responsable', compact('resources', 'brands'));
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
            $valideted['id_category'] = $id;
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
            $valideted['id_category'] = $id;
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
            $valideted['id_category'] = $id;
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

            $valideted['id_category'] = $id;
            Storage::create($valideted);
        }

        return redirect()->route('responsable')->with('success', 'Modification avec succes');
    }

    function displayReservations()
    {
        // Id Responsable
        $id_responsable = Auth::id();
        $id_category_responsable = Auth::user()->id_category;

        // Selection all resources
        $servers = Servers::where('id_category', $id_category_responsable)->get();
        $virtualMachines = VirtualMachines::where('id_category', $id_category_responsable)->get();
        $networks = Network::where('id_category', $id_category_responsable)->get();
        $storages = Storage::where('id_category', $id_category_responsable)->get();
        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);


        // Selection all reservations
        $reservations = Reservation::where('id_category',  $id_category_responsable)->get();
        $currentReservationsCount = Reservation::where('id_category', $id_category_responsable)->count();
        $totalReservationsCount = ReservationsHistory::where('id_responsable', $id_responsable)->count() + $currentReservationsCount;
        $reservationsAccepted = ReservationsHistory::where('id_responsable', $id_responsable)->where('status', 'accepted')->count();
        $reservationsRefused = ReservationsHistory::where('id_responsable', $id_responsable)->where('status', 'rejected')->count();

        return view('Responsable.reservations', compact(
            'reservations',
            'resources',
            'currentReservationsCount',
            'totalReservationsCount',
            'reservationsAccepted',
            'reservationsRefused'
        ));
    }

    function displayHistory()
    {
        $id_responsable = Auth::id();
        $id_category_responsable = Auth::user()->id_category;

        // Selection all resources
        $servers = Servers::where('id_category', $id_category_responsable)->get();
        $virtualMachines = VirtualMachines::where('id_category', $id_category_responsable)->get();
        $networks = Network::where('id_category', $id_category_responsable)->get();
        $storages = Storage::where('id_category', $id_category_responsable)->get();
        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);


        $totalReservationsCount = ReservationsHistory::where('id_responsable', $id_responsable)->count();
        $reservationsAccepted = ReservationsHistory::where('id_responsable', $id_responsable)->where('status', 'accepted')->count();
        $reservationsRefused = ReservationsHistory::where('id_responsable', $id_responsable)->where('status', 'rejected')->count();

        $reservations = ReservationsHistory::where('id_category', $id_category_responsable)->get();
        return view('Responsable.history', compact('resources', 'reservations', 'totalReservationsCount', 'reservationsAccepted', 'reservationsRefused'));
    }

    function displayReclamations()
    {
        $id_category_responsable = Auth::user()->id_category;
        // Selection all resources
        $servers = Servers::where('id_category', $id_category_responsable)->get();
        $virtualMachines = VirtualMachines::where('id_category', $id_category_responsable)->get();
        $networks = Network::where('id_category', $id_category_responsable)->get();
        $storages = Storage::where('id_category', $id_category_responsable)->get();
        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);

        $reclamations = Reclamation::whereHas('history', function ($query) {
            $query->where('id_category', Auth::user()->id_category);
        })->get();
        return view('Responsable.reclamations', compact('reclamations', 'resources'));
    }

    function displaySupport()
    {
        return view('Responsable.support');
    }
}
