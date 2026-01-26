<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\Reservation;
use App\Models\ReservationsHistory;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Reclamations extends Controller
{
    public function reclamer(ReservationsHistory $history)
    {
        return view('User.Support', compact('history'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_reservation' => 'required|exists:reservations_histories,id',
            'problem_type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Reclamation::create([
            'id_user' => Auth::id(),
            'id_reservation' => (int) $request->id_reservation,
            'problem_type' => $request->problem_type,
            'description' => $request->description,
        ]);

        return redirect()->route('vosreservations')->with('success', 'Réclamation envoyée avec succès');
    }
}
