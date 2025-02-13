<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->get('/login', AuthController::class, 'index');

$router->dispatch();