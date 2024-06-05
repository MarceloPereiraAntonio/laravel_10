<?php

use App\Http\Controllers\Api\ForumController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/forum', ForumController::class);
