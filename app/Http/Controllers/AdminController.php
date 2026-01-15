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

    function toResponsable($id)
    {
        $user = User::where('id', $id);
        $user->update([
            'type' => 'responsable'
        ]);

        return redirect()->intended(route('admin'));
    }

    function toUtilisateur($id)
    {

        $user = User::where('id', $id);
        $user->update([
            'type' => 'utilisateur'
        ]);
        return redirect()->intended(route('admin'));
    }
}
