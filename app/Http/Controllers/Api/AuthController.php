<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:player,caddie,manager,admin',
        ]);

        $user = User::create($validated);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
        'user' => $user,
        'token' => $token,
        'message' => 'User registered successfully.'
        ], 201); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

            /** @var \App\Models\MyUserModel $user **/
        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'User logged in successfully.'
        ], 200);
    }

    public function logout(Request $request)
    {   
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'User logged out successfully.'], 200);
    }
    
}
