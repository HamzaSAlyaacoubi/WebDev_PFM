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
    //     $ressources = Resource::where('status', 'disponible')->where('id_category', $categoryId)->get();

    //     return view('Guest.ResourcesGuest', compact('ressources'));
    // }
    function index($id_category)
    {
        $category = ResourceCategory::find($id_category);
        // $ressources;
        if ($category->name === "Servers") {
            $ressources = Servers::where('status', 'disponible')->get();
        }
        if ($category->name === "Virtual Machines") {
            $ressources = VirtualMachines::where('status', 'disponible')->get();
        }
        if ($category->name === "Networking equipment") {
            $ressources = Network::where('status', 'disponible')->get();
        }
        if ($category->name === "Storage") {
            $ressources = Storage::where('status', 'disponible')->get();
        }
        return view('Guest.ResourcesGuest', compact('ressources', 'id_category'));
    }

    public function reserve($id)
    {
        $ressource = Resource::where('id', $id)
            ->where('status', 'disponible')
            ->firstOrFail();

        return view('User.Reserve', compact('ressource'));
    }
}
