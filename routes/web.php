<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'auth']);