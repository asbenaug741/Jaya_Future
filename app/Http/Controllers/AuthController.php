<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //
    public function view()
    {
        return view('login');
    }


    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // ambil role user
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful');
            } elseif ($role === 'user') {
                return redirect()->route('home')->with('success', 'Login successful');
            }
            // Jika role tidak dikenali, redirect ke halaman login dengan pesan error
            return redirect()->route('home')->withErrors(['role' => 'Role not recognized']);
        }


        return back()->with('success', 'Login successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
