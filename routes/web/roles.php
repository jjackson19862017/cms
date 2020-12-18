<?php
use Illuminate\Support\Facades\Route;

    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index'); //info To make this controller type 'php artisan make:controller RolesController' in the terminal


