<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post'); //info To make this controller type 'php artisan make:model Post -mc' in the terminal. The m -> model and the c -> controller


// Info If anything needs authenticating Ie Admin area.
Route::middleware('auth')->group(function(){
    // Admin Controller
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index'); //info To make this controller type 'php artisan make:controller AdminsController' in the terminal

    // Post Controller
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store'); //info This allows users to create posts in the admin area
    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create'); //info This allows users to create posts in the admin area

    // Log out
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});
