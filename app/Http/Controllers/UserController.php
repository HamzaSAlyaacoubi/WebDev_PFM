<?php

namespace App\Http\Controllers;
use App\Models\Resource;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function index(Request $request)
{
    $query = Resource::where('status', 'disponible');

    // si un filtre est sélectionné
    if ($request->filter && $request->filter != 'all') {
        $query->where('category_id', $request->filter);
    }

    $ressources = $query->get();

    return view('User.dashboard', compact('ressources'));
}

}

