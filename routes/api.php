<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VerificationController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



// Route::get('/session', function (Request $request)
// return $request->session();
// })->middleware('auth:sanctum');

// Route::apiResource('users', [UserController::class,'index']);
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);
// Route::apiResource('sessions', SessionController::class);
// Route::apiResource('password_resets', PasswordResetController::class);
// Route::apiResource('bookings', BookingController::class);
// Route::apiResource('services', ServiceController::class);
// Route::apiResource('vehicles', VehicleController::class);
// Route::apiResource('verifications', VerificationController::class);
