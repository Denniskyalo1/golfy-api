<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtp;

class SendOtpController extends Controller
{
     /**
     * Verify Email and Send OTP
     *
     * This endpoint is used to check if the email exists in db and sends an OTP if it does, which will be used for account verification.
     *
     * @unauthenticated
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
        'email' => 'required|email'
        ]);

        $user = User::where('email' , $request->get('email'))->first();
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404); 
        }

        //Generate OTP
        $otpCode = rand(10000, 99999);

        // Save OTP to database
        $user ->update([
            'email_otp' => $otpCode,
            'email_otp_expires_at' => now()->addMinutes(10),
        ]);
        
        // Send OTP via email
        Mail::to($user->email)->send(new SendOtp($user, $otpCode));

        return response()->json([
        'message' => 'OTP sent',
        ], 200);

    }


}
