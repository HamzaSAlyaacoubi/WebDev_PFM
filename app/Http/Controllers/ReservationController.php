<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\Resource;
use App\Models\Reservation;
use App\Models\Servers;
use App\Models\Storage;
use App\Models\VirtualMachines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create($id_category, $id)
    {
        if ($id_category == 1)
            $resource = Servers::where('id', $id)->firstOrFail();
        if ($id_category == 2)
            $resource = VirtualMachines::where('id', $id)->firstOrFail();
        if ($id_category == 3)
            $resource = Network::where('id', $id)->firstOrFail();
        if ($id_category == 4)
            $resource = Storage::where('id', $id)->firstOrFail();

        return view('User.Reserve', compact('resource'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_resource' => 'required',
            'id_category' => 'required|exists:resource_categories,id',
            'id_user' => 'required|exists:users,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'justification' => 'nullable|string',
        ]);

        $validated['status'] = 'pending';
        Reservation::create($validated);


        return redirect()->route('dashboard')->with('success', 'Reservation created successfully and is pending approval.');
    }
}
