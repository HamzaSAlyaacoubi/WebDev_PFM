<?php

namespace App\Http\Controllers;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\ResourceCategory;

class UserController extends Controller
{
public function filter(Request $request)
{
    $query = Resource::where('status', 'disponible');
    $categories = ResourceCategory::all();
    $manufacturers = Resource::select('manufacturer')->distinct()->where('status', 'disponible')->get();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }
    if ($request->filter && $request->filter != 'all') {
        $query->where('category_id', $request->filter);
    }

    $ressources = $query->get();

    if($manufacturers){
        if ($request->manufacturer && $request->manufacturer != 'all') {
            $query->where('manufacturer', $request->manufacturer);
        }
        $ressources = $query->get();
    }

    return view('User.dashboard', compact('categories', 'ressources', 'manufacturers'));
}

}

