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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
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

            dd('succeful');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
