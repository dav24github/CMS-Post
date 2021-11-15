<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');

Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');

Route::delete('/permissions/{permission}/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');

Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');

Route::put('/permissions/{permission}/update', [PermissionController::class, 'update'])->name('permissions.update');