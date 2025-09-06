<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use App\Http\Middleware\ExampleMiddleware; // لو أنشأته

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/Api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // ✅ Middleware عام (يتم تطبيقه على كل الطلبات)
        // $middleware->append(SomeGlobalMiddleware::class);

        // ✅ Route middleware (يتم استخدامه حسب الطلب)
        $middleware->alias([
            'auth:sanctum' => EnsureFrontendRequestsAreStateful::class,
            'example' => ExampleMiddleware::class, // لو أردت استخدامه
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // يمكنك تخصيص المعالجات هنا
    })
    ->create();
