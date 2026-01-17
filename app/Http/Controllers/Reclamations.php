<?php

namespace App\Http\Controllers;
use App\Models\Reclamation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Reclamations extends Controller
{
    public function reclamer(Reservation $reservation)
    {
        return view('User.Support', compact('reservation'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'Problem_type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Reclamation::create([
            'user_id' => Auth::id(),
            'reservation_id' => $request->reservation_id,
            'Problem_type' => $request->Problem_type,
            'description' => $request->description,
        ]);

        return redirect()->route('vosreservations')->with('success', 'Réclamation envoyée avec succès');
    }
}

