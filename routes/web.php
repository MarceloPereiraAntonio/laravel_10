<?php

use App\Http\Controllers\Admin\{ForumController};
use Illuminate\Support\Facades\Route;

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
Route::post('/forum',[ForumController::class, 'store'])->name('forum.store');
Route::get('/forum/show/{id}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/', function () {
    return view('welcome');
});
