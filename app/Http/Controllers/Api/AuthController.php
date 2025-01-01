<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email"    => "required|email",
            "password" => "required"
        ]);

        if (!Auth::attempt($request->only("email", "password"))) {
            return response([
                "status"  => "error",
                "message" => "These credentials do not match our records.",
                "data"    => []
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken(Str::random(60))->plainTextToken;

        return response([
            "status"  => "success",
            "message" => "",
            "data"    => [
                "user"  => $user,
                "token" => $token
            ]
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            "name"     => "required|string|max:255",
            "email"    => "required|email|unique:users,email",
            "password" => "required|string|min:8",
        ]);

        // Create the user
        $user = User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => bcrypt($request->password), // Hash the password
        ]);

        // Generate a token for the user
        $token = $user->createToken(Str::random(60))->plainTextToken;

        return response([
            "status"  => "success",
            "message" => "User registered successfully.",
            "data"    => [
                "user"  => $user,
                "token" => $token
            ]
        ]);
    }




    public function getUser(Request $request)
    {
        return response([
            "status"  => "success",
            "message" => "",
            "data"    => [
                "user" => $request->user()
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $cookie = Cookie::forget("jwt");

        return response([
            "status"  => "success",
            "message" => "",
            "data"    => []
        ])->withCookie($cookie);
    }
}
