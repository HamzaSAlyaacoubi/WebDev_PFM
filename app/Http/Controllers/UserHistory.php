<?php

namespace App\Http\Controllers;

use App\Models\ReservationsHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserHistory extends Controller
{
    public function history(Request $request)
    {
        $query = ReservationsHistory::where('id_user', Auth::id());

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('end_date', '<=', $request->end_date);
        }

        $history = $query->get();

        return view('User.History', compact('history'));
    }
}
