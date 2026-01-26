<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\ReservationsHistory;
use App\Models\ResourceCategory;
use App\Models\Servers;
use App\Models\Storage;
use App\Models\User;
use App\Models\VirtualMachines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function displayStatistics()
    {
        return view('Admin.admin');
    }

    function displayUsers()
    {
        $users = User::all();
        $categories = ResourceCategory::all();
        return view('Admin.users', compact('users', 'categories'));
    }

    function displayResources()
    {
        // Selection all resources
        $servers = Servers::all();
        $virtualMachines = VirtualMachines::all();
        $networks = Network::all();
        $storages = Storage::all();

        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);
        $brands = $resources->pluck('brand')->filter()->unique()->values();

        return view('Admin.admin', compact('resources', 'brands'));
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
        return redirect()->route('admin')->with('success', 'Modification avec succes');
    }

    function createResource($type)
    {
        return view('Admin.create', compact('type'));
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

        return redirect()->route('admin')->with('success', 'Modification avec succes');
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


        return view('Admin.admin', compact('resources', 'brands'));
    }

    function displayHistory()
    {
        // Select all reservations history
        $reservations = ReservationsHistory::all();

        // Selection all resources
        $servers = Servers::all();
        $virtualMachines = VirtualMachines::all();
        $networks = Network::all();
        $storages = Storage::all();

        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);


        $totalReservationsCount = ReservationsHistory::count();
        $reservationsAccepted = ReservationsHistory::where('status', 'accepted')->count();
        $reservationsRefused = ReservationsHistory::where('status', 'rejected')->count();

        return view('Admin.history', compact('resources', 'reservations', 'totalReservationsCount', 'reservationsAccepted', 'reservationsRefused'));
    }

    function toResponsable($id)
    {
        $user = User::where('id', $id);
        $user->update([
            'type' => 'responsable'
        ]);

        return redirect()->intended(route('admin.users'));
    }

    function toUtilisateur($id)
    {

        $user = User::where('id', $id);
        $user->update([
            'type' => 'utilisateur'
        ]);
        return redirect()->intended(route('admin.users'));
    }

    function createResponsable(Request $request)
    {
        $responsable = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'category' => 'required'
        ]);

        $id_category = ResourceCategory::where('name', $request->category)->get()->value('id');
        $responsable['type'] = 'responsable';
        $responsable['id_category'] = $id_category;
        $responsable['password'] = Hash::make($request->password);

        User::create($responsable);

        return redirect()->route('admin.users');
    }
}
