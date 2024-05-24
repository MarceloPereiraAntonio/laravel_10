<?php

use App\Http\Controllers\Admin\{ForumController};
use Illuminate\Support\Facades\Route;

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/', function () {
    return view('welcome');
});
