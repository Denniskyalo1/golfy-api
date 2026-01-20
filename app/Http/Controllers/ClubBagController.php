<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClubCategory;
use App\Models\UserClub;
use Illuminate\Http\Request;

class ClubBagController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Load only user's clubs with category info
        $userClubs = UserClub::with('club.category')
            ->where('user_id', $user->id)
            ->get();

        // Format the response grouped by category
        $response = $userClubs
            ->groupBy(fn($uc) => $uc->club->category->name)
            ->map(function ($clubs, $categoryName) {
                return [
                    'category' => $categoryName,
                    'clubs' => $clubs->map(fn($uc) => [
                        'id' => $uc->club->id,
                        'name' => $uc->club->name,
                        'default_distance_yds' => $uc->club->default_distance_yds,
                        'is_enabled' => $uc->is_enabled,
                        'custom_distance_yds' => $uc->custom_distance_yds,
                    ])->values()
                ];
            })
            ->values();

        return response()->json($response);
    }
}
