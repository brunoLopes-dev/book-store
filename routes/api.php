<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;

// Route to authentication
Route::post('/login', [AuthController::class, 'login']);

// Authentication-protected route group
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/books', BookController::class);
    Route::apiResource('/stores', StoreController::class);
    Route::post('/stores/{store}/books/{book}', [StoreController::class, 'attachBook']);
});

