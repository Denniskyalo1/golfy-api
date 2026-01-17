<?php

namespace App\Http\Controllers;

use App\Models\GolfClub;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GolfClubController extends Controller
{
    public function index()
    {
        // Get only the clubs belonging to the logged-in user
        $clubs = User::find(1)->golfClubs;
        return response()->json($clubs);
    }

    public function store(Request $request)
    {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'club_name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            'yardage_yards' => 'nullable|integer',
            'yardage_metres' => 'nullable|integer',
        ]);

        // 2. Create the record using mass assignment
        $golfClub = GolfClub::create($validated);

        // 3. Return the created object as JSON for Postman
        return response()->json([
            'message' => 'Golf club created successfully',
            'data' => $golfClub
        ], 201);
    }


    public function show(GolfClub $golfClub)
    {
        // Security: Ensure the user owns this club
        if ($golfClub->user_id !== 1) {
            abort(403);
        }

        return response()->json($golfClub);
    }

    public function update(Request $request, GolfClub $golfClub)
    {

        // 1. Ownership Check: Hardcoded to User ID 1
        if ($golfClub->user_id !== Auth::id()) {
            return response()->json([
                'error' => 'Unauthorized. This club does not belong to User 1.'
            ], 403);
        }

        // 2. Validate the incoming data (similar to store, but usually fields are optional)
        $validated = $request->validate([
            'user_id' => 'sometimes|integer', // 'sometimes' means only validate if present
            'club_name' => 'sometimes|string|max:255',
            'brand_name' => 'sometimes|string|max:255',
            'yardage_yards' => 'nullable|integer',
            'yardage_metres' => 'nullable|integer',
        ]);

        // 2. Update the instance directly
        $golfClub->update($validated);

        // 3. Return the updated object
        return response()->json([
            'message' => 'Golf club updated successfully',
            'data' => $golfClub
        ], 200);
    }

    public function destroy(GolfClub $golfClub)
    {
        // Security check
        if ($golfClub->user_id !== Auth::id()) {
            abort(403);
        }

        $golfClub->delete();

        return response()->json('success');
    }
}
