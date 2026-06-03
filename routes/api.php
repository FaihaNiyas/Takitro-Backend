<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// 🔹 Test Route
Route::get('/test', function () {
    return response()->json([
        'message' => 'Takitro API working'
    ]);
});

// 🔓 Public Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔐 Protected Routes (need Sanctum token)
Route::middleware('auth:sanctum')->group(function () {

    // get logged user
    Route::get('/user', [AuthController::class, 'user']);

    // logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});

// 👑 Admin Only Routes
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return response()->json([
            'message' => 'Admin only access granted'
        ]);
    });

});