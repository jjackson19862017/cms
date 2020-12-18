<?php
use Illuminate\Support\Facades\Route;

    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index'); //info To make this controller type 'php artisan make:controller RolesController' in the terminal
    Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
    Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy'); //info This allows users to delete posts in the admin area



