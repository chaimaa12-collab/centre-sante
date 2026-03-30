<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ───────────── LOGIN PAGE ─────────────
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/dashboard'); // نخلي dashboard يقرر
        }

        return view('auth.login');
    }

    // ───────────── LOGIN ACTION ─────────────
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {

            $request->session()->regenerate();

            // ✅ مهم: ما نديروش redirect حسب role هنا
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->withInput($request->only('email'));
    }

    // ───────────── LOGOUT ─────────────
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // ───────────── REGISTER PAGE ─────────────
    public function showRegister()
    {
        return view('auth.register');
    }

    // ───────────── REGISTER ACTION ─────────────
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|string',
            'service'  => 'nullable|string',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'service'  => $request->service,
        ]);

        Auth::login($user);

        // حتى هنا نخلي dashboard يقرر
        return redirect('/dashboard')->with('success', 'Compte créé avec succès !');
    }
}