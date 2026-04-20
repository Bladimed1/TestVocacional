<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DirectorController;

Route::middleware(['ValidaDirector'])->group(function () { 

Route::get('/director', [DirectorController::class, 'index'])->name('director.index');

Route::get('/director/estadisticas', [DirectorController::class, 'estadisticas'])->name('director.estadisticas');

Route::get('/director/grupo/{grupo}', [DirectorController::class, 'grupo'])->name('director.grupo');

Route::get('/director/alumnos', [DirectorController::class, 'alumnos'])->name('director.alumnos');

Route::get('/director/cargar-alumnos', [DirectorController::class, 'insertarAlumnos'])->name('director.cargar.alumnos');

Route::post('/director/alumnos/estatus/{matricula}', [DirectorController::class, 'cambiarEstatus'])->name('director.alumnos.estatus');
});

?>