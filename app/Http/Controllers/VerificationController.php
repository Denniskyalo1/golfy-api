<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

/**
 * @tags Verification
 */
class VerificationController extends Controller
{
     /**
     * Email Verification
     *
     * This endpoint is used for verifying a user's email address using an OTP code.
     *
     * it returns a success message upon successful verification.
     *
     * For the protected routes, include the following header:
     * `Authorization: Bearer {token}`
     *
     * @unauthenticated
     */
   public function verifyEmail(Request $request)
   {

   $request->validate([
        'email' => 'required|email',
        'otp' => 'required|string'
    ]);

       $user = User::where('email' , $request->get('email'))->first();
         if (!$user) {
              return response()->json(['message' => 'User not found.'], 404);
         }

       
       if ($user->hasVerifiedEmail()) {
          return response()->json([
            'message' => 'Email already verified'
          ], 200);
       }


         if ($user->email_otp !== $request->get('otp')) {
             return response()->json([
                'message' => 'Invalid OTP code'
             ], 400);
         }

         
        if (now()->gt($user->email_otp_expires_at)) {
        return response()->json([
            'message' => 'OTP expired'
        ], 400);  
        }

        
      $user->forceFill([
    'email_otp' => null,
    'email_otp_expires_at' => null,
    'is_active' => true,
    'email_verified_at' => now(),
])->save();

       return response()->json(['message' => 'Email verified successfully.'], 200);
   }
}
