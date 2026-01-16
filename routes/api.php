<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GolfCourseController;

//Unauthenticated routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);//Logout route
    Route::get('/profile', [UserController::class, 'profile']);//Get logged in user's profile
    Route::put('/profile', [UserController::class, 'updateProfile']);//Update logged in user's profile
    Route::apiResource('golf-courses', GolfCourseController::class)->withoutMiddleware('throttle:api');//Golf course routes
});
