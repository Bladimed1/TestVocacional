<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DirectorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstudianteController;



Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authGoogle', [LoginController::class, 'authGoogle']);
Route::get('/authGoogle/auth', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/error', [LoginController::class, 'error'])->name('error');






require __DIR__ . '/director.php';
require __DIR__ . '/estudiante.php';



?>