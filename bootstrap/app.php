<?php

use App\Http\Middleware\ChecType;
use App\Http\Middleware\ComingSoon;
use App\Http\Middleware\SetLanuage;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [__DIR__.'/../routes/web.php',__DIR__.'/../routes/teacher.php'],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'chec_type'=>ChecType::class,
            'coming_soon'=>ComingSoon::class
        ]);
        $middleware->web(SetLanuage::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
