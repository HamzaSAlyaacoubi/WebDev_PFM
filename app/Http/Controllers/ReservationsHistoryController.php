<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationsHistory;
use Illuminate\Http\Request;

class ReservationsHistoryController extends Controller
{

    function acceptReservation($idReservation)
    {
        $reservation = Reservation::findOrFail($idReservation);

        $history = [
            'id_user'             => $reservation->user_id,
            'id_resource'         => $reservation->resource_id,
            'id_category'         => $reservation->Category_id,
            'reservation_date'    => $reservation->created_at,
            'start_date'          => $reservation->start_date,
            'end_date'            => $reservation->end_date,
            'user_justification'  => $reservation->reason,
            'status'              => 'accepted',
        ];

        ReservationsHistory::create($history);

        $reservation->delete();

        return redirect()->route('responsable.reservations');
    }

    function refuseReservation($idReservation)
    {
        $reservation = Reservation::findOrFail($idReservation);

        $history = [
            'id_user'             => $reservation->user_id,
            'id_resource'         => $reservation->resource_id,
            'id_category'         => $reservation->Category_id,
            'reservation_date'    => $reservation->created_at,
            'start_date'          => $reservation->start_date,
            'end_date'            => $reservation->end_date,
            'user_justification'  => $reservation->reason,
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
