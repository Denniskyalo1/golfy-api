<?php

namespace App\Http\Controllers;

use App\Models\UserClub;
use Illuminate\Http\Request;

/**
 * @tags User Clubs
 */
class UserClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'club_id' => ['required', 'exists:clubs,id'],
            'custom_distance_yds' => ['nullable', 'integer', 'min:1'],
        ]);

        return $request->user()->userClubs()->updateOrCreate(
            ['club_id' => $data['club_id']],
            [
                'is_enabled' => true,
                'custom_distance_yds' => $data['custom_distance_yds'] ?? null,
            ]
        );
    }


    /**
     * Display the specified resource.
     */
    public function show(UserClub $userClub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();

        // Find the user's club by ID
        $userClub = UserClub::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!$userClub) {
            return response()->json([
                'message' => 'User club not found'
            ], 404);
        }

        // Validate incoming data
        $data = $request->validate([
            'is_enabled' => ['sometimes', 'boolean'],
            'custom_distance_yds' => ['nullable', 'integer', 'min:1'],
        ]);

        // Only update if there is data
        if (!empty($data)) {
            $userClub->update($data);
        }

        return response()->json([
            'message' => 'User club updated successfully',
            'user_club' => $userClub
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->user();

        // Find the specific UserClub
        $userClub = UserClub::where('id', $id)
            ->where('user_id', $user->id) // ensure ownership
            ->first();

        if (!$userClub) {
            return response()->json([
                'message' => 'User club not found'
            ], 404);
        }

        $userClub->delete();

        return response()->json([
            'message' => 'Club removed from your bag'
        ]);
    }
}
