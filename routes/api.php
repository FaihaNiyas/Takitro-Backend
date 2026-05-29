<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'Takitro API working'
    ]);
});

// REGISTER API
Route::post('/register', [AuthController::class, 'register']);