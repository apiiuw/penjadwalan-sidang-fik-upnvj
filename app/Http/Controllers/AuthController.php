<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignIn()
    {
        return view('auth.pages.sign-in'); // pastikan ini sesuai dengan nama file view kamu
    }

    public function signIn(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role === 'Admin') {
                return redirect('/admin');
            } elseif ($role === 'Koordinator Program Studi') {
                return redirect('/koor-prodi');
            } elseif ($role === 'Dosen Pembimbing') {
                return redirect('/pembimbing');
            } elseif ($role === 'Dosen Penguji') {
                return redirect('/penguji');
            } elseif ($role === 'Mahasiswa') {
                return redirect('/');
            } else {
                return redirect('/sign-in'); // fallback default
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign-in');
    }
}
