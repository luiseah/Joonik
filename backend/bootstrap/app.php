<?php

use App\Console\Commands\RetryFailedOrderCommand;
use App\Http\Middleware\LocalizationMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(LocalizationMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (AuthenticationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'No autenticado',
                    'message' => 'Debe estar autenticado para acceder a este recurso.'
                ], 401);
            }

            return redirect()->guest(route('login'));
        });
    })
    ->withSchedule(function (Schedule $schedule) {
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
