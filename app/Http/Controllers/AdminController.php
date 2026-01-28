<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\ReservationsHistory;
use App\Models\ResourceCategory;
use App\Models\Servers;
use App\Models\Storage;
use App\Models\Support;
use App\Models\User;
use App\Models\VirtualMachines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function displayStatistics()
    {
        $servers = Servers::all();
        $virtualMachines = VirtualMachines::all();
        $networks = Network::all();
        $storages = Storage::all();

        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);

        /* occupation Global */
        $totalResources = 0;
        $usedResources = 0;
        foreach ($resources as $resource) {
            $totalResources += $resource->quantity_available;
        }
        foreach ($resources as $resource) {
            $usedResources += $resource->quantity_used;
        }
        $occupationGlobal = $usedResources / $totalResources * 100;

        /* occupation Serveur */
        $totalServers = 0;
        $usedServers = 0;
        foreach ($servers as $server) {
            $totalServers += $server->quantity_available;
        }
        foreach ($servers as $server) {
            $usedServers += $server->quantity_used;
        }
        $occupationServers = $usedServers / $totalServers * 100;

        /* occupation Vms */
        $totalVms = 0;
        $usedVms = 0;
        foreach ($virtualMachines as $vm) {
            $totalVms += $vm->quantity_available;
        }
        foreach ($virtualMachines as $vm) {
            $usedVms += $vm->quantity_used;
        }
        $occupationVms = $usedVms / $totalVms * 100;

        /* occupation Networks */
        $totalNetworks = 0;
        $usedNetworks = 0;
        foreach ($networks as $network) {
            $totalNetworks += $network->quantity_available;
        }
        foreach ($networks as $network) {
            $usedNetworks += $network->quantity_used;
        }
        $occupationNetworks = $usedNetworks / $totalNetworks * 100;

        /* occupation Storages */
        $totalStorages = 0;
        $usedStorages = 0;
        foreach ($storages as $storage) {
            $totalStorages += $storage->quantity_available;
        }
        foreach ($storages as $storage) {
            $usedStorages += $storage->quantity_used;
        }
        $occupationStorages = $usedStorages / $totalStorages * 100;

        /* Statistique des reservations */
        $type = request('type', 'day');

        if ($type === 'day') {
            $reservations = DB::table('reservations_histories')
                ->selectRaw('DATE(created_at) as label, COUNT(*) as total')
                ->groupBy('label')
                ->orderBy('label')
                ->get();
        }

        if ($type === 'week') {
            $reservations = DB::table('reservations_histories')
                ->selectRaw('YEARWEEK(created_at) as label, COUNT(*) as total')
                ->groupBy('label')
                ->orderBy('label')
                ->get();
        }

        if ($type === 'month') {
            $reservations = DB::table('reservations_histories')
                ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as label, COUNT(*) as total')
                ->groupBy('label')
                ->orderBy('label')
                ->get();
        }

        $reservationLabels = $reservations->pluck('label')->toArray();
        $reservationData   = $reservations->pluck('total')->toArray();

        /* ==========================
       Répartition des utilisateurs
    ========================== */

        $usersByRole = DB::table('users')
            ->select('type', DB::raw('COUNT(*) as total'))
            ->groupBy('type')
            ->get();

        $rolesLabels = $usersByRole->pluck('type');
        $rolesData   = $usersByRole->pluck('total');

        /* ==========================
       Utilisateurs les plus actifs
    ========================== */

        $topUsers = DB::table('reservations_histories')
            ->join('users', 'users.id', '=', 'reservations_histories.id_user')
            ->select(
                'users.name',
                DB::raw('COUNT(reservations_histories.id) as total_reservations'),
                DB::raw('SUM(TIMESTAMPDIFF(HOUR, start_date, end_date)) as total_hours')
            )
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_reservations')
            ->limit(5)
            ->get();

        return view('Admin.statistics', compact(
            'totalResources',
            'usedResources',
            'occupationGlobal',
            'occupationNetworks',
            'occupationServers',
            'occupationStorages',
            'occupationVms',
            'totalNetworks',
            'totalServers',
            'totalStorages',
            'totalVms',
            'usedNetworks',
            'usedServers',
            'usedStorages',
            'usedVms',
            'type',
            'reservationLabels',
            'reservationData',
            'rolesLabels',
            'rolesData',
            'topUsers'
        ));
    }

    function displayUsers()
    {
        $users = User::all();
        $nbrResponsables = User::where('type', 'responsable')->count();
        $nbrUsers = User::where('type', 'utilisateur')->count();
        $categories = ResourceCategory::all();
        return view('Admin.users', compact('users', 'categories', 'nbrResponsables', 'nbrUsers'));
    }

    function displaySupport()
    {

        $supports = Support::all();

        return view('Admin.support', compact('supports'));
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
        $histories = ReservationsHistory::all();

        // Selection all resources
        $servers = Servers::all();
        $virtualMachines = VirtualMachines::all();
        $networks = Network::all();
        $storages = Storage::all();

        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);


        $totalReservationsCount = ReservationsHistory::count();
        $reservationsAccepted = ReservationsHistory::where('status', 'accepted')->count();
        $reservationsRejected = ReservationsHistory::where('status', 'rejected')->count();

        return view('Admin.history', compact('resources', 'histories', 'totalReservationsCount', 'reservationsAccepted', 'reservationsRejected'));
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

    function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    function toogleBlockUser($id)
    {
        $user = User::findOrFail($id);
        $user->blocked = !$user->blocked;
        $user->save();

        return redirect()->route('admin.users');
    }

    function modifyUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot modify yourself');
        }

        $validated = $request->validate([
            'type' => 'required|in:utilisateur,responsable',
            'category' => 'required',
        ]);

        if ($validated['category'] != "aucun") {
            $categoryModel = ResourceCategory::where('name', $validated['category'])->first();
            $user->update([
                'type' => $validated['type'],
                'category' => $validated['category'],
                'id_category' => $categoryModel->id,

            ]);
        } else {
            $user->update([
                'type' => $validated['type'],
                'category' => $validated['category'],
            ]);
        }

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }
}
