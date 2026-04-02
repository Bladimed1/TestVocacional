<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorController;

Route::get('/director', [DirectorController::class, 'index'])->name('director.index');
