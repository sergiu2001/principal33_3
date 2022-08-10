<?php

use App\app\Controllers\HomeController;

global $router;

$router->get('/', [HomeController::class, 'index'])->setName('home');