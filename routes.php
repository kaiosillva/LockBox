<?php

Use Core\Route;
use App\Controllers\DashboardController;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegistrarController;


(new Route())

->get('/', IndexController::class)

->get('/login', [LoginController::class, 'index'])

->post('/login', [LoginController::class, 'login'])


->get('/dashboard', DashboardController::class)


->get('/logout', LogoutController::class)


->get('/registrar', [RegistrarController::class, 'index'])

->post('/registrar', [RegistrarController::class, 'register'])

->run();
