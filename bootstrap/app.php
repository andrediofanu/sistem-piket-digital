<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'isAdminPiket' => \App\Http\Middleware\IsAdminPiket::class,
            'isWaliKelas' => \App\Http\Middleware\IsWaliKelas::class,
            'isGuru' => \App\Http\Middleware\IsGuru::class,
            'isSiswa' => \App\Http\Middleware\IsSiswa::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
