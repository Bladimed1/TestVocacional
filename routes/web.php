<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DirectorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstudianteController;


Route::get('/director', [DirectorController::class, 'index'])->name('director.index');

Route::get('estadisticas', [DirectorController::class, 'estadisticas'])->name('director.estadisticas');

Route::get('/login', [LoginController::class, 'login']);
Route::post('/auth_g', [LoginController::class, 'auth']);

Route::get('/estudiante', [EstudianteController::class, 'index']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



?>
