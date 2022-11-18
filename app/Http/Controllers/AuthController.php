<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return to_route('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function signin(Request $repuest)
    {
        $data = $repuest->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            request()->session()->regenerate();

            return to_route('stores.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
