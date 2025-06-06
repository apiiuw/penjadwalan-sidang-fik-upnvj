<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        switch ($user->role) {
            case 'Admin':
                return redirect('/admin');
            case 'Koordinator Program Studi':
                return redirect('/koor-prodi');
            case 'Mahasiswa':
            default:
                return redirect('/');
        }
    }

}
