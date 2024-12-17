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
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();

                // Redirect based on role
                $user = Auth::user();
                if ($user->hasRole('admin')) {
                    return redirect()->route('dash');
                } elseif ($user->hasRole('student')) {
                    return redirect()->route('home');
                } elseif ($user->hasRole('trainer')) {
                    return redirect()->route('home');
                }

                // Default redirection if no role matches
                return redirect('/home');
            }

            return redirect()->route('home')->with('success', 'Registration successful. Please check your email.');
        } catch (\Throwable $e) {

            // Redirect back to the login page with an error message
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
