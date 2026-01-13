<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    function afficherUsers()
    {
        $users = User::all();
        return view('Admin.admin', compact('users'));
    }
}
