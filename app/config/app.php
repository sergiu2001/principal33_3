<?php

use App\app\Providers\AppServiceProvider;
use App\app\Providers\ViewServiceProvider;

return [
    'name' => getenv('APP_NAME'),

    'debug' => getenv('APP_DEBUG'),

    'providers' => [
        AppServiceProvider::class,
        ViewServiceProvider::class
    ]
];