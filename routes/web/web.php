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



// Info If anything needs authenticating Ie Admin area.
Route::middleware('auth')->group(function(){
    // Admin Controller
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index'); //info To make this controller type 'php artisan make:controller AdminsController' in the terminal
    Route::delete('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy'); //info This allows users to delete users in the admin area
});


