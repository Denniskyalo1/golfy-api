<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendOTP;
use App\Models\EmailOtp;
use Illuminate\Support\Facades\Hash;

/**
 * @tags Authentication
 */
class AuthController extends Controller
{
     /**
     * User Registration
     *
     * This endpoint is used for user registration.
     *
     * it returns a token upon successful registration, that will be required for accessing protected routes.
     *
     * For the protected routes, include the following header:
     * `Authorization: Bearer {token}`
     *
     * @unauthenticated
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phonenumber' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:player,caddie,manager,admin',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $token = $user->createToken('api-token')->plainTextToken;

        $otpCode = rand(100000, 999999);

        //Send verification email with OTP
        Mail::to($user->email)->send(new sendOTP($user, $otpCode));
        $user->email_otp = $otpCode;
        $user->email_otp_expires_at = now()->addMinutes(10);
        $user->save();

        return response()->json([
            'user' => $user,
             'token' => $token,
            'message' => 'User registered successfully. Please check your email for the OTP code to verify your account.'
        ], 201);
    }

     /**
     * User Login
     *
     * This endpoint is used for user login.
     *
     * it returns a token upon successful login, that will be required for accessing protected routes.
     *
     * For the protected routes, include the following header:
     * `Authorization: Bearer {token}`
     *
     * @unauthenticated
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        if($user->is_active == false){
            return response()->json(
                [
                    'message' => 'Your account is inactive. Please verify your email first.',
                ],
                403
            );
        }

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

     /**
     * User Logout
     *
     * This endpoint is used for user logout.
     *
        * it revokes the token used for authentication, effectively logging the user out.
        *
        * For the protected routes, include the following header:
        * `Authorization: Bearer {token}`
     *
     * @unauthenticated
     */
    public function logout(Request $request)
    {   
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'User logged out successfully.'], 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        if($user->isActive ==false){
            return response()->json(
                [
                    'message' => 'Your account is inactive. Please contact verify your email first.',
                    
                ],
                403
            );
        }



        $otpCode = rand(10000, 99999);

        // Store OTP in the database
        $user ->emailOtps()->create([
            'code' => $otpCode,
            'type' => 'password_reset',
            'expires_at' => now()->addMinutes(10),
        ]);

        // Send OTP to user's email

        return response()->json(['message' => 'Password reset link sent to your email.'], 200);
    }
    
}
