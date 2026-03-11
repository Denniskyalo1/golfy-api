<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ClubBagController;
use App\Http\Controllers\GolfCourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserClubController;
use App\Http\Controllers\SendOtpController;
use App\Http\Controllers\VerificationController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/verify-email', [VerificationController::class, 'verifyEmail']);
Route::post('/send-otp', [SendOtpController::class, 'sendOtp']);
Route::post('/login', [AuthController::class, 'login']);

// Golf Course public routes
Route::get('/courses', [GolfCourseController::class, 'index']);
Route::get('/courses/{id}', [GolfCourseController::class, 'getCourse'])->whereNumber('id'); // ✅ only matches digits

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Fetch full bag structure (categories + clubs + user state)
    Route::get('/my-bag', [ClubBagController::class, 'index']);

    // Golf course authenticated routes
    Route::get('/courses/my-liked-courses', [GolfCourseController::class, 'likedCourses']);
    Route::post('/courses/{id}/toggleLike', [GolfCourseController::class, 'toggleLike'])->whereNumber('id');

    // User club interactions
    Route::apiResource('/user-clubs', UserClubController::class)
        ->only(['store', 'update', 'destroy']);
});