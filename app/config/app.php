<?php

use App\app\Middleware\Authenticate;
use App\app\Middleware\ClearValidationErrors;
use App\app\Middleware\ShareValidationErrors;
use App\app\Middleware\ViewShareMiddleware;
use App\app\Providers\{AppServiceProvider,
    AuthServiceProvider,
    DatabaseServiceProvider,
    FlashServiceProvider,
    HashServiceProvider,
    SessionServiceProvider,
    ViewServiceProvider};

return [
    'name' => env('APP_NAME', 'Calendar'),
    'debug' => env('APP_DEBUG', false),
    'providers' => [
        AppServiceProvider::class,
        ViewServiceProvider::class,
        DatabaseServiceProvider::class,
        SessionServiceProvider::class,
        HashServiceProvider::class,
        AuthServiceProvider::class,
        FlashServiceProvider::class
    ],

    'middleware' => [
        ShareValidationErrors::class,
        ClearValidationErrors::class,
        ViewShareMiddleware::class,
        Authenticate::class
    ]
];