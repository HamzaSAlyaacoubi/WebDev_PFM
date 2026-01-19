<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\ReservationsHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\Resource;
use Carbon\Carbon;

use function Pest\Laravel\get;

class VosReservationController extends Controller
{
    function vosreservations()
{
    $vosreservations = Reservation::where('user_id', Auth::id())->get();
    $histories = ReservationsHistory::where('id_user', Auth::id())->get();

    $total = $histories->count();

    $actives = $histories->filter(function ($r) {
        return $r->status === 'accepted';
    })->count();

    $expirees = $histories->filter(function ($r) {
        return $r->status === 'accepted'
            && $r->end_date < now();
    })->count();

    return view(
        'User.VosReservations',
        compact('vosreservations', 'histories', 'total', 'actives', 'expirees')
    );
}

}

