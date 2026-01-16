<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GolfCourseController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\GolfClubController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::apiResource('golf-courses', GolfCourseController::class)->withoutMiddleware('throttle:api');
Route::apiResource('user-golf-clubs', GolfClubController::class)
    ->parameters(['user-golf-clubs' => 'golfClub']);
