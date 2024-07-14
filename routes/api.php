<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ForumController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'auth']);

Route::middleware('auth:sanctum')->group(function() {

    Route::apiResource('/forum', ForumController::class);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});
