<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function loginAction(LoginRequest $request)
    {
        // Attempt login
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Redirect based on role
            $user = Auth::user();

            return match (true) {
                $user->hasRole('admin') => redirect()->route('dashboard'),
                $user->hasRole('student'),
                $user->hasRole('trainer') => redirect()->route('home'),
                default => redirect('/home'),
            };
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
