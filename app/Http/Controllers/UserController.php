<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\ResourceCategory;
use App\Models\Servers;
use App\Models\VirtualMachines;
use App\Models\Network;
use App\Models\ReservationsHistory;
use App\Models\Storage;

class UserController extends Controller
{
    public function filter(Request $request)
    {
        $categories = ResourceCategory::all();

        $servers   = Servers::where('status', 'disponible')->whereColumn('quantity_available', '>', 'quantity_used')->get();
        $vms       = VirtualMachines::where('status', 'disponible')->whereColumn('quantity_available', '>', 'quantity_used')->get();
        $networks  = Network::where('status', 'disponible')->whereColumn('quantity_available', '>', 'quantity_used')->get();
        $storages  = Storage::where('status', 'disponible')->whereColumn('quantity_available', '>', 'quantity_used')->get();

        $ressources = collect()->merge($servers)->merge($vms)->merge($networks)->merge($storages);

        if ($request->filled('filter') && $request->filter !== 'all') {
            $ressources = $ressources->where('id_category', (int) $request->filter);
        }

        if ($request->filled('search')) {
            $ressources = $ressources->filter(function ($ressource) use ($request) {
                return str_contains(strtolower($ressource->name), strtolower($request->search));
            });
        }

        $brands = $ressources->pluck('brand')->filter()->unique()->values();

        if ($request->filled('brand') && $request->brand !== 'all') {
            $ressources = $ressources->where('brand', $request->brand);
        }

        ReservationsHistory::where('end_date', '<', now())
            ->where('status', 'accepted')
            ->each(function ($history) {
                $history->resource->decrement('quantity_used');
                $history->update(['status' => 'terminated']);
            });

        return view('User.dashboard', compact('categories', 'ressources', 'brands'));
    }
}
