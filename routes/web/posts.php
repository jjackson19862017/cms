<?php
use Illuminate\Support\Facades\Route;

    Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post'); //info To make this controller type 'php artisan make:model Post -mc' in the terminal. The m -> model and the c -> controller

 // Post Controller
    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store'); //info This allows users to create posts in the admin area
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create'); //info This allows users to create posts in the admin area

    Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit'); //info This allows users to edit posts in the admin area
    Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy'); //info This allows users to delete posts in the admin area
    Route::patch('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update'); //info This allows users to delete posts in the admin area
