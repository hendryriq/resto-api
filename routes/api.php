<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\OrderController;

// Public routes (no authentication required)
Route::post('/login', [AuthController::class, 'login']);
Route::get('tables', [TableController::class, 'index']); // Tamu dapat melihat daftar meja

// Protected routes (authentication required)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::apiResource('foods', FoodController::class);
    
    // Order routes
    Route::post('orders', [OrderController::class, 'store']);
    Route::get('orders/{id}', [OrderController::class, 'show']);
    Route::post('orders/{id}/items', [OrderController::class, 'addItem']);
    Route::put('orders/{id}/close', [OrderController::class, 'close']);
});