<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Resource;
use Carbon\Carbon;

class VosReservationController extends Controller
{
    function vosreservations()
    {
        
    $vosreservations =Reservation::with('resource')->where('user_id', Auth::id())->get();
    //Pour les statistiques

    $total = $vosreservations->count();

    $actives = $vosreservations->filter(function ($r) {
        return $r->start_date <= now() && $r->end_date >= now();})->count();

    $maintenance = $vosreservations->where('status', 'maintenance')->count();

    $expirees = $vosreservations->filter(function ($r) {
        return $r->end_date < now();
        })->count();

    return view('User.VosReservations', compact('vosreservations','total','actives','maintenance','expirees'));
}
}

