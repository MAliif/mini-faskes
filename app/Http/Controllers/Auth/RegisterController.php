<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle register POST
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'rolefk' => (int) $request->rolefk,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Auto login after registration

        return redirect('/dashboard');
    }
}
