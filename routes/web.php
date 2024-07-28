<?php

use App\Enums\ForumStatusEnum;
use App\Http\Controllers\Admin\{ForumController, ReplyForumController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum',[ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/edit/{id}', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/edit/{id}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/destroy/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

    //replies
    Route::get('/forum/show/{id}/replies', [ReplyForumController::class, 'index'])->name('replies.index');
    Route::post('/forum/{id}/replies', [ReplyForumController::class, 'store'])->name('replies.store');
    Route::delete('/forum/{id}/replies/{reply}', [ReplyForumController::class, 'destroy'])->name('replies.destroy');
});
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});



