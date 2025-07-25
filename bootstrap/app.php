<?php

declare(strict_types=1);

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
        $middleware->redirectGuestsTo(fn () => route(name: 'filament.admin.auth.login', absolute: false));
        $middleware->redirectUsersTo(fn () => route(name: 'filament.admin.pages.dashboard', absolute: false));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
