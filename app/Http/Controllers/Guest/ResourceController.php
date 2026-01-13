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
}
