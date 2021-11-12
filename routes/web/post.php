<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/post/{post}', [PostController::class, 'show'])->name('post');


Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}/update', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
// Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->middleware('can:view,post')->name('post.edit');
