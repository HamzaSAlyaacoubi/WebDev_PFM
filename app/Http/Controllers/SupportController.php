<?php
namespace App\Http\Controllers;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Models\ReservationsHistory;
use Illuminate\Support\Facades\Auth;


class SupportController extends Controller
{
    public function index()
    {
        return view('User.Support');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        Support::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('vosreservations')->with('success', 'Message envoyé avec succès');
    }
    public function reclamer(ReservationsHistory $history)
    {
        return view('User.Support', compact('history'));
    }
}
