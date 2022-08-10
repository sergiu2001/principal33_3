<?php

global $router;

use App\app\Controllers\Auth\LoginController;
use App\app\Controllers\HomeController;
use League\Route\RouteGroup;

$router->get('/', [HomeController::class, 'index'])->setName('home');

$router->group('/auth', function (RouteGroup $router){
    $router->get('/login', [LoginController::class, 'index'])->setName('auth.login');
    $router->post('/login', [LoginController::class, 'store']);
});