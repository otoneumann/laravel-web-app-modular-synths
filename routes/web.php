<?php

use App\Http\Controllers\SynthModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SynthModuleController::class, 'index'])->name('home');

Route::resource('modules', SynthModuleController::class);
