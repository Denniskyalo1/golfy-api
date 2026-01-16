<?php

namespace App\Http\Controllers;

use App\Models\GolfClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GolfClubController extends Controller
{
    public function index()
    {
        // Get only the clubs belonging to the logged-in user
        $clubs = Auth::user()->golfClubs;
        return response()->json($clubs);
    }

    public function store(Request $request) {}

    public function show(GolfClub $golfClub)
    {
        // Security: Ensure the user owns this club
        if ($golfClub->user_id !== Auth::id()) {
            abort(403);
        }

        return response()->json($golfClub);
    }

    public function update(Request $request, GolfClub $golfClub) {}

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
