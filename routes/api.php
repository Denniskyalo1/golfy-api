<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ClubBagController;
use App\Http\Controllers\GolfCourseController;
use App\Http\Controllers\UserClubController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/courses', [GolfCourseController::class, 'index']); //Get all courses in db

//Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Fetch full bag structure (categories + clubs + user state)
    Route::get('/my-bag', action: [ClubBagController::class, 'index']);

    // User club interactions (toggle, update distance)
    Route::apiResource('/user-clubs', UserClubController::class)
        ->only(['store', 'update', 'destroy']);
});
