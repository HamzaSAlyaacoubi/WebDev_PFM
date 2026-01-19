<?php

namespace App\Http\Controllers;
use App\Models\ReservationsHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserHistory extends Controller
{
    public function history()
    {
        $history = ReservationsHistory::where('id_user', Auth::id())->get();
        return view('User.History', compact('history'));
    }
}
