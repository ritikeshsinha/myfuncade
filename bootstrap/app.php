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
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            // SuperadminRedirect
            'admin.guest' => \App\Http\Middleware\SuperadminRedirect::class,
            'admin.auth' =>  \App\Http\Middleware\SuperadminAuthenticate::class,
        ]);
        
        $middleware->redirectTo(
            guests: '/account/login',
            users: '/account/dashboard'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
