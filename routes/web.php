<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DirectorController;


Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'auth']);

Route::get('/index_estudiante', [EstudianteController::class, 'index'])->middleware('validarSesion');
Route::get('/index_director', [DirectorController::class, 'index'])->name('index_director');

Route::get('/resultados', [DirectorController::class, 'mostrarGraficas'])->name('graficas');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');