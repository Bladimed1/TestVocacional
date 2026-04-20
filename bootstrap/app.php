<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\ValidaEstudiante;
use App\Http\Middleware\ValidaDirector;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'ValidaEstudiante' => ValidaEstudiante::class,]);
    })
    ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'ValidaDirector' => ValidaDirector::class,]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
