<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorController;

Route::get('/director', [DirectorController::class, 'index'])->name('director.index');

Route::get('/director/estadisticas', [DirectorController::class, 'estadisticas'])->name('director.estadisticas');

Route::get('/director/grupo/{grupo}', [DirectorController::class, 'grupo'])->name('director.grupo');

Route::get('/director/alumnos', [DirectorController::class, 'alumnos'])->name('director.alumnos');



?>