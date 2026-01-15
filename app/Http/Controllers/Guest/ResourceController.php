<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Network;
use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\ResourceCategory;
use App\Models\Servers;
use App\Models\Storage;
use App\Models\VirtualMachines;

class ResourceController extends Controller
{
    // function index($categoryId)
    // {
    //     $ressources = Resource::where('status', 'disponible')->where('category_id', $categoryId)->get();

    //     return view('Guest.ResourcesGuest', compact('ressources'));
    // }
    function index($categoryId)
    {
        $categorie = ResourceCategory::find($categoryId);
        // $ressources;
        if ($categorie->name === "Servers") {
            $ressources = Servers::all();
        }
        if ($categorie->name === "Virtual Machines") {
            $ressources = VirtualMachines::all();
        }
        if ($categorie->name === "Networking equipment") {
            $ressources = Network::all();
        }
        if ($categorie->name === "Storage") {
            $ressources = Storage::all();
        }
        return view('Guest.ResourcesGuest', compact('ressources'));
    }

    public function reserve($id)
    {
        $ressource = Resource::where('id', $id)
            ->where('status', 'disponible')
            ->firstOrFail();

        return view('User.Reserve', compact('ressource'));
    }
}
