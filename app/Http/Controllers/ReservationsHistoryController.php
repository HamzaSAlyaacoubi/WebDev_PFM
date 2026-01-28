<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\Reservation;
use App\Models\ReservationsHistory;
use App\Models\Servers;
use App\Models\Storage;
use App\Models\VirtualMachines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsHistoryController extends Controller
{

    function acceptReservation($idReservation)
    {
        $reservation = Reservation::findOrFail($idReservation);

        $id_responsable = Auth::id();
        $id_category_responsable = Auth::user()->id_category;
        $history = [
            'id_responsable'      => $id_responsable,
            'id_user'             => $reservation->id_user,
            'id_resource'         => $reservation->id_resource,
            'id_category'         => $reservation->id_category,
            'reservation_date'    => $reservation->created_at,
            'start_date'          => $reservation->start_date,
            'end_date'            => $reservation->end_date,
            'user_justification'  => $reservation->justification,
            'status'              => 'accepted',
        ];

        ReservationsHistory::create($history);

        $reservation->delete();

        // Diminuer Quatity Available
        $servers = Servers::where('id_category', $id_category_responsable)->get();
        $virtualMachines = VirtualMachines::where('id_category', $id_category_responsable)->get();
        $networks = Network::where('id_category', $id_category_responsable)->get();
        $storages = Storage::where('id_category', $id_category_responsable)->get();
        $resources = collect()->merge($servers)->merge($virtualMachines)->merge($networks)->merge($storages);

        $resource = $resources->where('id', $reservation->id_resource)->first();
        $resource->quantity_used += 1;
        $resource->save();

        return redirect()->route('responsable.reservations');
    }

    function refuseReservation($idReservation)
    {
        $reservation = Reservation::findOrFail($idReservation);

        $id_responsable = Auth::id();

        $history = [
            'id_responsable'      => $id_responsable,
            'id_user'             => $reservation->id_user,
            'id_resource'         => $reservation->id_resource,
            'id_category'         => $reservation->id_category,
            'reservation_date'    => $reservation->created_at,
            'start_date'          => $reservation->start_date,
            'end_date'            => $reservation->end_date,
            'user_justification'  => $reservation->justification,
            'status'              => 'rejected',
        ];

        ReservationsHistory::create($history);

        $reservation->delete();

        return redirect()->route('responsable.reservations');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReservationsHistory $reservationsHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReservationsHistory $reservationsHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReservationsHistory $reservationsHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReservationsHistory $reservationsHistory)
    {
        //
    }
}
