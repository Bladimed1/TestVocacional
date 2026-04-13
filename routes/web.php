<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DirectorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstudianteController;



Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authGoogle', [LoginController::class, 'authGoogle']);
Route::post('/authGoogle/auth', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/director', [DirectorController::class, 'index'])->name('director.index');

Route::get('/director/estadisticas', [DirectorController::class, 'estadisticas'])->name('director.estadisticas');

Route::get('/director/grupo/{grupo}', [DirectorController::class, 'grupo'])->name('director.grupo');

Route::get('/director/alumnos', [DirectorController::class, 'alumnos'])->name('director.alumnos');

Route::get('/director/cargar-alumnos', [DirectorController::class, 'insertarAlumnos'])->name('director.cargar.alumnos');

Route::post('/director/alumnos/estatus/{matricula}', [DirectorController::class, 'cambiarEstatus'])->name('director.alumnos.estatus');
    

Route::get('/estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/estudiante/test', [EstudianteController::class, 'preguntasTest'])->name('estudiante.test');
Route::post('/estudiante/test/resultados', [EstudianteController::class, 'resultados'])->name('estudiante.resultados');
?>