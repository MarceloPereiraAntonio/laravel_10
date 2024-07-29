<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ForumController;
use App\Http\Controllers\Api\ReplyForumController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'auth']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/replies/{forum_id}', [ReplyForumController::class, 'getRepliesFromForum']);
    Route::post('/replies/{forum_id}', [ReplyForumController::class, 'createNewReply']);
    Route::delete('/replies/{id}', [ReplyForumController::class, 'destroy']);
    Route::apiResource('/forum', ForumController::class);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});
