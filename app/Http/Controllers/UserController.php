<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * @tags User Profile
 */
class UserController extends Controller
{
        /**
        * Get User Profile
        *
        * This endpoint retrieves the authenticated user's profile information.
        *
        * it returns the user's profile details, including name, email, and role.
        *
        * For the protected routes, include the following header:
        * `Authorization: Bearer {token}`
        */
    public function profile()
    {
        $user = Auth::user();
        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ];

        return response()->json([
            'user' => $userData,
            'message' => 'User profile retrieved successfully.'
        ], 200);
        
    }

        /**
            * Update User Profile
            *
            * This endpoint allows the authenticated user to update their profile information.
            *
            * it returns the updated user's profile details, including name, email, and role.
            *
            * For the protected routes, include the following header:
            * `Authorization: Bearer {token}`
            */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8|confirmed',
            'password_confirmation' => 'sometimes|string|min:8'
        ]);


        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        /** @var \App\Models\User $user */
        $user->update($validatedData);
        $user->refresh();

      return response()->json([
        'user' => [
          'id' => $user->id,
          'name' => $user->name,
          'email' => $user->email,
          'role' => $user->role,
      ],
      'message' => 'User profile updated successfully.'
      ], 200);
    }


}
