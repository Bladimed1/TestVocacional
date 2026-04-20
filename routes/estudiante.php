<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::middleware(['ValidaEstudiante'])->group(function () { 

Route::get('/estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/estudiante/test', [EstudianteController::class, 'preguntasTest'])->name('estudiante.test');
Route::post('/estudiante/test/resultados', [EstudianteController::class, 'resultados'])->name('estudiante.resultados');
Route::get('/estudiante/mis-resultados', [EstudianteController::class, 'verResultados'])->name('estudiante.ver_resultados');

Route::get('/estudiante/infoDesarrollo', [EstudianteController::class, 'infoDesarrollo'])->name('estudiante.infoDesarrollo');
Route::get('/estudiante/infoRedes', [EstudianteController::class, 'infoRedes'])->name('estudiante.infoRedes');
Route::get('/estudiante/infoEntornos', [EstudianteController::class, 'infoEntornos'])->name('estudiante.infoEntornos');

});



?>