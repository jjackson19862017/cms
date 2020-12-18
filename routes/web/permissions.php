<?php

use Illuminate\Support\Facades\Route;


    Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index'); //info To make this controller type 'php artisan make:controller PermissionsController' in the terminal

