<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Prospects\ProspectsController;

Route::get('/', [ProspectsController::class, 'index'])->name('dashboard');
Route::get('create', [ProspectsController::class, 'create'])->name('create');
Route::post('/', [ProspectsController::class, 'store'])->name('store');
