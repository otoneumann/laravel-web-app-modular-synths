<?php

use App\Http\Controllers\SynthModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('modules', SynthModuleController::class);
