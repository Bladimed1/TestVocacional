<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DirectorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstudianteController;


Route::get('/director', [DirectorController::class, 'index'])->name('director.index');



Route::get('/login', [LoginController::class, 'login']);
Route::post('/auth_g', [LoginController::class, 'auth']);

Route::get('/estudiante', [EstudianteController::class, 'index']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/director/estadisticas', [DirectorController::class, 'estadisticas'])->name('director.estadisticas');

Route::get('/director/grupo/{grupo}', [DirectorController::class, 'grupo'])->name('director.grupo');

Route::get('/director/alumnos', [DirectorController::class, 'alumnos'])->name('director.alumnos');

Route::get('/estudiante/test', [EstudianteController::class, 'test'])->name('estudiante.test');

?>