<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // make sure you have this view
    }

    // Handle login POST
    public function login(Request $request)
    {
        // Validate form inputs
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt to login
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Redirect to dashboard or intended page
            return redirect()->intended('/dashboard');
        }

        // Login failed, back with error
        return back()->withErrors(['name' => 'Nama atau Password salah']);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
