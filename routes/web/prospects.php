<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Prospects\ProspectsController;

Route::get('/',[ProspectsController::class,'index'])->name('dashboard');