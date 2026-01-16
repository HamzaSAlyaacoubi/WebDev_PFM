<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    function createResponsable(Request $request)
    {
        $responsable = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $responsable['type'] = 'responsable';
        $responsable['password'] = Hash::make($request->password);

        User::create($responsable);

        return redirect()->route('admin');
    }
}
