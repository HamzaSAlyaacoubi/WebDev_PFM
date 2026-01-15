<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login()
    {
        return view('Guest.login');
    }

    function registration()
    {
        return view('Guest.login');
    }

    function loginPost(Request $request)
    {
        $request->validateWithBag('login', [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            if ($user->type === User::ADMIN) return redirect()->intended(route('admin'));
            if ($user->type === User::RESPONSABLE) return redirect()->intended(route('responsable'));
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->intended(route('login'))->with('error', 'login faild');
    }

    function registrationPost(Request $request)
    {
        $request->validateWithBag('register', [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['type'] = "utilisateur";

        $user = User::create($data);

        if (!$user) {
            return redirect()->intended('registration')->with('error', 'Registration fail, Try again');
        }
        return redirect()->route('login')->with('success', 'Registration success, login to access the app');
    }

    function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('home');
    }
}
