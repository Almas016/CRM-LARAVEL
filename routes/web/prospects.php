<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Prospects\ProspectsController;

Route::get('/', [ProspectsController::class, 'index'])->name('dashboard');
Route::get('create', [ProspectsController::class, 'create'])->name('create');
Route::get('{prospect}/edit', [ProspectsController::class, 'edit'])->where('prospect','[0-9]+')->name('edit');
Route::get('{prospect}', [ProspectsController::class, 'show'])->where('prospect','[0-9]+')->name('show');

Route::post('/', [ProspectsController::class, 'store'])->name('store');

Route::put('{prospect}', [ProspectsController::class, 'update'])->where('prospect','[0-9]+')->name('update');