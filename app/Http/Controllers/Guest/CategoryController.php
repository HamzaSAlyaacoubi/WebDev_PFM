<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResourceCategory;

class CategoryController extends Controller
{
    //Afficher la liste des categories
    public function index(){
        $categories = ResourceCategory::all();
        return view('Guest.CategoriesGuest', compact('categories'));   
    }
}
