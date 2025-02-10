<?php

use src\Controllers\AuthController;
use src\Controllers\HomeController;
use src\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->get('/login', AuthController::class, 'index');

$router->dispatch();