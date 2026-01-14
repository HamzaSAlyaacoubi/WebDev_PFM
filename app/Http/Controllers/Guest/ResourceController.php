<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;
class ResourceController extends Controller
{
    function index($categoryId){
    $ressources = Resource::where('status', 'disponible')->where('category_id', $categoryId)->get();

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
