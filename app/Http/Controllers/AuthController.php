<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->route('dashboard');
            }

            if ($role === 'staff') {
                return redirect()->route('staff.dashboard');
            }

            if ($role === 'pembeli') {
                return redirect()->route('pembeli.index');
            }
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()
                    ->route('dashboard')
                    ->with('success', 'Login berhasil. Selamat datang, Admin GlowMart.');
            }

            if ($role === 'staff') {
                return redirect()
                    ->route('staff.dashboard')
                    ->with('success', 'Login berhasil. Selamat bekerja di GlowMart.');
            }

            if ($role === 'pembeli') {
                return redirect()
                    ->route('pembeli.index')
                    ->with('success', 'Login berhasil. Selamat berbelanja di GlowMart.');
            }

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Role akun tidak dikenali.',
                ]);
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password yang kamu masukkan salah.',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}
