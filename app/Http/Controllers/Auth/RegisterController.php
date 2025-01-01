<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\UserRegisteredSuccessMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function registerAction(RegisterRequest $request)
    {
        try {
            $user = User::insertUser($request);
            $user->assignRole('student');
            $details = ['name' => $user->name, 'email' => $user->email];
            // Send email after user creation
            Mail::to($user->email)->send(new UserRegisteredSuccessMail($details));
            // Redirect to the login page after successful registration
            return redirect()->route('home')->with('success', 'Registration successful. Please check your email.');
        } catch (\Throwable $e) {

            // Redirect back to the login page with an error message
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }
}
