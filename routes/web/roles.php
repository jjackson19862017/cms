<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index'); //info To make this controller type 'php artisan make:controller RolesController' in the terminal
    Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
    Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy'); //info This allows users to delete posts in the admin area
    Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::put('/roles/{role}/attach', [App\Http\Controllers\RoleController::class, 'permission_attach'])->name('role.permission.attach');
    Route::put('/roles/{role}/detach', [App\Http\Controllers\RoleController::class, 'permission_detach'])->name('role.permission.detach');


});
