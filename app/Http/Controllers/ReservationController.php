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
    public function create($id_categorie, $id){
        if($id_categorie == 1)
            $resource = Servers::where('id', $id)->firstOrFail();
        if($id_categorie == 2)
            $resource = VirtualMachines::where('id', $id)->firstOrFail();
        if($id_categorie == 3)
            $resource = Network::where('id', $id)->firstOrFail();
        if($id_categorie == 4)
            $resource = Storage::where('id', $id)->firstOrFail();
        
        return view('User.Reserve', compact('resource'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'resource_id' => 'required|integer',
            'Category_id' => 'required|exists:resource_categories,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'reason' => 'nullable|string',
        ]);

            $validated['status'] = 'pending';
        Reservation::create($validated);


        return redirect()->route('dashboard')->with('success', 'Reservation created successfully and is pending approval.');
    }
}