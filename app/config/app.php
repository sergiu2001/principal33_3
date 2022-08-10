<?php

use App\app\Middleware\ClearValidationErrors;
use App\app\Middleware\ShareValidationErrors;
use App\app\Providers\{AppServiceProvider, DatabaseServiceProvider, SessionServiceProvider, ViewServiceProvider};

return [
    'name' => env('APP_NAME', 'Funky'),
    'debug' => env('APP_DEBUG', false),
    'providers' => [
        AppServiceProvider::class,
        ViewServiceProvider::class,
        DatabaseServiceProvider::class,
        SessionServiceProvider::class,
    ],

    'middleware' => [
        ShareValidationErrors::class,
        ClearValidationErrors::class,
    ]
];