<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'login' => 'required|string', // Cambiamos a "login" para aceptar email o username
            'password' => 'required|string',
        ]);

        // Llamamos al método del modelo para intentar autenticar al usuario
        if (User::attemptLogin($validated['login'], $validated['password'])) {
            $request->session()->regenerate();

            $user = Auth::user();

            return match ($user->role) {
                'admin' => redirect()->route('users.index')->with('success', 'User logged in successfully!'),
                'administrative' => redirect()->route('index')->with('success', 'User logged in successfully!'),
                'doctor' => redirect()->route('certificate.index')->with('success', 'User logged in successfully!'),
                default => redirect()->route('login')->withErrors(['message' => 'Invalid login credentials']),
            };
        }

        return redirect()
            ->route('login')
            ->withErrors(['message' => 'Invalid login credentials']);
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('login')->with('success', 'User registered successfully!');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        request()->session()->invalidate(); //Elimina sesion
        request()->session()->flush(); //Borra datos sesion
        request()->session()->regenerateToken(); //Evita ataques CSRF

        return redirect()->route('login')->with('success', 'User logged out successfully!');
    }
}
