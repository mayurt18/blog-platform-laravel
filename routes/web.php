<?php

use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', [PostController::class, 'index'])->name('home');
Auth::routes();


Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/', [PostController::class, 'store'])->name('posts.store');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');

});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('posts', AdminPostController::class)->except(['create', 'store', 'show']);
    Route::resource('comments', AdminCommentController::class)->only(['index', 'destroy']);
});

Route::get('/notifications/read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('notifications.read');
