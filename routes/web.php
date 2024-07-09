<?php

use App\Enums\ForumStatusEnum;
use App\Http\Controllers\Admin\{ForumController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum',[ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/show/{id}', [ForumController::class, 'show'])->name('forum.show');
    Route::get('/forum/edit/{id}', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/edit/{id}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/destroy/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

});
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});



