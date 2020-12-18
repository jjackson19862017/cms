<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index'); //info To make this controller type 'php artisan make:controller PermissionsController' in the terminal
    Route::post('/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
    Route::delete('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy'); //info This allows users to delete posts in the admin area
    Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
});
