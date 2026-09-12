<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        /* 
        // Authentication logic when DB is ready
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return back()->with('success', 'Logged in successfully!');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        */
        
        return back()->with('success', 'Login submitted! (Backend logic pending)');
    }
}
