<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('forgotPasswordPages.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        // Insert into the password_resets table
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $details = ['token' => $token, 'email' => $request->email];

        Mail::to($request->email)->send(new ForgotPasswordMail($details));

        return view('forgotPasswordPages.successPage')->with(['message' => 'We have e-mailed your password reset link!']);
    }

    public function showResetPasswordForm($token)
    {
        // dd($details);
        return view('forgotPasswordPages.resetPassword', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->where('created_at', '>', Carbon::now()->subHours(24)) // Adjust expiration time as needed
            ->first();

        if (!$user) {
            return back()->withInput()->withErrors(['error' => 'Invalid token or token expired!']);
        }

        // Update the user's password in the users table
        DB::table('users')
            ->where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        // Delete the used token from the password_resets table
        DB::table('password_resets')->where('email', $request->email)->delete();

        return view('forgotPasswordPages.lastPage');
    }
}
