<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Prospects\Activities\ProspectActivitiesController;

Route::get('{prospect}', [ProspectActivitiesController::class, 'index'])->name('dashboard');
Route::get('{prospect}/create', [ProspectActivitiesController::class, 'create'])->name('create');
Route::post('{prospect}', [ProspectActivitiesController::class, 'store'])->name('store');
Route::get('{prospect}/{activity}', [ProspectActivitiesController::class, 'show'])->name('show');
